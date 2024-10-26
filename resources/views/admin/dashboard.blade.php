<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('layouts.main')

@section('content')
<h2>Список заказов</h2>
<table>
    <thead>
        <tr>
            <th>Название товара</th>
            <th>Количество</th>
            <th>Дата создания</th>
            <th>E-mail пользователя</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{  $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->user->email ?? 'Не указано' }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    @if ($order->status === 'new')
                        <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="button approve">Одобрить</button>
                        </form>
                    @endif

                    @if ($order->status === 'approved')
                        <form action="{{ route('admin.orders.deliver', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="button deliver">Доставить</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection