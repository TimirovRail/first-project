<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Главная страница
Route::get('/', function () {
    return view('layouts.main'); // Главная страница
});

// Маршруты для заказов (только для авторизованных пользователей)
Route::middleware('auth')->group(function () {
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my');
    Route::post('/product/{id}/order', [OrderController::class, 'store'])->name('order.store');
});

// Маршруты для продуктов
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show'); 

// Маршруты для авторизации
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [LoginController::class, 'login']); 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Маршруты для регистрации
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']); 

// Админ маршруты
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/orders', [AdminController::class, 'showOrders'])->name('admin.orders');
    Route::post('/admin/orders/approve/{id}', [AdminController::class, 'approveOrder'])->name('admin.orders.approve');
    Route::post('/admin/orders/deliver/{id}', [AdminController::class, 'deliverOrder'])->name('admin.orders.deliver');
});

