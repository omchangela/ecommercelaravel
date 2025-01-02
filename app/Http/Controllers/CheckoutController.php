<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        // Handle the checkout logic here
        return view('checkout.success'); // Replace with the appropriate view or redirect
    }
    public function showCheckout()
{
    $cartItems = session()->get('cartItems', []); // Or fetch from database
    return view('checkout', compact('cartItems'));
}

}
