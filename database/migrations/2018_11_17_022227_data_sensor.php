<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataSensor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sensor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ss1');
            $table->integer('ss2');
            $table->integer('ss3');
            $table->integer('ss4');
            $table->integer('id_station'); 
            //$table->string('email')->unique();
            //$table->string('data');
            //$table->rememberToken();
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
        Schema::dropIfExists('data_sensor');
    }
}
