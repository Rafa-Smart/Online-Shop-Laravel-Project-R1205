<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\OrderDetail;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use Illuminate\Support\Carbon;
use App\Models\WishlistCategory;
use Illuminate\Support\Facades\DB;

class HomeController
{
  public function getAllProducts(Request $request)
{
    // ───────────────────────────────────────────────
    // 1. Ads aktif
    // ───────────────────────────────────────────────
    $ads = Ad::with('product')
        ->where('is_active', true)
        ->get();

    // harga asli
    $originalPriceValue = 100000000;

    // 30 hari terakhir
    $oneMonthAgo = Carbon::now()->subDays(30);


    // ───────────────────────────────────────────────
    // 2. Produk Query Dasar
    // ───────────────────────────────────────────────
    $query = Product::with([
        'category',
        'seller',
        'carts',
        'photos',
        'comments'
    ])->where('stock', '>', 0);


    // ───────────────────────────────────────────────
    // 3. Search Filter
    // ───────────────────────────────────────────────
    if ($request->has('search') && $request->search) {
        $searchTerm = $request->search;

        $query->where(function ($q) use ($searchTerm) {
            $q->where('product_name', 'like', "%{$searchTerm}%")
              ->orWhere('description', 'like', "%{$searchTerm}%")
              ->orWhereHas('category', function ($cat) use ($searchTerm) {
                    $cat->where('category_name', 'like', "%{$searchTerm}%");
              });
        });
    }


    // ───────────────────────────────────────────────
    // 4. Filter kategori
    // ───────────────────────────────────────────────
    if ($request->has('category_id') && $request->category_id) {
        $query->where('category_id', $request->category_id);
    }


    // ───────────────────────────────────────────────
    // 5. Kondisi barang
    // ───────────────────────────────────────────────
    if ($request->has('condition') && $request->condition) {
        $query->where('condition', $request->condition);
    }


    // ───────────────────────────────────────────────
    // 6. Harga minimum & maksimum
    // ───────────────────────────────────────────────
    if ($request->min_price !== null) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->max_price !== null) {
        $query->where('price', '<=', $request->max_price);
    }


    // ───────────────────────────────────────────────
    // 7. Filter stok
    // ───────────────────────────────────────────────
    if ($request->has('stock_status')) {
        switch ($request->stock_status) {
            case 'in-stock':
                $query->where('stock', '>', 10);
                break;
            case 'low-stock':
                $query->where('stock', '<=', 10)->where('stock', '>', 0);
                break;
            case 'out-of-stock':
                $query->where('stock', 0);
                break;
        }
    }


    // ───────────────────────────────────────────────
    // 8. Rating filter
    // ───────────────────────────────────────────────
    if ($request->has('min_rating') && $request->min_rating) {
        $query->where('average_rating', '>=', $request->min_rating);
    }


    // ───────────────────────────────────────────────
    // 9. Perhitungan monthly_sales & total_sales
    // ───────────────────────────────────────────────
    $query->withSum('orderDetails as total_sales', 'quantity');

    $query->withSum([
        'orderDetails as monthly_sales' => function ($subQuery) use ($oneMonthAgo) {
            $subQuery->whereHas('order', function ($orderQ) use ($oneMonthAgo) {
                $orderQ->where('status', 'completed')
                       ->where('created_at', '>=', $oneMonthAgo);
            })->select(DB::raw('SUM(quantity)'));
        }
    ], 'quantity');


    // ───────────────────────────────────────────────
    // 10. Sorting
    // ───────────────────────────────────────────────
    $sortBy = $request->get('sort', 'newest');

    switch ($sortBy) {
        case 'popular':
            $query->orderByRaw('monthly_sales DESC');
            break;
        case 'price-low':
            $query->orderBy('price', 'asc');
            break;
        case 'price-high':
            $query->orderBy('price', 'desc');
            break;
        case 'rating':
            $query->orderBy('average_rating', 'desc');
            break;
        case 'name-az':
            $query->orderBy('product_name', 'asc');
            break;
        case 'name-za':
            $query->orderBy('product_name', 'desc');
            break;
        case 'oldest':
            $query->orderBy('created_at', 'asc');
            break;
        default:
            $query->orderBy('created_at', 'desc');
            break;
    }


    // ───────────────────────────────────────────────
    // 11. Pagination
    // ───────────────────────────────────────────────
    $products = $query->paginate(20)->withQueryString();

    $products->through(function ($product) use ($originalPriceValue) {
        $product->original_price = $originalPriceValue;
        $product->monthly_sales = (int) $product->monthly_sales;
        $product->total_sales   = (int) $product->total_sales;
        return $product;
    });


    // ───────────────────────────────────────────────
    // 12. CART & WISHLIST
    // ───────────────────────────────────────────────

    $buyerId = auth()->user()->buyer->id;

    $carts = Cart::where('buyer_id', $buyerId)
        ->with('product')
        ->latest()
        ->take(5)
        ->get();

    $wishlistRecent = DB::table('wishlists')
        ->join('products', 'wishlists.product_id', '=', 'products.id')
        ->where('wishlists.buyer_id', $buyerId)
        ->select('products.*', 'wishlists.created_at as added_at')
        ->latest()
        ->take(5)
        ->get();

    session(['carts' => $carts]);
    session(['wishlist' => $wishlistRecent]);


    // kategori wishlist milik user
    $wishlistCategories = WishlistCategory::where('buyer_id', $buyerId)->get();


    // ───────────────────────────────────────────────
    // 13. Data kategori produk & rentang harga
    // ───────────────────────────────────────────────
    $categories = Categorie::withCount('products')->get();

    $priceRange = Product::selectRaw('MIN(price) as min_price, MAX(price) as max_price')->first();


    // ───────────────────────────────────────────────
    // 14. Return ke view (gabungan)
    // ───────────────────────────────────────────────
    return view('pages.home', [
        'products' => $products,
        'ads'      => $ads,
        'categories' => $categories,
        'wishlistCategories' => $wishlistCategories,
        'priceRange' => $priceRange,
    ]);
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


public function filterProducts(Request $request)
    {
        $query = Product::with(['category', 'seller'])
            ->where('stock', '>', 0);

        // Apply all filters (same as index method)
        if ($request->search) {
            $query->where('product_name', 'like', "%{$request->search}%");
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->condition) {
            $query->where('condition', $request->condition);
        }

        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->stock_status) {
            switch ($request->stock_status) {
                case 'in-stock':
                    $query->where('stock', '>', 10);
                    break;
                case 'low-stock':
                    $query->where('stock', '<=', 10)->where('stock', '>', 0);
                    break;
            }
        }

        // Add sales data
        $query->addSelect([
            'monthly_sales' => DB::raw('(SELECT COUNT(*) FROM order_items 
                WHERE order_items.product_id = products.id 
                AND order_items.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY))'),
            'total_sales' => DB::raw('(SELECT COUNT(*) FROM order_items 
                WHERE order_items.product_id = products.id)')
        ]);

        // Sorting
        switch ($request->sort) {
            case 'popular':
                $query->orderByRaw('monthly_sales DESC');
                break;
            case 'price-low':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('average_rating', 'desc');
                break;
            case 'name-az':
                $query->orderBy('product_name', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->paginate(20);

        return response()->json([
            'success' => true,
            'products' => $products->items(),
            'pagination' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ]
        ]);
    }

    /**
     * Get trending products
     */
    public function getTrendingProducts()
    {
        $products = Product::with(['category', 'seller'])
            ->addSelect([
                'monthly_sales' => DB::raw('(SELECT COUNT(*) FROM order_items 
                    WHERE order_items.product_id = products.id 
                    AND order_items.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY))')
            ])
            ->orderByRaw('monthly_sales DESC')
            ->limit(8)
            ->get();

        return response()->json([
            'success' => true,
            'products' => $products
        ]);
    }

    /**
     * Get new arrivals
     */
    public function getNewArrivals()
    {
        $products = Product::with(['category', 'seller'])
            ->where('created_at', '>=', now()->subDays(30))
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        return response()->json([
            'success' => true,
            'products' => $products
        ]);
    }

    /**
     * Get featured products (high rating)
     */
    public function getFeaturedProducts()
    {
        $products = Product::with(['category', 'seller'])
            ->where('average_rating', '>=', 4)
            ->orderBy('average_rating', 'desc')
            ->orderBy('rating_count', 'desc')
            ->limit(8)
            ->get();

        return response()->json([
            'success' => true,
            'products' => $products
        ]);
    }

    /**
     * Get products by category
     */
    public function getProductsByCategory($categoryId)
    {
        $category = Categorie::findOrFail($categoryId);
        
        $products = Product::with(['category', 'seller'])
            ->where('category_id', $categoryId)
            ->where('stock', '>', 0)
            ->addSelect([
                'monthly_sales' => DB::raw('(SELECT COUNT(*) FROM order_items 
                    WHERE order_items.product_id = products.id 
                    AND order_items.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY))')
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('pages.home', compact('products', 'category'));
    }

    /**
     * Search products with autocomplete
     */
    public function searchAutocomplete(Request $request)
    {
        $term = $request->get('term', '');
        
        if (strlen($term) < 2) {
            return response()->json([]);
        }

        $products = Product::where('product_name', 'like', "%{$term}%")
            ->select('id', 'product_name', 'price', 'img')
            ->limit(10)
            ->get();

        return response()->json($products);
    }

    /**
     * Get filter options (for dynamic filter UI)
     */
    public function getFilterOptions()
    {
        $categories = Categorie::withCount('products')
            ->having('products_count', '>', 0)
            ->get();

        $priceRange = Product::selectRaw('MIN(price) as min, MAX(price) as max')
            ->first();

        $conditions = Product::distinct()
            ->pluck('condition')
            ->map(function($condition) {
                return [
                    'value' => $condition,
                    'label' => $condition === 'new' ? 'Baru' : 'Bekas'
                ];
            });

        return response()->json([
            'categories' => $categories,
            'priceRange' => $priceRange,
            'conditions' => $conditions,
        ]);
    }

    /**
     * Quick view product (for modal)
     */
    public function quickView($id)
    {
        $product = Product::with(['category', 'seller'])
            ->addSelect([
                'monthly_sales' => DB::raw('(SELECT COUNT(*) FROM order_items 
                    WHERE order_items.product_id = products.id 
                    AND order_items.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY))')
            ])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }


}
