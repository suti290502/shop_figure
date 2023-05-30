<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('user_id')->on('user');
            $table->integer('figure_id')->unsigned();
            $table->foreign('figure_id')->references('figure_id')->on('figure');
            $table->integer('quantity');
            $table->decimal('payments', 8, 2);
            $table->timestamp('order_date')->nullable();
            $table->string('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order');
    }
}
