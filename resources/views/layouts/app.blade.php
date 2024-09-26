<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <h1>Заказ</h1>
    </header>

    <div class="container">
        @yield('content') 
    </div>
</body>

</html>

<!-- 
Это директива Blade, которая позволяет вставлять динамическое содержимое в этот шаблон.
@yield('content') используется для того, чтобы вложенные шаблоны могли подставлять свое содержимое в эту секцию. Например, если на странице товара нужно отобразить форму заказа, она будет подставляться в это место через секцию @section('content') во вложенном шаблоне. -->