<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share wishlist count
        View::composer('*', function ($view) {
            $wishlistCount = Auth::check() ? Wishlist::where('user_id', Auth::id())->count() : 0;
            $view->with('wishlistCount', $wishlistCount);
        });

        // Share cart count and cart items
        View::composer('*', function ($view) {
            $cartCount = 0;
            $cartItems = [];

            if (Auth::check()) {
                $cartCount = Cart::where('user_id', Auth::id())->count();
                $cartItems = Cart::where('user_id', Auth::id())->get();
            }

            $view->with([
                'cartCount' => $cartCount,
                'cartItems' => $cartItems
            ]);
        });
    }
}
