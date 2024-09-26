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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('cost');
                $table->string('amount');
                $table->timestamps();
            });
        }
    }

    //if (!Schema::hasTable('products')) — перед созданием таблицы проверяется, существует ли уже таблица products. Если таблица не существует, выполняется её создание.

    // Schema::create('products', function (Blueprint $table) { ... }) — создаёт таблицу products с полями:

    // id() — первичный ключ.
// name — название продукта.
// cost — стоимость продукта.
// amount — количество продукта.
// timestamps() — два поля created_at и updated_at, которые автоматически заполняются временем создания и изменения записи.

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
