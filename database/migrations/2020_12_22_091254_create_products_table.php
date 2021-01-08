<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->nullable();
            $table->string('slug', 191);
            $table->text('sortDescription');
            $table->longText('description');
            $table->string('price', 191);
            $table->string('quantity', 191);
            $table->enum('category', ['personalCare', 'healthCare', 'beautyCare', 'argoCare', 'homeCare', 'animalCare']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
