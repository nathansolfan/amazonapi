<?php

use App\Http\Controllers\AmazonProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}/price', [ProductController::class, 'updatePrice']);

Route::get('/product/{asin}', [AmazonProductController::class, 'show']);
