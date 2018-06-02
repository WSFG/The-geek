<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventToPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_to_place', function (Blueprint $table) {
            $table->bigInteger('event_id');
            $table->bigInteger('place_id');
            $table->foreign('event_id')->references('id')->on('event');
            $table->foreign('place_id')->references('id')->on('place');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_to_place');
    }
}
