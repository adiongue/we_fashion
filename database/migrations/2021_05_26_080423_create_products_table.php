<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->float('price');
            $table->enum('sizes', ['XS', 'S', 'M', 'L', 'XL']);
            $table->enum('visible', ['published', 'unpublished']);
            $table->enum('state', ['discount', 'standard']);
            $table->string('reference', 16)->nullable();
            $table->unsignedInteger('category_id')->nullable();

            $table->foreign('category_id')->references('id')->on('categories');
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
