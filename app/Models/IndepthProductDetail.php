<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndepthProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'image',
        'description',
    ];
    public function product()
{
    return $this->belongsTo(Product::class);
}

}
