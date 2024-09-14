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
