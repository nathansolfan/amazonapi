<?php

use App\Http\Controllers\AmazonProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}/price', [ProductController::class, 'updatePrice']);

Route::get('/search', [AmazonProductController::class, 'search']);
