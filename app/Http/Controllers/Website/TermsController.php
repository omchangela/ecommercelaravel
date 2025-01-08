<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function showTerms()
    {
        // Fetch all terms and conditions from the database
        $terms = TermsAndConditions::all();

        // Pass the terms to the frontend view
        return view('website.terms', compact('terms'));
    }
}
