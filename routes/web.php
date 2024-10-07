<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


// Главная страница
Route::get('/', function () {
    return view('main');
});
Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my')->middleware('auth');
// Маршруты для продуктов
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Заказ доступен только для авторизованных пользователей
Route::post('/product/{id}/order', [OrderController::class, 'store'])->name('order.store')->middleware('auth');

// Маршруты для авторизации
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Маршруты для регистрации
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
