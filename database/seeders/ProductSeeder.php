<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            ['name' => 'Orange', 'cost' => 5000, 'amount' => 20],
            ['name' => 'Banana', 'cost' => 1000, 'amount' => 10],
            ['name' => 'Apple', 'cost' => 500, 'amount' => 0],
            ['name' => 'Mango', 'cost' => 100, 'amount' => 10],
            ['name' => 'Pineapple', 'cost' => 50, 'amount' => 0],
            ['name' => 'Grape', 'cost' => 10, 'amount' => 10],
        ]);
    }
}

// Product::insert([...]); — используется для вставки нескольких записей в таблицу products. Этот метод принимает массив данных, где каждый элемент массива представляет собой массив с полями для одной строки в таблице.

// Каждая запись содержит три поля:

// name — имя продукта (например, "Orange").
// cost — стоимость продукта (например, 5000 для "Orange").
// amount — количество продукта на складе (например, 20 для "Orange"). Если количество равно 0, продукт считается "Нет в наличии".