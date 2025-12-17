<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
use HasFactory;


protected $fillable = [
'order_id',
'order_code',
'snap_token',
'snap_redirect_url',
'payment_type',
'transaction_status',
'transaction_id',
'va_number',
'bank',
'qr_link',
'payload'
];


protected $casts = [
'payload' => 'array'
];


public function order()
{
return $this->belongsTo(Order::class);
}
}