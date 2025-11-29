<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Buyer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerInsightsController extends Controller
{
    public function index()
    {
        $sellerId = Auth::user()->seller->id;

        // 1️⃣ CUSTOMER REPEAT (Pembeli lebih dari sekali)
        $repeatCustomers = Buyer::whereHas('orders', function($q) use ($sellerId) {
                $q->where('seller_id', $sellerId);
            })
            ->withCount(['orders' => function($q) use ($sellerId) {
                $q->where('seller_id', $sellerId);
            }])
            ->get()
            ->filter(fn($buyer) => $buyer->orders_count > 1)
            ->count();

        // 2️⃣ NEW CUSTOMERS (Pembeli yang hanya beli 1x)
        $newCustomers = Buyer::whereHas('orders', function($q) use ($sellerId) {
                $q->where('seller_id', $sellerId);
            })
            ->withCount(['orders' => function($q) use ($sellerId) {
                $q->where('seller_id', $sellerId);
            }])
            ->get()
            ->filter(fn($b) => $b->orders_count === 1)
            ->count();

        // Returning = repeat customer
        $returningCustomers = $repeatCustomers;


        // 3️⃣ TOP BUYERS (fix tanpa ONLY_FULL_GROUP_BY error)
        $topBuyers = Buyer::select(
                'buyers.id',
                'buyers.fullname',
                'buyers.phone_number',
                DB::raw('COUNT(orders.id) as total_orders'),
                DB::raw('SUM(orders.total_price) as total_spent')
            )
            ->join('orders', 'orders.buyer_id', '=', 'buyers.id')
            ->where('orders.seller_id', $sellerId)
            ->groupBy('buyers.id', 'buyers.fullname', 'buyers.phone_number')
            ->orderByDesc('total_orders')
            ->take(5)
            ->get();


        return view('SellerDashboard.customerInsights', compact(
            'repeatCustomers',
            'newCustomers',
            'returningCustomers',
            'topBuyers'
        ));
    }
}
