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
        if ($order->status !== 'new') {
            return back()->with('error', 'Этот заказ не может быть одобрен');
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
        if ($order->status !== 'approved') {
            return back()->with('error', 'Этот заказ не может быть доставлен');
        }

        $order->status = 'delivered';
        $order->save();
        return back()->with('success', 'Заказ доставлен');
    }
}

