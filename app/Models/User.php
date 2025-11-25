<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'provider',
        'provider_id',
        'verification_token',
        "is_verified",
        'new_email',
        'new_email_verification_token',
        'new_email_requested_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 🔗 Relasi ke Buyer
    public function buyer()
    {
        return $this->hasOne(Buyer::class);
    }

    // 🔗 Relasi ke Seller
    public function seller()
    {
        return $this->hasOne(Seller::class);
    }


}
