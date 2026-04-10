<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplyController;

Route::get('/', [SupplyController::class, 'index'])->name('supplies.index');
Route::get('/2/show', [SupplyController::class, 'show'])->name('supplies.show');
Route::get('/2/create', [SupplyController::class, 'create'])->name('supplies.create');

