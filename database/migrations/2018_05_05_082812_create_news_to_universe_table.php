<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsToUniverseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_to_universe', function (Blueprint $table) {
            $table->bigInteger('news_id')->unsigned();
            $table->bigInteger('universe_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news');
            $table->foreign('universe_id')->references('id')->on('universes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_to_universe');
    }
}
