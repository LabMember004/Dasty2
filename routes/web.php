<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome'); // This should match the path to the welcome view
});

Route::get('/', [ProductController::class, 'index'])->name('welcome');

Route::resource('products', ProductController::class);
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Auth::routes();

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('welcome');
Route::resource('products', App\Http\Controllers\ProductController::class)->middleware('auth');
Route::get('/products/search', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search')->middleware('auth');
