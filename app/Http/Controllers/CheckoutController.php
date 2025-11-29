<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\MidtransService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    public function checkout(Request $request, MidtransService $midtrans)
    {
        $order = Order::with('details.product', 'buyer')->findOrFail($request->order_id);

        //  dd(config('services.midtrans.server_key'));  // ⬅ Tempel di sini

        $code = 'INV-'.now()->format('YmdHis').'-'.$order->id;

        $payment = Payment::create([
            'order_id' => $order->id,
            'order_code' => $code,
            'transaction_status' => 'pending',
        ]);

        $midtransRes = $midtrans->createTransaction($order, $payment);

        $payment->update([
            'snap_token' => $midtransRes->token,
            'snap_redirect_url' => $midtransRes->redirect_url,
        ]);

        return response()->json([
            'token' => $midtransRes->token,
            'redirect_url' => $midtransRes->redirect_url,
        ]);
    }
}
