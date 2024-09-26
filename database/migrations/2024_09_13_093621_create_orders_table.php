<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('total_cost');
            $table->timestamps();
        });
    }
    // Schema::create('orders', function (Blueprint $table) — создаёт новую таблицу с именем orders в базе данных. Внутри функции определяется структура таблицы.

    // $table->id(); — добавляет поле id, которое автоматически увеличивается и является первичным ключом.

    // $table->foreignId('product_id')->constrained()->onDelete('cascade'); — добавляет поле product_id, которое является внешним ключом, ссылающимся на таблицу products. Метод constrained() автоматически связывает поле с таблицей products (основываясь на соглашении об именах), а onDelete('cascade') указывает, что при удалении продукта все связанные заказы будут удалены (каскадное удаление).

    // $table->integer('quantity'); — добавляет поле quantity, которое хранит количество заказанного продукта.

    // $table->integer('total_cost'); — добавляет поле total_cost, которое хранит общую стоимость заказа.

    // $table->timestamps(); — добавляет два стандартных поля created_at и updated_at, которые автоматически заполняются временем создания и обновления записи.

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
