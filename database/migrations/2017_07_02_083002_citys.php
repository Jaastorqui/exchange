<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Citys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citys', function (Blueprint $table) {
            $table->increments('idpoblacion')->unique();
            $table->integer('idprovincia');
            $table->string('poblacion');
            $table->string('poblacionseo');
            $table->integer('postal')->unsigned();

            $table->string('latitud');
            $table->string('longitud');

            // $table->primary('poblacionseo');
        }); 
        DB::statement('ALTER TABLE citys CHANGE postal reference  INT(5) UNSIGNED ZEROFILL NOT NULL');

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
