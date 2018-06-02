<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_to_user', function (Blueprint $table) {
            $table->bigInteger('news_id');
            $table->bigInteger('user_id');
            $table->bigInteger('relationship_id');
            $table->foreign('news_id')->references('id')->on('news');
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
        Schema::dropIfExists('news_to_user');
    }
}
