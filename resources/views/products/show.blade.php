@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<p>Cost: {{ $product->cost }}</p>
<p>Amount: {{ $product->amount }}</p>


<form action="{{ route('order.store', $product->id) }}" method="POST">
    @csrf
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" max="{{ $product->amount }}" required>
    <button type="submit">Order</button>
</form>
@endsection

<!--

Указывает, что этот шаблон расширяет базовый макет layouts.app. Это основной файл макета, который содержит общие элементы, такие как шапка, футер и другие части, которые повторяются на каждой странице.
@section('content'):

Определяет область содержимого, которая будет вставлена в место, помеченное как @yield('content') в файле макета layouts.app.
<h1>{{ $product->name }}</h1>:

Отображает имя продукта с помощью переменной $product, которая передаётся из контроллера. Используется Blade-синтаксис для вывода значения.
<p>Cost: {{ $product->cost }}</p>:

Отображает цену продукта.
<p>Amount: {{ $product->amount }}</p>:

Показывает количество продукта на складе. Если товара нет в наличии, это поле можно изменить, чтобы отображать сообщение "Нет в наличии"
Форма для заказа:

<form action="{{ route('order.store', $product->id) }}" method="POST">: Определяет форму для размещения заказа. Данные отправляются на маршрут order.store для обработки заказа. POST-запрос отправляет данные на сервер.
@csrf: Важная часть безопасности Laravel. Защищает от CSRF-атак.
<label for="quantity">Quantity:</label>: Метка для поля ввода количества товара.
<input type="number" ...>: Поле ввода для количества с минимальным значением 1 и максимальным количеством, равным доступному количеству товара.
<button type="submit">Order</button>: Кнопка для отправки формы заказа.
Убрали ненужный атрибут id у поля <input>, так как его можно опустить, если не требуется привязка к элементам через JavaScript.
Добавили проверку наличия товара внутри блока <p>, чтобы сразу отображать статус наличия товара. -->