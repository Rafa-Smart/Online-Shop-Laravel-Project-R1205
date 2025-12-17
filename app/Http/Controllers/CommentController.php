<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request, $productId)
    {
        // return auth()->user()->id;
        // Validasi input komentar
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $buyer = Buyer::where("user_id", auth()->user()->id)->first();
        // return $buyer;
        $request['buyer_id'] = $buyer->id;
        $request['product_id'] = $productId;

        // Simpan komentar ke database (asumsikan ada model Comment)
        // return $request;
        Comment::create($request->all());
        
        // Redirect kembali ke halaman produk dengan pesan sukses
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    
}
