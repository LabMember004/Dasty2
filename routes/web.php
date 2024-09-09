<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Home route
Route::get('/', [ProductController::class, 'index'])->name('welcome');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth'); 
Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');
Route::get('/products/category/{category}', [ProductController::class, 'filterByCategory'])->name('products.filter');
Route::post('/products/{product}/favorite', [ProductController::class, 'favorite'])->name('products.favorite');

// Route for viewing all favorited products
Route::post('/products/{product}/unfavorite', [ProductController::class, 'unfavorite'])->name('products.unfavorite');
Route::get('/favorites', [ProductController::class, 'showFavorites'])->name('products.favorites');




Route::get('/my-products', [ProductController::class, 'myProduct'])->name('products.myProduct')->middleware('auth');

Route::get('/search', [ProductController::class, 'search'])->name('products.search');

// Authentication routes
Auth::routes();

