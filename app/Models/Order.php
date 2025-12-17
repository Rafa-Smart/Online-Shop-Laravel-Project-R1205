<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'seller_id',
        'status',
        'total_price',
        'is_read'
    ];

    // 🔗 Relasi ke Buyer
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    // 🔗 Relasi ke Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // 🔗 Relasi ke OrderDetail
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
