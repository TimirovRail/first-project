@extends('layouts.app')

@section('content')
<h1>Мои заказы</h1>

@if ($orders->isEmpty())
    <p>У вас нет заказов.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Товар</th>
                <th>Количество</th>
                <th>Стоимость</th>
                <th>Дата заказа</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total_cost }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection