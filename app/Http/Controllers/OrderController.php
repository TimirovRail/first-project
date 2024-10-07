<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Проверка на наличие товара
        if ($product->amount == 0) {
            return redirect()->route('product.show', $productId)
                ->with('error', 'This product is out of stock and cannot be ordered.');
        }

        // Валидация заказа
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->amount,
        ]);

        // Подсчет общей стоимости
        $totalCost = $product->cost * $request->quantity;

        // Создание заказа с указанием авторизованного пользователя
        Order::create([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'total_cost' => $totalCost,
        ]);

        return redirect()->route('main.blade', $productId);
    }
    public function myOrders()
    {
        // Получаем заказы текущего пользователя
        $orders = Order::where('user_id', Auth::id())->get();

        // Возвращаем их на страницу с заказами
        return view('orders.my', ['orders' => $orders]);
    }
}
