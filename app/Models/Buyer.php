<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'phone_number',
        'img'
    ];

    // 🔗 Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relasi ke Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // 🔗 Relasi ke Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // 🔗 Relasi ke Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
        public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }   

            public function wishlistCategories()
    {
        return $this->hasMany(WishlistCategory::class);
    }

}
