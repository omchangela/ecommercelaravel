<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'product_image',
        'price',
        'unit',
        'user_id',
    ];
    
    
}
