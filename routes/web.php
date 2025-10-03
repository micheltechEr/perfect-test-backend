<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSellController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Telas para ver o funcionamento sem dados
*/
Route::get( '/dashboard',[DashboardController::class,'dashboard']);
Route::get('/products', [ProductController::class,'index']);
Route::post('/product', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/sales', [ProductSellController::class, 'index']);
Route::post('/product_sell', [ProductSellController::class, 'store'])->name('product_sell.store');
Route::get('/sales/{id}', [ProductSellController::class, 'edit'])->name('product_sell.edit');
Route::put('/sales/{id}', [ProductSellController::class, 'update'])->name('product_sell.update');
