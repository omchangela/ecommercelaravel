<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    // Add all fillable fields, including the new ones
    protected $fillable = [
        'name', 
        'description', 
        'image', 
        'multiple_images', // Add this field
        'status', 
        'category_id', 
        'rate', 
        'review_count'
    ];

    // Cast the multiple_images field as JSON
    protected $casts = [
        'multiple_images' => 'array', // Ensures the field is handled as an array
    ];

    // Append custom attributes to the model's JSON form
    protected $appends = ['image_url'];

    // Accessor for the image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    // Accessor for multiple image URLs
    public function getMultipleImagesUrlsAttribute()
    {
        return $this->multiple_images ? array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->multiple_images) : [];
    }

    // Define relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define relationship with Prices (a product can have many prices)
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'product_id');
    }

    public function indepthDetails()
    {
        return $this->hasMany(IndepthProductDetail::class);
    }
    
    // Handle events when deleting the model
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($object) {
            // Add logic to handle file deletion
            if ($object->image) {
                \Storage::delete('public/' . $object->image);
            }

            // Handle deletion of multiple images
            if ($object->multiple_images) {
                foreach ($object->multiple_images as $image) {
                    \Storage::delete('public/' . $image);
                }
            }
        });
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    // Helper method to calculate average rating
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

    // Helper method to get reviews count
    public function reviewsCount()
    {
        return $this->reviews()->count();
    }
}