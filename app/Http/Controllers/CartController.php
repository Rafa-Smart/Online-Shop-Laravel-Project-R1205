<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Cart;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getAllCarts(Request $request)
    {
        // 1. Ambil ID Buyer yang sedang login
        $userId = Auth::id();
        $buyer = Buyer::where('user_id', $userId)->first();

        // Cek jika buyer tidak ditemukan
        if (!$buyer) {
            // Misalnya redirect atau tampilkan pesan error jika user belum terdaftar sebagai buyer
            return redirect('/')->with('error', 'Akun Buyer tidak ditemukan.');
        }

        // 2. Ambil semua item keranjang milik buyer ini, dengan relasi product,
        // dan nested relasi product.seller.
        $carts = Cart::where('buyer_id', $buyer->id)
            ->with(['product.seller']) // Ganti 'product.sellers' menjadi 'product.seller'
            ->get();

        // 3. Kelompokkan item keranjang berdasarkan ID Penjual (seller_id)
        // Kita menggunakan map() untuk menambahkan seller_id ke setiap item Cart agar mudah di-group.
        $groupedCarts = $carts->map(function ($cart) {
            // Tambahkan seller_id ke objek Cart
            $cart->seller_id = $cart->product->seller->id ?? null;
            $cart->store_name = $cart->product->seller->store_name ?? 'Toko Tidak Dikenal';
            return $cart;
        })
        // Grouping utama berdasarkan seller_id
        ->groupBy('seller_id');


        // 4. Ambil semua data Seller yang relevan (agar data toko lengkap)
        // Ambil ID Penjual yang ada di groupedCarts
        $sellerIds = $groupedCarts->keys()->toArray();

        // Ambil semua objek Seller
        $sellers = Seller::whereIn('id', $sellerIds)->get()->keyBy('id');


        return view('pages.carts', [
            'groupedCarts' => $groupedCarts, // Data keranjang yang sudah dikelompokkan
            'sellers' => $sellers, // Data seller lengkap
        ]);
    }

    public function addToCart(Request $request, $product_id)
    {

        $userId = Auth::id();
        $buyer = Buyer::where('user_id', $userId)->first();
        
        if (!$buyer) {
            return redirect()->back()->with('error', 'Anda harus terdaftar sebagai Buyer.');
        }

        $buyerId = $buyer->id;

        $existingCartItem = Cart::where('product_id', $product_id)
            ->where('buyer_id', $buyerId)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += 1;
            $existingCartItem->save();

            return redirect()->back()->with('success', 'Kuantitas produk berhasil ditambahkan ke keranjang!');
        } else {
            Cart::create([
                'product_id' => $product_id,
                'buyer_id' => $buyerId,
                'quantity' => 1, // Pastikan ini ada di model Cart Anda
            ]);

            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }
    }

    public function delete($id){
        Cart::where('id', $id)
        ->delete();
        return redirect()->route('showCarts')->with(['success'=>'data cart dihapus !']);
    }
}