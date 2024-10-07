<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset(path: 'css/app.css') }}">
</head>

<body>
    <div class="product-display">
        @foreach ($products as $product)
            <div class="product-card">
                <h2><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h2>
                <p>Цена:{{ $product->cost }}</p>
                <p>Количество: {{ $product->amount }}</p>
            </div>
        @endforeach
    </div>

</body>

</html>
