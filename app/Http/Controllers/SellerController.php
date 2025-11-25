<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Seller;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function create()
    {
        // Jika sudah menjadi seller → langsung ke dashboard
        if (Auth::user()->seller) {
            return redirect()->route('seller.dashboard');
        }


        return view('seller.create'); // form buka toko
    }

  public function store(Request $request)
{
    $request->validate([
        'store_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'description' => 'nullable|string',
        'img' => 'nullable|file|image|max:2048', // max 2MB
    ]);

    // Simpan deskripsi, default '0' jika kosong
    $description = $request->description ?: '0';

    // Simpan gambar
    $imgFileName = '0'; // default skip
    if ($request->hasFile('img') && $request->img != '0') {
        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();
        // nama file = nama toko, spasi diganti underscore, lowercase
        $imgFileName = strtolower(preg_replace('/\s+/', '_', $request->store_name)) . '.' . $extension;

        // Hapus file lama jika ada (opsional, misal jika update nanti)
        // Storage::disk('public')->delete('seller_images/' . $imgFileName);

        // Simpan file ke storage/app/public/seller_images
        $file->storeAs('seller_images', $imgFileName, 'public');

    }

    // Simpan ke database
    $seller = Seller::create([
        'user_id' => Auth::id(),
        'store_name' => $request->store_name,
        'phone_number' => $request->phone_number,
        'description' => $description,
        'img' => $imgFileName,
    ]);

    return redirect('/home')->with('success', 'Toko berhasil dibuat!');   
}




    public function dashboard()
    {
        $seller = Auth::user()->seller;

        if (!$seller) {
            return redirect()->route('seller.create');
        }
                $sellerId = Auth::user()->seller->id;

        /* ------------------------------------------
         * 1. TOTAL PENDAPATAN (completed only)
         * ------------------------------------------ */
        $totalRevenue = Order::where('seller_id', $sellerId)
            ->where('status', 'completed')
            ->sum('total_price');

        $totalProducts = Product::where('seller_id', $sellerId)->get();

        /* ------------------------------------------
         * 2. TOTAL PRODUK TERJUAL (sum from order_details)
         * ------------------------------------------ */
        $totalSold = OrderDetail::whereHas('order', function ($q) use ($sellerId) {
            $q->where('seller_id', $sellerId)
              ->where('status', 'completed');
        })
        ->sum('quantity');

        /* ------------------------------------------
         * 3. TOTAL PRODUK TOKO PENJUAL
         * ------------------------------------------ */
        $totalProducts = Product::where('seller_id', $sellerId)->count();

        return view('SellerDashboard.sellerDashboard', ['seller'=>$seller, 'totalSold' => $totalSold, 'totalRevenue'=>$totalRevenue,'totalProducts'=>$totalProducts]);
    }
    
}
