<?php

use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

// Route::get('test',[TestController::class, "index"]);
Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'home'])->name('home');
Route::get('/productdetail/{id}', [App\Http\Controllers\Website\ProductdetailController::class, 'productDetail'])->name('product.detail');


Route::middleware('auth')->group(function () {
    // Wishlist routes
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::delete('wishlist/destroy/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::post('wishlist/add-to-cart/{id}', [WishlistController::class, 'addToCart'])->name('wishlist.add-to-cart');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');

    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

    Route::post('/product/{productId}/review', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/product/{productId}', [ReviewController::class, 'showReviews'])->name('product.show');
    Route::post('/review/{reviewId}/feedback', [ReviewController::class, 'updateReviewFeedback']);
    Route::post('/api/reviews/{id}/like', [ReviewController::class, 'like']);
    Route::post('/api/reviews/{id}/dislike', [ReviewController::class, 'dislike']);

    Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/order/{order}', [CheckoutController::class, 'showOrderConfirmation'])->name('order.confirmation');
    Route::get('/checkout/success', function () {
        return view('checkout.success');
    })->name('checkout.success');

    // Add the missing verifyPayment route
    Route::post('/checkout/verifyPayment', [CheckoutController::class, 'verifyPayment'])->name('checkout.verifyPayment');

    // Other existing routes
    Route::post('/checkout/createOrder', [CheckoutController::class, 'createOrder'])->name('createOrder');
    Route::post('/payment-success', [CheckoutController::class, 'paymentSuccess'])->name('checkout.paymentSuccess');
});
