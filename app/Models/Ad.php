<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'seller_id',
        'product_id',
        'title',
        'headline',
        'description',
        'button_text',
        'button_link',
        'bg_image',
        'is_active'
    ];

    public function seller() {
        return $this->belongsTo(Seller::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}

