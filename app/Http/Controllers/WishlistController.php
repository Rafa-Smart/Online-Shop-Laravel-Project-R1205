<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    // Halaman utama wishlist
    public function index()
    {
        // $categories = auth()->user()->buyer->wishlistCategories()->withCount('wishlists')->get();
        $categories = Buyer::with(['wishlistCategories', 'wishlists'])->where('id', auth()->user()->buyer->id)->get();

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

        $buyerId = auth()->user()->buyer->id;

        $query = Product::whereHas('wishlists', function ($q) use ($buyerId) {
            $q->where('buyer_id', $buyerId);
        });
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

        // return $categories;

        // return $categories;
        return view('pages.wishlist.index', ['categories' => $categories, 'products' => $products]);
    }

    // Load semua wishlist (AJAX)

    // Tambah wishlist
public function store(Request $request, $product_id)
    {

        // return $product_id;
        $request->validate([
            'wishlist_category_id' => 'nullable|exists:wishlist_categories,id',
        ]);

        Wishlist::create([
            'buyer_id' => auth()->user()->buyer->id,
            'product_id' => $product_id,
            'wishlist_category_id' => $request->wishlist_category_id,
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan ke wishlist!');
    }

    // Simpan kategori baru dari modal
    public function storeCategory(Request $request)
    {
        // return 'halo';

        // return $request->name;
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $hasil = WishlistCategory::create([
            'buyer_id' => auth()->user()->buyer->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        // return $hasil;

        return back()->with('success', 'Kategori wishlist berhasil dibuat!');
    }


    // Detail halaman kategori wishlist
    public function categoryDetailPage($id)
    {
        $category = auth()->user()->buyer->wishlistCategories()
            ->with('wishlists.product')
            ->findOrFail($id);

        return view('pages.wishlist.wishlistCategoryDetail', compact('category'));
    }

    public function destroyByProduct(Request $request, $product_id)
    {

        // return $product_id;
        $wishlist = Wishlist::where('product_id', $product_id)
            ->where('buyer_id', auth()->user()->buyer->id)
            ->first();



        if ($wishlist) {
            $wishlist->delete();
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari wishlist!');

    }



}
