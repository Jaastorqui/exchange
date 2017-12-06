<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Passengers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('travel_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();

            $table->rememberToken();
            $table->timestamps();
        }); 
        Schema::table('passengers', function(Blueprint $table) {
            $table->foreign('travel_id')->references('id')->on('travels');
        });
        Schema::table('passengers', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
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
