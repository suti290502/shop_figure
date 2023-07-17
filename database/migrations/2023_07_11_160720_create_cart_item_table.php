<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item', function (Blueprint $table) {
            $table->increments('cart_item_id');
            $table->integer('quantity');
            $table->decimal('price');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('figure_id');
            $table->foreign('figure_id')->references('figure_id')->on('figure');
            $table->foreign('order_id')->references('order_id')->on('order');
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
        Schema::dropIfExists('cart_item');
    }
};