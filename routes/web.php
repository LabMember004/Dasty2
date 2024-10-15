<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\LoginController;
use App\Mail\MyTestEmail;

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

Route::post('/products/{product}/unfavorite', [ProductController::class, 'unfavorite'])->name('products.unfavorite');
Route::get('/favorites', [ProductController::class, 'showFavorites'])->name('products.favorites');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::put('dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
Route::get('dashboard/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');

Route::get('dashboard/products', [DashboardController::class, 'products'])->name('dashboard.products');
Route::delete('dashboard/products/{id}', [DashboardController::class, 'destroyProduct'])->name('dashboard.destroyProduct');



Route::get('/my-products', [ProductController::class, 'myProduct'])->name('products.myProduct')->middleware('auth');


Route::get('/dashboard/register', [DashboardRegisterController::class, 'showRegistrationForm'])
    ->name('dashboard.register');
Route::post('/dashboard/register', [DashboardUserController::class, 'register'])->name('dashboard.register.post');

Route::get('/dashboard/login', [DashboardUserController::class, 'showLoginForm'])->name('dashboard.login');
Route::post('/dashboard/login', [DashboardUserController::class, 'login'])->name('dashboard.login.submit');


Route::post('/logout', [LoginController::class, 'logout'])->name('dashboard.logout');



Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/dashboard/change-password', [DashboardUserController::class, 'showChangePasswordForm'])->name('dashboard.password.change');
Route::post('/dashboard/change-password', [DashboardUserController::class, 'changePassword'])->name('dashboard.password.update');

Route::post('/dashboard/logout', [DashboardUserController::class, 'logout'])->name('dashboard.logout');







Auth::routes();

