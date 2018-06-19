<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text');
            $table->bigInteger('message_status_id');
            $table->bigInteger('sender_id');
            $table->bigInteger('dialog_id');
            $table->foreign('message_status_id')->references('id')->on('messages_status');
            $table->foreign('sender_id')->references('id')->on('user');
            $table->foreign('dialog_id')->references('id')->on('dialog');
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
        Schema::dropIfExists('messages');
    }
}
