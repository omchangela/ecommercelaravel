<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'name', 'email', 'rating', 'title', 'message', 'images', 'helpful_count', 'not_helpful_count'
    ];
    
    

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    protected $casts = [
        'images' => 'array', // Automatically serialize/deserialize the images field
    ];
    
}
