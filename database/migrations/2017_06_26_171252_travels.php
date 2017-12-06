<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Travels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('day');
            $table->string('cityDeparture');
            $table->string('cityArrived');

            $table->integer('driver_id')->unsigned()->nullable();

            $table->double('price')->nullable();

            $table->rememberToken();
            $table->timestamps();
        }); 
        Schema::table('travels', function(Blueprint $table) {
            $table->foreign('driver_id')->references('id')->on('users');
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
