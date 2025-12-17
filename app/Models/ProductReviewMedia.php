<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReviewMedia extends Model
{
    protected $fillable = ['review_id', 'media_path', 'media_type'];

    public function review()
    {
        return $this->belongsTo(ProductReview::class, 'review_id');
    }
}
