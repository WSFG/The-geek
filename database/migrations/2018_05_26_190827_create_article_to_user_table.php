<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_to_user', function (Blueprint $table) {
            $table->bigInteger('article_id');
            $table->bigInteger('user_id');
            $table->bigInteger('relationship_id');
            $table->foreign('article_id')->references('id')->on('article');
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
        Schema::dropIfExists('article_to_user');
    }
}
