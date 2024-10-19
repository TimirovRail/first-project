<!-- @extends('layouts.main')

@section('content')
<h1>Заказы</h1>

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
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->user_email }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit">Одобрить</button>
                    </form>

                    <form action="{{ route('admin.orders.deliver', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit">Доставить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection -->