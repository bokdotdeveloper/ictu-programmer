<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Products resource controller (handles all CRUD operations)
Route::resource('products', ProductController::class);

// Products listing route (optional, but redundant since index() already exists in the resource route)
Route::get('/products', function () {
    $products = Product::all();
    return view('products', compact('products'));
})->name('products.index');
