<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFigureTable extends Migration
{
    public function up()
    {
        Schema::create('figure', function (Blueprint $table) {
            $table->increments('figure_id');
            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('user_id')->on('user');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('category');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->integer('quantity');
        });
    }

    public function down()
    {
        Schema::dropIfExists('figure');
    }
}
