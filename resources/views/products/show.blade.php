@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Cost: {{ $product->cost }}</p>
    <p>Amount: {{ $product->amount }}</p>

    
    <form action="{{ route('order.store', $product->id) }}" method="POST">
        @csrf
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="{{ $product->amount }}" required>
        <button type="submit">Order</button>
    </form>
@endsection
