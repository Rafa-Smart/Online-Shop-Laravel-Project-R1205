<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockManagementController extends Controller
{
    public function index(Request $request)
    {
        $seller = Auth::user()->seller;

        // Ambil threshold dari seller profile
        $defaultThreshold = $seller->low_stock_threshold ?? 5;

        // Filter input user
        $filterStock = $request->input('stock_filter', $defaultThreshold);

        // Ambil semua produk dengan filter stok
        $products = Product::where('seller_id', $seller->id)
            ->where('stock', '<=', $filterStock)
            ->orderBy('stock', 'asc')
            ->get();

        return view('SellerDashboard.stockManagement', compact(
            'products',
            'defaultThreshold',
            'filterStock'
        ));
    }

    public function updateStock(Request $request, Product $product)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        // Pastikan seller yang punya produk ini
        if ($product->seller_id != Auth::user()->seller->id) {
            abort(403);
        }

        $product->update([
            'stock' => $request->stock,
        ]);

        return back()->with('success', 'Stock berhasil diperbarui.');
    }
}
