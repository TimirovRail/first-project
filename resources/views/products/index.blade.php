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
        .amount-prod{
            color: red;
        }
    </style>
</head>

<body>

    <div class="product-display">
        @foreach ($products as $product)
            <div class="product-card">
                <h2>{{ $product->name }}</h2>
                <p>Цена: {{ $product->cost }}</p>
                <p class="amount-prod">Кол-во: {{ $product->amount > 0 ? $product->amount : 'Нет в наличии' }}</p>
            </div>
        @endforeach
    </div>

</body>

</html>