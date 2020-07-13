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
            $table->bigIncrements('id');
            $table->integer('mainCategory_id');
            $table->integer('subCategory_id');
            $table->string('product_name');
            $table->string('condition');
            $table->integer('price');
            $table->string('seller_name');
            $table->integer('seller_phone');
            $table->string('email');
            $table->string('location');
            $table->string('city');
            $table->text('photos');
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
