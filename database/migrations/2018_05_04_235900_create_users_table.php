<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '45');
            $table->string('surname', '45');
            $table->date('birthday')->nullable();
            $table->string('email', '45')->unique();
            $table->string('phone_number', '20')->unique()->nullable();
            $table->string('password');
            $table->text('user_main_photo');
            $table->boolean('is_confirmed')->default(false);
            $table->dateTime('last_login');
            $table->boolean('online');
            $table->bigInteger('type_of_user_id')->unsigned()->default(1);
            $table->foreign('type_of_user_id')->references('id')->on('type_of_user');
            $table->bigInteger('user_info_id')->unsigned()->nullable();
            $table->foreign('user_info_id')->references('id')->on('user_info');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
