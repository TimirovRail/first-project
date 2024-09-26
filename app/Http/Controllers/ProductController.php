<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    //Product::all() — получает все записи из таблицы products.
// compact('products') — передаёт переменную $products в представление. compact() создаёт массив, где ключ — это имя переменной, а значение — сама переменная.
// view('products.index', ...) — возвращает представление products/index.blade.php, в котором отображается список всех продуктов.


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
// Product::findOrFail($id) — находит продукт по идентификатору $id. Если продукт не найден, выбрасывается исключение 404 Not Found.
// view('products.show', ...) — возвращает представление products/show.blade.php, где отображаются данные о конкретном продукте.
