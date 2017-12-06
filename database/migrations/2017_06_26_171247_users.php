<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('surname1')->nullable();
            $table->string('surname2')->nullable();
            $table->date('datebirthday')->nullable();
            $table->string('photo')->nullable();
            $table->string('city')->nullable();
            $table->string('dni')->nullable()->index();
            $table->integer('cars_id')->unsigned()->nullable();


            $table->rememberToken();
            $table->timestamps();
        }); 
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('cars_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
