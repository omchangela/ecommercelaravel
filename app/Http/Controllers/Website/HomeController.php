<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Assuming Product model exists
use App\Models\Banners;  // Assuming Banner model exists
use App\Models\Category; // Assuming Category model exists
use App\Models\InstagramShowcase; // Import the InstagramShowcase model
use App\Models\ProductBanner;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        // Fetch data dynamically
        $products = Product::get();    // Get all products
        $banners = Banners::all();      // Get all banners
        $categories = Category::all(); // Get all categories
        $instagramImages = InstagramShowcase::all(); // Get all Instagram images
        $productBanners = ProductBanner::all();
        // Pass data to the view
        return view('website.home', [
            'products' => $products,
            'banners' => $banners,
            'categories' => $categories,
            'instagramImages' => $instagramImages, // Passing Instagram images
            'productBanners' => $productBanners, // Passing Instagram images
        ]);
    }
}
