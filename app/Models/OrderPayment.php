<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'street_address',
        'apt_suite',
        'city',
        'state',
        'zip_code',
        'country',
        'email',
        'phone',
        'billing_same_as_shipping',
        'total_price',
        'razorpay_payment_id',
        'razorpay_order_id',
        'razorpay_signature',
    ];
    protected $casts = [
        
        'total_price' => 'decimal:2', // Ensures the total_price is treated as a decimal
    ];
}
