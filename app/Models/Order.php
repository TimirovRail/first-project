<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'total_cost',
    ];
}

// use HasFactory;:

// Это трейт, который подключает фабрику для модели. Фабрики используются для быстрого создания тестовых данных в базе данных. Этот трейт автоматически добавляется при генерации модели с помощью команды Artisan.
// protected $fillable = [...]:

// Это свойство определяет массив полей, которые могут быть массово присвоены (mass assignment).
// В массиве указаны поля product_id, quantity, и total_cost, что означает, что эти поля можно безопасно заполнять через массовое присвоение (например, используя Order::create($data)).