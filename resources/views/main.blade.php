<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header class="header">
        <nav>
            <ul>
                <h1><a href="{{ route('product.index') }}">Товары</a></h1>
                @if(Auth::check())
                    <h1><a href="{{ route('orders.my') }}">Мои заказы</a></h1>
                    <h1>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Выйти</button>
                        </form>
                    </h1>
                @else
                    <h1><a href="{{ route('login') }}">Войти</a></h1>
                    <h1><a href="{{ route('register') }}">Регистрация</a></h>
                @endif
            </ul>
        </nav>
    </header>

</body>

</html>