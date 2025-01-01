<?php


use Illuminate\Support\Facades\Route;
Route::get('/users', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/website.php';



