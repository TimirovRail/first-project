<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.dashboard', compact('orders'));
    }

    public function showOrders()
    {
        $orders = Order::with(['product', 'user', 'asc'])->get();
        return view('admin.orders', compact('orders'));

    }

    public function approveOrder($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return back()->with('error', 'Заказ не найден');
        }
        if ($order->status !== 'new') {
            return back()->with('error', 'Этот заказ не может быть одобрен');
        }
        if (!Auth::user() || !Auth::user()->hasRole('admin')) {
            return back()->with('error', 'У вас нет прав для изменения статуса заказа');
        }
        if ($order->product->amount >= $order->quantity) {
            $order->product->amount -= $order->quantity;
            $order->product->save();
            $order->status = 'approved';
            $order->save();
            return back()->with('success', 'Заказ одобрен');
        }
        return back()->with('error', 'Недостаточно товара на складе');
    }

    public function deliverOrder($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return back()->with('error', 'Заказ не найден');
        }
        if ($order->status !== 'approved') {
            return back()->with('error', 'Этот заказ не может быть доставлен');
        }
        if (!Auth::user() || !Auth::user()->hasRole('admin')) {
            return back()->with('error', 'У вас нет прав для изменения статуса заказа');
        }
        $order->status = 'delivered';
        $order->save();
        return back()->with('success', 'Заказ доставлен');
    }


    private function isStockAvailable($order)
    {
        return true;
    }
}

