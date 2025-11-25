<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SalesReportService;
use Illuminate\Support\Facades\Auth;

class DashboardSellerController extends Controller
{
    protected $salesService;

    public function __construct(SalesReportService $salesService)
    {
        $this->salesService = $salesService;
    }


    public function statistics(Request $request)
    {
        $type = $request->query('type', 'daily');

        $user = Auth::user();

        // Pastikan seller ada
        if (!$user->seller) {
            return response()->json([
                'error' => 'Seller profile not found'
            ], 404);
        }

        $sellerId = $user->seller->id;
        // return $sellerId;

        // Ambil data berdasarkan type
        switch ($type) {
            case 'daily':
                $data = $this->salesService->getDailySales($sellerId)
                    ->map(fn ($row) => [
                        'label' => $row->date,
                        'total' => (int) $row->total
                    ]);
                break;

            case 'monthly':
                $data = $this->salesService->getMonthlySales($sellerId)
                    ->map(fn ($row) => [
                        'label' => $row->year . '-' . str_pad($row->month, 2, '0', STR_PAD_LEFT),
                        'total' => (int) $row->total
                    ]);
                break;

            case 'yearly':
                $data = $this->salesService->getYearlySales($sellerId)
                    ->map(fn ($row) => [
                        'label' => $row->year,
                        'total' => (int) $row->total
                    ]);
                break;

            default:
                return response()->json([
                    'error' => 'Invalid type'
                ], 400);
        }

        return response()->json([
            'status' => 'success',
            'type' => $type,
            'data' => $data
        ]);
    }
}
