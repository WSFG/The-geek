<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventToImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_to_image', function (Blueprint $table) {
            $table->boolean('is_main');
            $table->bigInteger('event_id');
            $table->bigInteger('image_id');
            $table->foreign('event_id')->references('id')->on('event');
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
        Schema::dropIfExists('event_to_image');
    }
}
