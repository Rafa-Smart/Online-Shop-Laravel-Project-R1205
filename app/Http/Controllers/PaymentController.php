<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function finish(Request $request)
    {
        return view('payment.finish', [
            'status' => $request->status ?? 'unknown',
            'order_id' => $request->order_id ?? null,
        ]);
    }

    public function error(Request $request)
    {
        return view('payment.error', [
            'status' => 'error',
            'order_id' => $request->order_id ?? null,
        ]);
    }
}
