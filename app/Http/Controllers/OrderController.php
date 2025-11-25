<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
public function store(Request $request)
{
    $ordersData = json_decode($request->orders_data, true);

    if (!$ordersData || !is_array($ordersData)) {
        return back()->with('error', 'Tidak ada produk yang dipilih.');
    }

    foreach ($ordersData as $orderData) {
        $order = Order::create([
            'buyer_id' => $orderData['buyer_id'],
            'seller_id' => $orderData['seller_id'],
            'status' => $orderData['status'] ?? 'pending',
            'total_price' => $orderData['total_price'],
        ]);

        if (!empty($orderData['order_details']) && is_array($orderData['order_details'])) {
            foreach ($orderData['order_details'] as $product) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product['product_id'],
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                ]);
            }
        }
    }

    return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
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
    // Ambil semua order pending untuk seller yang login
    $orders = Order::where('seller_id', Auth::id())
                    ->where('status', 'pending')
                    ->orderBy('created_at', 'desc')
                    ->get(); // collection

    return view('SellerDashboard.ordersPending', compact('orders'));
}



public function approve(Order $order)
{
    // Pastikan seller yang sedang login boleh approve
    if ($order->seller_id != Auth::id()) {
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
    if ($order->seller_id != Auth::id()) {
        return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
    }

    $order->update([
        'status' => 'cancelled',
        'is_read'=>false
    ]);

    return redirect()->back()->with('success', 'Order #' . $order->id . ' berhasil dibatalkan.');
}


}
