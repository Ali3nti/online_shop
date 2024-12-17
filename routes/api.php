<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarketController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::namespace("Api")->prefix('')->group(function () {

    /*
     * Market Controller Routing
     * 
     */

    Route::get('all_markets',         [MarketController::class,          'all_markets']);

    /*
     * Product Controller Routing
     * 
     */
    Route::get('all_products',        [ProductController::class,          'all_products']);
    Route::get('product',             [ProductController::class,          'product']);
    Route::get('cat_products',        [ProductController::class,          'cat_products']);
    Route::post('add_product',        [ProductController::class,          'add_product']);

    /*
     * Category Controller Routing
     * 
     */
    Route::get('all_categories',        [CategoryController::class,          'all_categories']);

    /*
     * Category Controller Routing
     * 
     */
    Route::post('user',        [UserController::class,          'user'  ]);
    Route::post('signUp',      [UserController::class,          'signUp']);
});
