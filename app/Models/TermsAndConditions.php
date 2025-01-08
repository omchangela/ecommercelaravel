<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TermsAndConditions extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    // Automatically generate a slug when creating or updating the model
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($terms) {
    //         $terms->slug = Str::slug(substr($terms->description, 0, 50), '-');
    //     });

    //     static::updating(function ($terms) {
    //         $terms->slug = Str::slug(substr($terms->description, 0, 50), '-');
    //     });
    // }
}
