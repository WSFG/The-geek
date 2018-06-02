<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_to_user', function (Blueprint $table) {
            $table->bigInteger('event_id');
            $table->bigInteger('user_id');
            $table->bigInteger('relationship_id');
            $table->foreign('event_id')->references('id')->on('event');
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
        Schema::dropIfExists('event_to_user');
    }
}
