<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('feedback_id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('user_id')->on('user');
            $table->integer('figure_id')->unsigned();
            $table->foreign('figure_id')->references('figure_id')->on('figure');
            $table->text('comment');
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
