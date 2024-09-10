<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продукты</title>
</head>

<body>
    <h1>Список продуктов</h1>
    <div class="products">
        @foreach ($products as $product)
            @component('components.product-card', ['product' => $product])
            @endcomponent
        @endforeach
    </div>
</body>

</html>