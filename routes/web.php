<?php

use App\Http\Controllers\Admin\ActionController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SupplyController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('authorization');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/supplies', [SupplyController::class, 'index'])->name('supplies.index');
    Route::get('/supplies/{supply}/show', [SupplyController::class, 'show'])->name('supplies.show');
    Route::get('/supplies/create', [SupplyController::class, 'create'])->name('supplies.create');
    Route::post('/supplies/create', [SupplyController::class, 'store'])->name('supplies.store');
    Route::get('/supplies/{supply}/edit', [SupplyController::class, 'edit'])->name('supplies.edit');
    Route::post('/supplies/{supply}/update', [SupplyController::class, 'update'])->name('supplies.update');
    Route::get('/supplies/{supply}/destroy', [SupplyController::class, 'destroy'])->name('supplies.destroy');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::post('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/{product}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/actions', [ActionController::class, 'index'])->name('actions.index');
    Route::get('/write-off/create', [ActionController::class, 'trashes'])->name('trashes.create');
    Route::post('/write-off/create', [ActionController::class, 'trashes_store'])->name('trashes.store');
    Route::get('/adjustments/create', [ActionController::class, 'adjustments'])->name('adjustments.create');
    Route::post('/adjustments/create', [ActionController::class, 'trashes_store'])->name('trashes.store');
});
