<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemTable extends Migration
{
    public function up()
    {
        Schema::create('cart_item', function (Blueprint $table) {
            $table->increments('cart_item_id');
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('cart_id')->on('cart');
            $table->integer('figure_id')->unsigned();
            $table->foreign('figure_id')->references('figure_id')->on('figure');
            $table->integer('quantity');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_item');
    }
}
