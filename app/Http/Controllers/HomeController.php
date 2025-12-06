<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\ProductReview;
use App\Models\WishlistCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function getAllProducts(Request $request)
    {
        // Konstanta Harga Asli (Rp 100.000.000)
        $originalPriceValue = 100000000;

        // Batas waktu untuk Penjualan Bulanan (30 hari terakhir)
        $oneMonthAgo = Carbon::now()->subDays(30);

        // --- 1. MEMBANGUN QUERY PRODUK DENGAN METRIK PENJUALAN ---
        $query = Product::query();

        // Eager Loading Relasi Dasar
        $query->with(['carts', 'category', 'photos', 'comments']);

        // Menghitung Total Terjual (Total Sales) dari OrderDetail
        $query->withSum('orderDetails as total_sales', 'quantity');

        // Menghitung Terjual Bulan Ini (Monthly Sales)
        // Agregasi Quantity dari OrderDetail yang berelasi dengan Order berstatus 'completed'
        $query->withSum([
            'orderDetails as monthly_sales' => function ($subQuery) use ($oneMonthAgo) {
                $subQuery->whereHas('order', function ($orderQuery) use ($oneMonthAgo) {
                    $orderQuery->where('status', 'completed')
                        ->where('created_at', '>=', $oneMonthAgo);
                })->select(DB::raw('SUM(quantity)'));
            },
        ], 'quantity');

        // --- 2. LOGIKA FILTERING (dari kode asli Anda) ---

        // Filtering berdasarkan Search Input
        if ($request->has('search-input-home')) {
            $search = $request->input('search-input-home');
            $query->where('product_name', 'like', "%{$search}%")
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('category_name', 'like', "%{$search}%");
                });
        }

        // Filtering berdasarkan Kategori
        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $query->where('category_id', $categoryId);
        }

        $products = $query->paginate(8);

        // --- 3. MENAMBAHKAN HARGA ASLI KE SETIAP PRODUK ---
        // Karena harga asli di-hardcode, kita tambahkan setelah query selesai
        $products->through(function ($product) use ($originalPriceValue) {
            $product->original_price = $originalPriceValue;
            // Pastikan nilai monthly_sales dan total_sales adalah integer jika null
            $product->monthly_sales = (int) $product->monthly_sales;
            $product->total_sales = (int) $product->total_sales;

            return $product;
        });

        // --- 4. LOGIKA CART (dari kode asli Anda) ---

        // Mengambil 5 item keranjang terbaru milik user
        $carts = Cart::where('buyer_id', auth()->user()->buyer->id)
            ->with(['product'])
            ->get()
            ->take(5);

        $categorie_wishlist = WishlistCategory::where('buyer_id', auth()->user()->buyer->id)
            ->get();

        $wishlist = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->where('wishlists.buyer_id', auth()->user()->buyer->id)
            ->select('products.*', 'wishlists.created_at as added_at')
            ->get()
            ->take(5);
        // return $wishlist;
        session(['carts' => $carts]);
        session(['wishlist' => $wishlist]);

        $ads = Ad::where('is_active', true)->with('product')->get();
        // return $ads;

        return view('pages.home', ['products' => $products, 'categories' => $categorie_wishlist, 'ads' => $ads]);
    }

    public function getDetailProduct($id)
    {
        $product = Product::findOrFail($id);
        $productPhotos = ProductPhoto::where('product_id', $product->id)->get();
        // return $productPhotos;
        // Ambil semua review
        $review = ProductReview::where('product_id', $product->id)->get();

        $order = OrderDetail::with(['order', 'product'])
    ->where('product_id', $id)
    ->whereHas('order', function ($q) {
        $q->where('status', 'completed');
    })
    ->get();

            // return $order->count();
            

        return view('pages.detail', [
            'product' => $product,
            'productPhotos' => $productPhotos,
            'review' => $review,
            'order' => $order,
        ]);
    }

    public function markAsRead(Order $order)
    {

        $order->update(['is_read' => true]);

        return redirect()->route('home')
            ->with('success', 'notifikasi telah di terima !');
    }





}
