
<?php

use App\Http\Controllers\Website\WishlistController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\ReviewController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\ShopController;
use Illuminate\Support\Facades\Route;
// Home and Shop Routes
Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/productdetail/{id}', [ShopController::class, 'productDetail'])->name('product.detail');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    // Wishlist Routes
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::post('wishlist/add-to-cart/{id}', [WishlistController::class, 'addToCart'])->name('wishlist.add-to-cart');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart Routes
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

    // Review Routes
    Route::post('/product/{productId}/review', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/product/{productId}', [ReviewController::class, 'showReviews'])->name('product.show');
    Route::post('/review/{reviewId}/feedback', [ReviewController::class, 'updateReviewFeedback']);
    Route::post('/api/reviews/{id}/like', [ReviewController::class, 'like']);
    Route::post('/api/reviews/{id}/dislike', [ReviewController::class, 'dislike']);

    // Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/checkout/verifyPayment', [CheckoutController::class, 'verifyPayment'])->name('checkout.verifyPayment');
    Route::post('/checkout/createOrder', [CheckoutController::class, 'createOrder'])->name('createOrder');
    Route::post('/payment-success', [CheckoutController::class, 'paymentSuccess'])->name('checkout.paymentSuccess');
    Route::get('/checkout/success', fn() => view('checkout.success'))->name('checkout.success');
});
