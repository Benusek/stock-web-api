<?php

use App\Http\Controllers\Admin\SupplyController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SupplyController::class, 'index'])->name('supplies.index');
Route::get('/{supply}/show', [SupplyController::class, 'show'])->name('supplies.show');
Route::get('/create', [SupplyController::class, 'create'])->name('supplies.create');
Route::post('/create', [SupplyController::class, 'store'])->name('supplies.store');
Route::get('/{supply}/edit', [SupplyController::class, 'edit'])->name('supplies.edit');
Route::post('/{supply}/update', [SupplyController::class, 'update'])->name('supplies.update');
Route::get('/{supply}/destroy', [SupplyController::class, 'destroy'])->name('supplies.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::get('/actions', function() {return view('actions.index');})->name('actions.index');

