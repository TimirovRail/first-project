<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController; 

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/{id}/order', [OrderController::class, 'store'])->name('order.store');


// Route::get('/product', [ProductController::class, 'index'])->name('product.index');:

// Этот маршрут реагирует на HTTP-запросы типа GET по URL /product.
// Когда пользователь перейдет на /product, будет вызван метод index контроллера ProductController.
// Имя маршрута — product.index. Это используется для удобного создания ссылок в приложении (например, в представлениях Blade можно использовать route('product.index')).
// Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');:

// Этот маршрут также реагирует на HTTP-запросы GET, но на динамический URL /product/{id}.
// {id} — это переменная часть URL, которая передает ID товара в метод show контроллера ProductController.
// Например, если пользователь перейдет на /product/1, будет вызван метод show, и ему будет передан ID равный 1.
// Имя маршрута — product.show, что делает его легкодоступным для ссылок.
// Route::post('/product/{id}/order', [OrderController::class, 'store'])->name('order.store');:

// Этот маршрут отвечает на POST-запросы на URL /product/{id}/order.
// Он вызывает метод store контроллера OrderController.
// Обычно такие маршруты используются для обработки данных форм, таких как форма заказа. Например, форма отправляет данные на этот маршрут для создания заказа.
// Имя маршрута — order.store, используется для отправки формы.