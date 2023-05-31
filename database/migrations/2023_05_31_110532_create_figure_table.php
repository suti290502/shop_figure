<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFigureTable extends Migration
{
    public function up()
    {
        Schema::create('figure', function (Blueprint $table) {
            $table->id('figure_id');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('user_id')->on('user');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('category');
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->string('image');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('figure');
    }
}
