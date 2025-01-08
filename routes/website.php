
<?php

use App\Http\Controllers\Website\ReturnController;
use App\Http\Controllers\Website\WishlistController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\ReviewController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\ShopController;
use App\Http\Controllers\Website\InstagramController;

use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\PaymentController;
use App\Http\Controllers\Website\PrivacyController;
use App\Http\Controllers\Website\TermsController;



use Illuminate\Support\Facades\Route;
// Home and Shop Routes
Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/productdetail/{id}', [ShopController::class, 'productDetail'])->name('product.detail');


Route::get('/pages/terms', [TermsController::class, 'showTerms'])->name('terms');
Route::get('/pages/privacy', [PrivacyController::class, 'showprivacy'])->name('privacy');
Route::get('/pages/returnpolicy', [ReturnController::class, 'showreturnpolicy'])->name('returnpolicy');

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
    Route::post('/create-order', [PaymentController::class, 'createOrder']);
    Route::post('/payment-callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback');
    Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/payment-status', function () {
        return view('payment-status');
    })->name('payment.status');

    
});
