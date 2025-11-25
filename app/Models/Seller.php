<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_name',
        'description',
        'phone_number',
        'img',
    ];

    // 🔗 Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relasi ke Produk
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // 🔗 Relasi ke Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
