<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserToImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_to_image', function (Blueprint $table) {
            $table->boolean('is_main');
            $table->bigInteger('user_id');
            $table->bigInteger('image_id');
            $table->bigInteger('relationship_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('image_id')->references('id')->on('image');
            $table->foreign('relationship_id')->references('id')->on('relationship');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_to_image');
    }
}
