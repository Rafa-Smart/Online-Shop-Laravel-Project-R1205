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

    public function index()
    {
        $products = Product::where('seller_id', auth()->user()->seller->id)->get();
        // return auth()->user()->seller->id; // ada
        // return $products;

        return view('SellerDashboard.products.readProduct', compact('products'));
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
    'description' => 'required|string',
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
    'description' => $request->description,
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
}
