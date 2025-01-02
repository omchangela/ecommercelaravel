<?php

// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'status',
        'payment_id',
    ];
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}