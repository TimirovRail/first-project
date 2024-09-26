<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <style>
        .product-display {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .product-card {
            border: 1px solid #ddd;
            padding: 15px;
            width: 200px;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
        }

        .product-card h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .product-card p {
            margin: 5px 0;
        }

        .product-card .out-of-stock {
            color: red;
        }

        .amount-prod {
            color: red;
        }
    </style>
</head>

<body>
    <div class="product-display">
        @foreach ($products as $product)
            <div class="product-card">
                <h2><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h2>
                <p>Cost: {{ $product->cost }}</p>
                <p>Amount: {{ $product->amount }}</p>
            </div>
        @endforeach
    </div>

</body>

</html>

<!-- @foreach ($products as $product) — это директива Blade, которая проходит по массиву $products (который передан контроллером в представление). Для каждого элемента массива (каждого продукта) создаётся карточка товара.

<h2><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h2> — для каждого продукта создается ссылка на страницу товара. Метод route('product.show', $product->id) генерирует URL для маршрута, который показывает информацию о конкретном товаре. Внутри тега <a> выводится имя товара.

<p>Cost: {{ $product->cost }}</p> — выводит стоимость продукта, используя синтаксис Blade {{ }} для безопасного отображения переменной.

<p>Amount: {{ $product->amount }}</p> — выводит количество продукта на складе. -->