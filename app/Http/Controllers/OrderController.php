<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->amount,
        ]);

        
        $totalCost = $product->cost * $request->quantity;

        
        Order::create([
            'product_id' => $productId,
            'quantity' => $request->quantity,
            'total_cost' => $totalCost,
        ]);

        return redirect()->route('product.show', $productId)->with('success', 'Order placed successfully');
    }
}

// $product = Product::findOrFail($productId); — находит продукт по его ID. Если продукт не найден, Laravel автоматически бросит исключение ModelNotFoundException, которое покажет 404-ю ошибку.

// $request->validate([...]); — выполняет валидацию данных формы. В данном случае проверяется количество (должно быть обязательным числом и находиться в пределах от 1 до максимального доступного количества).

// $totalCost = $product->cost * $request->quantity; — вычисляет общую стоимость заказа, умножая цену продукта на количество.

// Order::create([...]); — создаёт новую запись заказа в базе данных, используя массив с полями product_id, quantity и total_cost.

// return redirect()->route('product.show', $productId)->with('success', 'Order placed successfully'); — перенаправляет пользователя обратно на страницу продукта с сообщением об успешном размещении заказа.



// Product $product — благодаря "Route Model Binding", мы можем передавать модель продукта напрямую в метод контроллера. Это избавляет от необходимости вызывать Product::findOrFail($productId).

// $validated = $request->validate([...]); — результат валидации сохраняется в переменную $validated, которую мы используем для доступа к полям формы.