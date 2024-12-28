<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;
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
    public function boot()
{

    
    View::composer('*', function ($view) {
        $wishlistCount = 0;

        if (Auth::check()) {
            $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        }

        $view->with('wishlistCount', $wishlistCount);
    });

    View::composer('*', function ($view) {
        $cartCount = 0;

        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->count();
        }

        $view->with('cartCount', $cartCount);
    });

    view()->composer('*', function ($view) {
        $cartItems = Cart::where('user_id', auth()->id())->get(); // Adjust the query as needed.
        $view->with('cartItems', $cartItems);
    });
}
}
