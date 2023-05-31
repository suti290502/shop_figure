<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderFigureTable extends Migration
{
    public function up()
    {
        Schema::create('order_figure', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('order_id')->on('order');
            $table->unsignedBigInteger('figure_id');
            $table->foreign('figure_id')->references('figure_id')->on('figure');
            $table->integer('quantity');
            $table->string('payments');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_figure');
    }
}
