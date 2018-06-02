<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleToImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_to_image', function (Blueprint $table) {
            $table->boolean('is_main');
            $table->bigInteger('article_id');
            $table->bigInteger('image_id');
            $table->foreign('article_id')->references('id')->on('article')->onDelete('cascade');
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
        Schema::dropIfExists('article_to_image');
    }
}
