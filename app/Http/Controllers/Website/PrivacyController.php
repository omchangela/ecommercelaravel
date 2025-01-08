<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function showPrivacy()
    {
        // Fetch all terms and conditions from the database
        $privacy = Privacy::all();

        // Pass the terms to the frontend view
        return view('website.privacy', compact('privacy'));
    }
}
