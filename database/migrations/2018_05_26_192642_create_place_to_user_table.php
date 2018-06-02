<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_to_user', function (Blueprint $table) {
            $table->bigInteger('place_id');
            $table->bigInteger('user_id');
            $table->bigInteger('relationship_id');
            $table->foreign('place_id')->references('id')->on('place');
            $table->foreign('user_id')->references('id')->on('user');
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
        Schema::dropIfExists('place_to_user');
    }
}
