<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniverseToImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universe_to_image', function (Blueprint $table) {
            $table->boolean('is_main');
            $table->bigInteger('universe_id');
            $table->bigInteger('image_id');
            $table->foreign('universe_id')->references('id')->on('universe');
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
        Schema::dropIfExists('universe_to_image');
    }
}
