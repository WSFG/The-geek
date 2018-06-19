<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentToPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_to_place', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('place_id');
            $table->bigInteger('comment_id');
            $table->foreign('place_id')->references('id')->on('place');
            $table->foreign('comment_id')->references('id')->on('comment');
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
        Schema::dropIfExists('comment_to_place');
    }
}
