<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome'); // This should match the path to the welcome view
});

Route::get('/', [ProductController::class, 'index'])->name('welcome');

Route::resource('products', ProductController::class);
