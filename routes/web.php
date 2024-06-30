<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('landing');
});


Route::get('/product', function () {
    return view('products');
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/pdf', [ProductController::class, 'pdf']);
