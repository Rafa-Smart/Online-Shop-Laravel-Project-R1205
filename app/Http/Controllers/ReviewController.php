<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\ProductReviewMedia;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'media.*' => 'nullable|mimes:jpg,jpeg,png,mp4,mov|max:50000'
        ]);

        $user = Auth::user();

        // Cek apakah user sudah pernah review
        // $existing = ProductReview::where('product_id', $productId)
        //     ->where('user_id', $user->id)
        //     ->first();

        // if ($existing) {
        //     return back()->with('error', 'Anda sudah memberikan ulasan untuk produk ini.');
        // }

        // Simpan review
        $review = ProductReview::create([
            'product_id' => $productId,
            'user_id' => $user->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        // Upload Foto/Video (jika ada)
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('reviews', 'public');

                ProductReviewMedia::create([
                    'review_id' => $review->id,
                    'media_path' => $path,
                    'media_type' => $file->getMimeType(), // image/jpeg atau video/mp4
                ]);
            }
        }

        return back()->with('success', 'Ulasan berhasil dikirim!');
    }
}
