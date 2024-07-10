<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

Route::post('/product', [ProductController::class, 'store']);
Route::put('/product/{id}/price', [ProductController::class, 'updatePrice']);
});
