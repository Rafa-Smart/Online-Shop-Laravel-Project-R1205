<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\OrderDetail;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan semua produk milik seller
     */
    public function show(Request $request)
{
    $sellerId = auth()->user()->seller->id;

    // --- FILTER QUERY ---
    $filter = $request->get('filter'); // top, low, expensive, cheap

    // Ambil produk beserta total terjual dalam 1 query
    $products = Product::where('seller_id', $sellerId)
        ->withSum('orderDetails as total_sold', 'quantity')
        ->get();

    // Isi default 0 jika null
    foreach ($products as $product) {
        $product->total_sold = $product->total_sold ?? 0;
    }

    // --- APPLY FILTER ---
    if ($filter === 'top') {
        $products = $products->sortByDesc('total_sold');
    } elseif ($filter === 'low') {
        $products = $products->sortBy('total_sold');
    } elseif ($filter === 'expensive') {
        $products = $products->sortByDesc('price');
    } elseif ($filter === 'cheap') {
        $products = $products->sortBy('price');
    }

    // Data untuk Chart
    $labels = $products->pluck('product_name');
    $soldData = $products->pluck('total_sold');

    return view('SellerDashboard.products.chartProduct', [
        'products' => $products,
        'labels' => json_encode($labels),
        'soldData' => json_encode($soldData),
        'filter' => $filter
    ]);
}

public function index(Request $request)
    {
        $query = Product::where('seller_id', auth()->user()->seller->id)
                       ->with('category');

        // Search
        if ($request->has('search') && $request->search) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        // Filter by condition
        if ($request->has('condition') && $request->condition) {
            $query->where('condition', $request->condition);
        }

        // Filter by stock status
        if ($request->has('stock_status') && $request->stock_status) {
            switch ($request->stock_status) {
                case 'available':
                    $query->where('stock', '>', 0);
                    break;
                case 'low':
                    $query->where('stock', '<=', 10)->where('stock', '>', 0);
                    break;
                case 'out':
                    $query->where('stock', 0);
                    break;
            }
        }

        // Filter by category
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by rating
        if ($request->has('min_rating') && $request->min_rating) {
            $query->where('average_rating', '>=', $request->min_rating);
        }

        // Sorting
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');

        switch ($sortBy) {
            case 'name':
                $query->orderBy('product_name', $sortOrder);
                break;
            case 'price':
                $query->orderBy('price', $sortOrder);
                break;
            case 'stock':
                $query->orderBy('stock', $sortOrder);
                break;
            case 'rating':
                $query->orderBy('average_rating', $sortOrder);
                break;
            default:
                $query->orderBy('created_at', $sortOrder);
                break;
        }

        $products = $query->get();

        // Statistics
        $stats = [
            'total' => $products->count(),
            'active' => $products->where('stock', '>', 0)->count(),
            'low_stock' => $products->where('stock', '<=', 10)->where('stock', '>', 0)->count(),
            'out_of_stock' => $products->where('stock', 0)->count(),
            'average_rating' => $products->avg('average_rating'),
            'total_value' => $products->sum(function($p) {
                return $p->price * $p->stock;
            })
        ];

        return view('SellerDashboard.products.readProduct', compact('products', 'stats'));
    }

    /**
     * Form tambah produk
     */
    public function create()
    {
        $categories = Categorie::get();

        return view('SellerDashboard.products.createProduct', ['categories' => $categories]);
    }

    /**
     * Simpan produk baru ke database
     */
public function store(Request $request)
{
    $request->validate([
    'product_name' => 'required|string|max:255',
    'starting_price' => 'nullable|integer',
    'price' => 'required|integer',
    'stock' => 'required|integer',
    'condition' => 'required|in:new,used',
    'category_id' => 'required|integer',
    'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp',
    'detail_photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
]);


    // =============================
    // 1. Upload thumbnail dulu
    // =============================
    $thumbnailPath = null;

    if ($request->hasFile('thumbnail')) {
        $ext = $request->thumbnail->getClientOriginalExtension();
        $thumbnailName = $request->product_name . '_thumbnail.' . $ext;

        $path = $request->thumbnail->storeAs(
            'products',
            $thumbnailName, 'public'
        );

        $thumbnailPath = str_replace('public/', 'storage/', $path);
    }

    // =============================
    // 2. Simpan produk (dengan img terisi)
    // =============================

    $product = Product::create([
    'seller_id' => auth()->user()->seller->id,
    'category_id' => $request->category_id,
    'product_name' => $request->product_name,
    'starting_price' => $request->starting_price, // harga awal
    'price' => $request->price, // harga setelah diskon
    'stock' => $request->stock,
    'condition' => $request->condition, // NEW / USED
    'product_specifications' => $request->specifications,
    'img' => $thumbnailPath,
]);


    // =============================
    // 3. Simpan detail photos (jika ada)
    // =============================

    if ($request->hasFile('detail_photos')) {
        $index = 1;

        foreach ($request->file('detail_photos') as $photo) {
            $ext = $photo->getClientOriginalExtension();
            $photoName = $product->product_name . "_detail_photo_$index." . $ext;

            $path = $photo->storeAs(
                'products',
                $photoName,
                'public'
            );

            ProductPhoto::create([
                'product_id' => $product->id,
                'photo_path' => str_replace('public/', 'storage/', $path),
            ]);

            $index++;
        }
    }

    return redirect()->route('seller.products.index')
        ->with('success', 'Produk & foto berhasil ditambahkan!');
}



    /**
     * Form edit produk
     */
    public function edit($id)
    {
        $product = Product::with('photos')->where('seller_id', auth()->user()->seller->id)
            ->findOrFail($id);
        $categories = Categorie::get();
        // return $product;

        return view('SellerDashboard.products.editProduct', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update produk
     */
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

$request->validate([
    'product_name' => 'required|string|max:255',
    'starting_price' => 'nullable|integer',
    'price' => 'required|integer',
    'stock' => 'required|integer',
    'condition' => 'required|in:new,used',
    'category_id' => 'required|integer',
    'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp',
]);

    // === THUMBNAIL UPDATE ===
    if ($request->hasFile('thumbnail')) {
        $ext = $request->thumbnail->getClientOriginalExtension();
        $thumbnailName = $request->product_name . '_thumbnail.' . $ext;

        $path = $request->thumbnail->storeAs('products', $thumbnailName, 'public');
        $thumbnailPath = 'storage/' . $path;

        $product->img = $thumbnailPath;
    }

    // === UPDATE DATA UTAMA ===
$product->update([
    'product_name' => $request->product_name,
    'category_id' => $request->category_id,
    'starting_price' => $request->starting_price,
    'price' => $request->price,
    'stock' => $request->stock,
    'condition' => $request->condition,
    'product_specifications' => $request->specifications,
]);

    // === DETAIL PHOTOS UPDATE (TAMBAH BARU) ===
    if ($request->hasFile('detail_photos')) {
        $index = $product->photos()->count() + 1;

        foreach ($request->file('detail_photos') as $photo) {
            $ext = $photo->getClientOriginalExtension();
            $photoName = $product->product_name . "_detail_photo_$index." . $ext;

            $path = $photo->storeAs('products', $photoName, 'public');

            ProductPhoto::create([
                'product_id' => $product->id,
                'photo_path' => 'storage/' . $path,
            ]);

            $index++;
        }
    }

    return redirect()->route('seller.products.index')
        ->with('success', 'Produk berhasil diperbarui!');
}


    /**
     * Hapus produk
     */
    public function destroy($id)
    {
        $product = Product::where('seller_id', auth()->user()->seller->id)
            ->findOrFail($id);

        $product->delete();

        return redirect()->route('seller.products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }



    public function bulkUpdateStock(Request $request)
    {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.stock' => 'required|integer|min:0',
        ]);

        foreach ($validated['products'] as $productData) {
            $product = Product::find($productData['id']);
            
            // Check ownership
            if ($product->seller_id === auth()->user()->seller->id) {
                $product->update(['stock' => $productData['stock']]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Stok berhasil diperbarui!'
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'product_ids' => 'required|array',
            'product_ids.*' => 'required|exists:products,id',
        ]);

        $deletedCount = 0;
        
        foreach ($validated['product_ids'] as $productId) {
            $product = Product::find($productId);
            
            // Check ownership
            if ($product && $product->seller_id === auth()->user()->seller->id) {
                // Delete image
                if ($product->img && file_exists(public_path($product->img))) {
                    unlink(public_path($product->img));
                }
                
                $product->delete();
                $deletedCount++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => "{$deletedCount} produk berhasil dihapus!"
        ]);
    }

    public function export()
    {
        $products = Product::where('seller_id', auth()->user()->seller->id)
                          ->with('category')
                          ->get();

        $filename = 'products_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($products) {
            $file = fopen('php://output', 'w');
            
            // Header
            fputcsv($file, [
                'ID', 'Nama Produk', 'Kategori', 'Harga', 'Stok', 
                'Kondisi', 'Rating', 'Jumlah Rating', 'Tanggal Dibuat'
            ]);

            // Data
            foreach ($products as $product) {
                fputcsv($file, [
                    $product->id,
                    $product->product_name,
                    $product->category->name ?? '-',
                    $product->price,
                    $product->stock,
                    $product->condition === 'new' ? 'Baru' : 'Bekas',
                    $product->average_rating,
                    $product->rating_count,
                    $product->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

     public function analytics()
    {
        $products = Product::where('seller_id', auth()->user()->seller->id)->get();

        $analytics = [
            'total_products' => $products->count(),
            'total_stock' => $products->sum('stock'),
            'total_value' => $products->sum(function($p) {
                return $p->price * $p->stock;
            }),
            'average_price' => $products->avg('price'),
            'average_rating' => $products->avg('average_rating'),
            'products_by_condition' => [
                'new' => $products->where('condition', 'new')->count(),
                'used' => $products->where('condition', 'used')->count(),
            ],
            'stock_status' => [
                'in_stock' => $products->where('stock', '>', 10)->count(),
                'low_stock' => $products->where('stock', '<=', 10)->where('stock', '>', 0)->count(),
                'out_of_stock' => $products->where('stock', 0)->count(),
            ],
            'top_rated' => $products->sortByDesc('average_rating')->take(5)->values(),
            'most_reviewed' => $products->sortByDesc('rating_count')->take(5)->values(),
        ];

        return response()->json($analytics);
    }


}
