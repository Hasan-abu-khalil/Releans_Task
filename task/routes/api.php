<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['admin'])->group(function () {

    
    
    
    
    // product 
    Route::post('/add_product', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/update_product', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('delete.product');
    Route::get('/search/product', [ProductController::class, 'search'])->name('search_product');
    Route::post('/update-stock', [ProductController::class, 'updateStock'])->name('update.stock');
    
    
    // order 
    Route::post('/add_order', [OrderController::class, 'addOrder'])->name('add.order');
    Route::post('/delete_order', [OrderController::class, 'deleteOrder'])->name('delete.order');
    Route::get('/search/order', [OrderController::class, 'search_order'])->name('search_order');
    
    
    // cart
    Route::post('/add_cart', [CartController::class, 'addCart'])->name('add.cart');
    Route::post('/delete_cart', [CartController::class, 'deleteCart'])->name('delete.cart');
    Route::post('/update_cart', [CartController::class, 'updateCart'])->name('update.cart');
    Route::get('/search/cart', [CartController::class, 'search_cart'])->name('search_cart');
    
    
    // user
    Route::post('/add_user', [AuthController::class, 'addUser'])->name('add.user');
    Route::post('/update_user', [AuthController::class, 'updateUser'])->name('update.user');
    Route::post('/delete-user', [AuthController::class, 'deleteUser'])->name('delete.user');
    Route::get('/search/user', [AuthController::class, 'search_user'])->name('search_user');


});