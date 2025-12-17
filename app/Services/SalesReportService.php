<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class SalesReportService
{
    public function getDailySales($sellerId)
    {
        return Order::where('seller_id', $sellerId)
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_price) as total')
            )
            ->where('status', 'completed')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->take(30)
            ->get();
    }

    //
    public function getMonthlySales($sellerId)
    {
        return Order::where('seller_id', $sellerId)
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->where('status', 'completed')
            ->groupBy('year', 'month')
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->get();
    }

    public function getYearlySales($sellerId)
    {
        return Order::where('seller_id', $sellerId)
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(total_price) as total')
            )
            ->where('status', 'completed')
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();
    }
}
