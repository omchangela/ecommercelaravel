<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ReturnPolicy;

class ReturnController extends Controller
{
    public function showReturnPolicy()
    {
        // Fetch the latest return policies
        $returnpolicy = ReturnPolicy::query()->get();

        // Pass the data to the view
        return view('website.returnpolicy', compact('returnpolicy'));
    }
}
