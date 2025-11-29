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
        // return $categories ;
        $categoriesWishlist = Buyer::with(['wishlistCategories', 'wishlists'])->where('id', auth()->user()->buyer->id)->get()->first();
        

        $namaXdescriptionWishlistCategory = WishlistCategory::where('buyer_id', auth()->user()->buyer->id)->first();
        // return $namaXdescriptionWishlistCategory;

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
        return view('pages.wishlist.index', ['categories' => $categories, 'products' => $products, 'namaXdescriptionWishlistCategory' => $namaXdescriptionWishlistCategory, 'categoriesWishlist' => $categoriesWishlist]);
    }

    // Load semua wishlist (AJAX)

    // Tambah wishlist
    public function store(Request $request, $product_id)
    {

        // return $product_id;
        $request->validate([
            'wishlist_category_id' => 'nullable|exists:wishlist_categories,id',
        ]);

        $data = Wishlist::with('category')->where('product_id', $product_id)->get();
        // return $data;


        if(empty($data->toArray())) {
                    Wishlist::create([
            'buyer_id' => auth()->user()->buyer->id,
            'product_id' => $product_id,
            'wishlist_category_id' => $request->wishlist_category_id,
        ]);
        }else {

            // $namaCategory = WishlistCategory::where('')->get();
             return back()->with('error', 'produk sudah ada di wishlist ');
        }



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

        $categoryWishlist = Wishlist::with('category')
            ->where('buyer_id', auth()->user()->buyer->id)
            ->where('wishlist_category_id', $id)
            ->get();
            // return $categoryWishlist;

        return view('pages.wishlist.wishlistCategoryDetail', ['categories' => $categories, 'products' => $products, 'id' => $id, 'categoryWishlist' => $categoryWishlist]);
    }

    public function destroyCategory(Request $request, $id)
    {
        // return $id;

        $category = WishlistCategory::where('id', $id)
            ->where('buyer_id', auth()->user()->buyer->id)
            ->first();

        if ($category) {
            // Hapus semua wishlist yang terkait dengan kategori ini
            Wishlist::where('wishlist_category_id', $category->id)->delete();

            // Hapus kategori itu sendiri
            $category->delete();
        }

        return redirect()->route('home')->with('success', 'Kategori wishlist berhasil dihapus!');
    }

    public function updateCategory(Request $request, $id)
    {
        // return $id;

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $category = WishlistCategory::where('id', $id)
            ->where('buyer_id', auth()->user()->buyer->id)
            ->first();

        if ($category) {
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
        }

        return redirect()->back()->with('success', 'Kategori wishlist berhasil diperbarui!');
    }
   
}
