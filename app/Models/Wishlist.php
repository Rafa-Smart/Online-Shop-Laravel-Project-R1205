<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['buyer_id', 'product_id','wishlist_category_id'];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function category()
    {
        return $this->belongsTo(WishlistCategory::class, 'wishlist_category_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
