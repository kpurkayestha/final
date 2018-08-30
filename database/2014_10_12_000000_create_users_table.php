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
            $table->increments('id');
            $table->enum('role', ['admin', 'editor', 'user'])->default('user');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->tinyInteger('confirm_email');
            $table->string('password')->nullable();
            $table->string('provider')->default('0');
            $table->string('provider_id')->default('0');
            $table->string('pro_pic')->default('default.jpg');
            $table->text('about')->default('N/A');
            $table->string('university')->default('N/A');
            $table->string('location')->default('N/A');
            $table->tinyInteger('ban')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
