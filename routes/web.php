<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', WelcomeController::class)
    ->name('welcome');


Route::get('products/history', [ProductController::class, 'history'])
    ->name('products.history');

Route::get('/products/details/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/products/{line?}/{category?}', [ProductController::class, 'index'])
    ->name('products.index')
    ->scopeBindings();

Route::get('cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
