<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Assuming Product model exists
use App\Models\banners;  // Assuming Banner model exists
use App\Models\Category; // Assuming Category model exists


class HomeController extends Controller
{
    
    public function home(Request $request)
    {
        // Fetch data dynamically
        $products = Product::get();    // Get all products
        $banners = banners::all();      // Get all banners
        $categories = Category::all(); // Get all categories

        // Pass data to the view
        return view('website.home', [
            'products' => $products,
            'banners' => $banners,
            'categories' => $categories
        ]);


    }
}
