<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'image'];

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 'Active');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
