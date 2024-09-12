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