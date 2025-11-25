<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistCategory extends Model
{
    protected $fillable = ['name', 'buyer_id', 'description'];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    // Kategori memiliki banyak wishlist item
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}

