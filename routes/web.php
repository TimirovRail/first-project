<?php

use Illuminate\Support\Facades\Route;

const INPUT = [
    ["name" => "Orange", "cost" => "5000", "amount" => "20"],
    ["name" => "Banana", "cost" => "1000", "amount" => "10"],
    ["name" => "Apple", "cost" => "500", "amount" => "0"],
];

Route::get('/products', function () {
    return view('products', ['products' => INPUT]);
});