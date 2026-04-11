<?php

use App\Http\Controllers\Admin\SupplyController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SupplyController::class, 'index'])->name('supplies.index');
Route::get('/2/show', [SupplyController::class, 'show'])->name('supplies.show');
Route::get('/2/create', [SupplyController::class, 'create'])->name('supplies.create');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

