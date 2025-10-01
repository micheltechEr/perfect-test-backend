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
Route::get('/',[HomeController::class,'index']);
Route::get( '/dashboard',[DashboardController::class,'dashboard']);
Route::get('/sales', [ProductController::class, 'sell_product']);
Route::get('/products', function () {
    return view('crud_products');
});
Route::post('/product', [ProductController::class, 'store']);
Route::post('/product_sell', [ProductSellController::class, 'store']);
