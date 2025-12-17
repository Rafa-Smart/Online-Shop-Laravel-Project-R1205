<?php

namespace App\Services;

use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransService
{
    protected $serverKey;

    protected $clientKey;

    protected $isProduction;

    protected $http;

    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->clientKey = config('midtrans.client_key');
        $this->isProduction = config('midtrans.is_production', false);

        // Konfigurasi SDK Midtrans
        Config::$serverKey = $this->serverKey;
        Config::$isProduction = $this->isProduction;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * Create Snap Transaction
     * returns object (SDK) or array
     */
    public function createTransaction($order, $payment)
    {
        // DEBUG AWAL
        // dd('MASUK KE METHOD', $this->serverKey, Config::$serverKey);

        $items = $order->details->map(function ($item) {
            return [
                'id' => $item->product_id,
                'price' => (int) $item->price,
                'quantity' => (int) $item->quantity,
                'name' => $item->product->name ?? 'Product',
            ];
        })->toArray();
        
        // dd($order->total_price, (int)$order->total_price);
        // dd($order->total_price, gettype($order->total_price));

        $params = [
            'transaction_details' => [
                'order_id' => $payment->order_code,
                'gross_amount' => (int) max(round($order->total_price, 2), 1),
            ],
            'customer_details' => [
                'first_name' => optional($order->buyer)->name ?? 'Customer',
                'email' => optional($order->buyer)->email ?? null,
            ],
            'item_details' => $items,
            'callbacks' => [
            'finish' => route('payment.finish'),
            'error'  => route('payment.error'),
            'pending' => route('payment.pending'),
        ],
        ];

        // return $params;
        // return $order->total_price;

        // Buat transaksi MIDTRANS
        // dd($order->total_price, round($order->total_price, 2), max(round($order->total_price, 2), 0.01));
        //
        try {
            $midtransResponse = Snap::createTransaction($params);
            // dd($midtransResponse); // 🔹 lihat apa yang dikembalikan SDK
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTraceAsString());
        }

        // DEBUG: lihat respons midtrans secara lengkap
        // dd($response);

        return $midtransResponse;
    }

    /**
     * Validate signature_key from Midtrans
     * signature_key = sha512(order_id + status_code + gross_amount + server_key)
     */
    public function validateSignature(array $payload): bool
    {
        if (! isset($payload['signature_key'])) {
            return false;
        }

        $orderId = $payload['order_id'] ?? '';
        $statusCode = $payload['status_code'] ?? '';
        $grossAmount = $payload['gross_amount'] ?? '';

        $input = $orderId.$statusCode.$grossAmount.$this->serverKey;
        $hash = openssl_digest($input, 'sha512');

        return hash_equals($hash, $payload['signature_key']);
    }

    /**
     * Parse useful fields from notification (VA / QRIS handling)
     */
    public function parseNotification(array $payload): array
    {
        $result = [
            'transaction_id' => $payload['transaction_id'] ?? null,
            'transaction_status' => $payload['transaction_status'] ?? null,
            'payment_type' => $payload['payment_type'] ?? null,
            'va_number' => null,
            'bank' => null,
            'qr_link' => null,
        ];

        if (! empty($payload['va_numbers']) && is_array($payload['va_numbers'])) {
            $va = $payload['va_numbers'][0] ?? null;
            if ($va) {
                $result['va_number'] = $va['va_number'] ?? null;
                $result['bank'] = $va['bank'] ?? null;
            }
        } elseif (! empty($payload['permata_va_number'])) {
            $result['va_number'] = $payload['permata_va_number'];
            $result['bank'] = 'permata';
        } elseif (! empty($payload['va_number'])) {
            $result['va_number'] = $payload['va_number'];
            $result['bank'] = $payload['bank'] ?? null;
        }

        if (! empty($payload['actions']) && is_array($payload['actions'])) {
            foreach ($payload['actions'] as $action) {
                if (isset($action['name']) && Str::lower($action['name']) === 'generate-qr') {
                    $result['qr_link'] = $action['url'] ?? null;
                }
            }
        }

        return $result;
    }

    /**
     * Refund helper (core API)
     */
    public function refund(string $transactionId, int $amount, ?string $reason = null): array
    {
        $body = ['refund_amount' => $amount];
        if ($reason) {
            $body['refund_reason'] = $reason;
        }

        $res = $this->http->post("v2/{$transactionId}/refund", [
            'json' => $body,
        ]);

        return json_decode((string) $res->getBody(), true);
    }

    /**
     * Get status helper
     */
    public function status(string $orderCode): array
    {
        $res = $this->http->get("v2/{$orderCode}/status");

        return json_decode((string) $res->getBody(), true);
    }
}
