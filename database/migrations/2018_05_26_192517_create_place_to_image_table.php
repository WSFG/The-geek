<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceToImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_to_image', function (Blueprint $table) {
            $table->boolean('is_main');
            $table->bigInteger('place_id');
            $table->bigInteger('image_id');
            $table->foreign('place_id')->references('id')->on('place');
            $table->foreign('image_id')->references('id')->on('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_to_image');
    }
}
