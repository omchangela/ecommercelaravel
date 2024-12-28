<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Admin\IndepthProductDetailController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\HowToUseController;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    
//    Route::get('/dashboard', function () {
//        return view('admin.dashboard');
//    })->middleware(['verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');


    // Demo
    Route::resource('demoajax',\App\Http\Controllers\Admin\DemoajaxController::class);
    Route::resource('product',\App\Http\Controllers\Admin\ProductController::class);

    Route::get("dashboard",[\App\Http\Controllers\Admin\DashboardController::class,'dashboard'])
        ->middleware(['verified'])->name('dashboard');

    Route::resource('category',\App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');

    Route::resource('banners', BannerController::class);

    Route::resource('indepth-product-details', IndepthProductDetailController::class);
    Route::resource('ingredients', IngredientController::class);

    // Optional: If you need a specific route for showing ingredient details
    Route::get('ingredients-details/{id}', [IngredientController::class, 'show'])->name('ingredients.details');
    Route::resource('howtouses', HowToUseController::class);


});


