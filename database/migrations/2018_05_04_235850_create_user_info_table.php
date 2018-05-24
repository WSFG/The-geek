<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country', '45')->nullable();
            $table->string('city', '45')->nullable();
            $table->string('skype', '45')->nullable();
            $table->string('vk_id', '45')->nullable();
            $table->string('instagram_id', '45')->nullable();
            $table->string('facebook_id', '45')->nullable();
            $table->string('twitter_id', '45')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_info');
    }
}
