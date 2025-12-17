<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'product_id',
        'quantity',
    ];

    // 🔗 Relasi ke Buyer
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    // 🔗 Relasi ke Produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
