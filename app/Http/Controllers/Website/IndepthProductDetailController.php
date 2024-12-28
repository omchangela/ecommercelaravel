<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\IndepthProductDetail;

class IndepthProductDetailController extends Controller
{
    /**
     * Show the product detail page.
     */
    public function productDetail($id)
    {
        // Find the product details by ID
        $indepthProductDetail = IndepthProductDetail::with('product')->findOrFail($id);
        
        // Pass the product details data to the view
        return view('website.productdetails', compact('indepthProductDetail'));
    }
}

