@extends('layouts.main')

@section('content')
<h1>{{ $product->name }}</h1>

<p>Цена: {{ $product->cost }}</p>
@if($product->amount == 0)
    <p style="color: red;">Кол-во: {{ $product->amount }}</p>
@else
    <p>Кол-во: {{ $product->amount }}</p>
@endif

@if($product->amount > 0)
    <form action="{{ route('order.store', $product->id) }}" method="POST">
        @csrf
        <label for="quantity">Кол-во:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="{{ $product->amount }}" required>
        <button type="submit">Заказать</button>
    </form>
@endif  
@endsection