<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

protected $fillable = [
    'seller_id',
    'category_id',
    'product_name',
    'description',
    'price',
    'stock',
    'img',
    'starting_price',
    'condition',
    'product_specifications', // ← WAJIB TAMBAH INI
];

       protected $casts = [
        'product_specifications' => 'array', // WAJIB
    ];

    // 🔗 Relasi ke Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // 🔗 Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Categorie::class,'category_id');
    }

    // 🔗 Relasi ke Foto Produk
    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    // 🔗 Relasi ke Komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // 🔗 Relasi ke OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // 🔗 Relasi ke Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function sellers()
{
    return $this->belongsTo(Seller::class, 'seller_id');
}

public function reviews()
{
    return $this->hasMany(ProductReview::class);
}

// Mendapatkan rata-rata rating
public function getAverageRatingAttribute()
{
    if ($this->reviews->count() == 0) {
        return 0;
    }

    return round($this->reviews->avg('rating'), 1);
}
public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}

}
