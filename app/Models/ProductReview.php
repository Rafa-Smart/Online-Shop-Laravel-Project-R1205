<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'rating', 'comment'
    ];

    public function medias()
    {
        return $this->hasMany(ProductReviewMedia::class, 'review_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
