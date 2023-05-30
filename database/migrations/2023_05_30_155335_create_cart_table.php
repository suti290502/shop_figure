<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('user_id')->on('user');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
