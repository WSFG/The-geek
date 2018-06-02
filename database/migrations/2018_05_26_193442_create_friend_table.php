<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend', function (Blueprint $table) {
            $table->bigInteger('user_1_id');
            $table->bigInteger('user_2_id');
            $table->bigInteger('type_id');
            $table->foreign('user_1_id')->references('id')->on('user');
            $table->foreign('user_2_id')->references('id')->on('user');
            $table->foreign('type_id')->references('id')->on('user_relationship');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friend');
    }
}
