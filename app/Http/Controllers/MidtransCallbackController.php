<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Events\PaymentFailed;
use App\Events\PaymentSucceeded;
use App\Services\MidtransService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request, MidtransService $midtrans)
    {
        $payload = $request->all();

        // 1) validate signature
        if (!$midtrans->validateSignature($payload)) {
            Log::warning('Midtrans invalid signature', $payload);
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // 2) find payment by order_code (order_id that we sent)
        $payment = Payment::where('order_code', $payload['order_id'])->first();

        if (!$payment) {
            Log::warning('Payment not found for midtrans callback', ['order_id' => $payload['order_id']]);
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // 3) parse additional info
        $info = $midtrans->parseNotification($payload);

        // 4) update payment (idempotent updates)
        $payment->update(array_merge([
            'transaction_status' => $payload['transaction_status'] ?? null,
            'transaction_id' => $payload['transaction_id'] ?? null,
            'payment_type' => $payload['payment_type'] ?? null,
            'payload' => $payload,
        ], $info));

        // 5) update order status and dispatch events only when status changes to success/cancel
        $status = $payload['transaction_status'] ?? null;

        if (in_array($status, ['settlement', 'capture'])) {
            if ($payment->order->status !== 'paid') {
                $payment->order->update(['status' => 'paid']);
                event(new PaymentSucceeded($payment));
            }
        } elseif (in_array($status, ['deny', 'cancel', 'expire'])) {
            if ($payment->order->status !== 'cancelled') {
                $payment->order->update(['status' => 'cancelled']);
                event(new PaymentFailed($payment));
            }
        }

        return response()->json(['message' => 'OK'], 200);
    }
}
