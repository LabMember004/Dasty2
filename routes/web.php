<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{product}/edit', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
