<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController; 

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/{id}/order', [OrderController::class, 'store'])->name('order.store');
