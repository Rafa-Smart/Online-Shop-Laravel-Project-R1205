<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistCategory extends Model
{
    protected $fillable = ['name', 'buyer_id', 'description','wishlist_id'];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}

