<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\MidtransService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
public function store(Request $request, MidtransService $midtrans)
    {
        $ordersData = json_decode($request->orders_data, true);

        if (!$ordersData || !is_array($ordersData)) {
            return back()->with('error', 'Tidak ada produk yang dipilih.');
        }

        $createdOrders = [];

        DB::beginTransaction();
        try {
            foreach ($ordersData as $orderData) {
                // dd($orderData['details']);

                // Create order
                $order = Order::create([
                    'buyer_id'    => $orderData['buyer_id'],
                    'seller_id'   => $orderData['seller_id'],
                    'status'      => $orderData['status'] ?? 'pending',
                    'total_price' => $orderData['total_price'],
                ]);

                // Create order details
                if (!empty($orderData['details'])) {
                    foreach ($orderData['details'] as $product) {
                        OrderDetail::create([
                            'order_id'   => $order->id,
                            'product_id' => $product['product_id'],
                            'quantity'   => $product['quantity'],
                            'price'      => $product['price'],
                        ]);
                    }

                    Product::whereIn('id', array_column($orderData['details'], 'product_id'))
                        ->decrement('stock', array_sum(array_column($orderData['details'], 'quantity')));
                }

                $createdOrders[] = $order;
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Order create failed: '.$e->getMessage());
            return back()->with('error', 'Gagal membuat pesanan.');
        }

        // 🔵 Ambil order pertama untuk pembayaran
        $orderForPayment = $createdOrders[0];
        $orderForPayment->load('details.product');
// dd($orderForPayment->details->toArray());

        // Buat kode invoice
        $orderCode = 'INV-' . now()->format('YmdHis') . '-' . $orderForPayment->id . '-' . Str::random(6);

        // Buat payment
        $payment = Payment::create([
            'order_id'           => $orderForPayment->id,
            'order_code'         => $orderCode,
            'transaction_status' => 'pending',
        ]);

        try {
            // 🔥 Panggil Midtrans
            $midtransResponse = $midtrans->createTransaction($orderForPayment, $payment);
            // dd($midtransResponse);

            // Ambil snap token
            $snapToken   = $midtransResponse->token ?? null;
$redirectUrl = $midtransResponse->redirect_url ?? null;

if (!$snapToken || !$redirectUrl) {
    Log::error('Midtrans response invalid', ['response' => $midtransResponse]);
    return back()->with('error', 'Gagal menghubungkan ke gateway pembayaran.');
}


            // Simpan ke DB
            $payment->update([
                'snap_token'        => $snapToken,
                'snap_redirect_url' => $redirectUrl,
                'payload'           => $midtransResponse,
            ]);

        } catch (\Throwable $e) {
            Log::error("Midtrans create transaction failed: ".$e->getMessage());
            return back()->with('error', 'Gagal menghubungkan ke gateway pembayaran.');
        }

        // Tampilkan tampilan Snap
        return response()->json([
        'snap_token' => $midtransResponse->token,
    ]);
    }


// ini untuk yang ada di seller notif

// ini nanti ada di file navbar yag ad adi seller
// public function indexPending()
// {
//     // Ambil semua order yang seller_id sama dengan seller yang login 
//     // dan statusnya 'pending'
//     $orders = Order::where('seller_id', Auth::user()->seller->id)
//                     ->where('status', 'pending')
//                     ->get();

//     // Kirim ke view
//     return view('orders.pending', compact('orders'));
// }



// // ini untuk yang ada di buyer notif
// public function indexApprovedOrCancelled(){

// }

public function indexPending()
{
    $sellerId = Auth::user()->seller->id;

    // Ambil SEMUA orders untuk seller ini
    $orders = Order::where('seller_id', $sellerId)
                    ->orderBy('created_at', 'desc')
                    ->with(['buyer', 'details.product']) // load relasi untuk menghindari N+1
                    ->get();

    return view('SellerDashboard.ordersPending', compact('orders'));
}



public function approve(Order $order)
{
    // Pastikan seller yang sedang login boleh approve
    if ($order->seller_id != Auth::user()->seller->id) {
        return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
    }

    $order->update([
        'status' => 'completed', // sesuai enum
        'is_read'=>false
    ]);

    return redirect()->back()->with('success', 'Order #' . $order->id . ' berhasil disetujui.');
}


public function cancel(Order $order)
{
    if ($order->seller_id != Auth::user()->seller->id) {
        return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
    }

    $order->update([
        'status' => 'cancelled',
        'is_read'=>false
    ]);

    return redirect()->back()->with('success', 'Order #' . $order->id . ' berhasil dibatalkan.');
}


}
