<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleToUniverseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_to_universe', function (Blueprint $table) {
            $table->bigInteger('article_id');
            $table->bigInteger('universe_id');
            $table->foreign('article_id')->references('id')->on('article')->onDelete('cascade');
            $table->foreign('universe_id')->references('id')->on('universe')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_to_universe');
    }
}
