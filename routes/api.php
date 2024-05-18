<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::prefix('product')->group(function () {
    Route::get('', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'find']);
    Route::post('', [ProductController::class, 'store']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
    Route::post('/filter', [ProductController::class, 'findByCategoryAndPriceRange']);
    Route::post('/list-prices/', [ProductController::class, 'listOfPriceByProductsAvalible']);
});

Route::prefix('category')->group(function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'find']);
    Route::post('', [CategoryController::class, 'store']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});