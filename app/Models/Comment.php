<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'buyer_id',
        'content',
        'rating',
    ];

    // 🔗 Relasi ke Produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // 🔗 Relasi ke Buyer
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}
