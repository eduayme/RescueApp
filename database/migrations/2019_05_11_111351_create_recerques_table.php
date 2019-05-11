<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecerquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recerques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('es_practica')->default(0);
            $table->string('num_actuacio')->unique();
            $table->string('estat');

            $table->dateTime('data_inici');
            $table->dateTime('data_finalitzacio');
            $table->dateTime('data_creacio');
            $table->dateTime('data_ultima_modificacio');
            $table->dateTime('data_tancament')->nullable();

            $table->integer('id_usuari_creacio')->unsigned();
            $table->integer('id_usuari_ultima_modificacio')->unsigned();
            $table->integer('id_usuari_tancament')->unsigned();

            $table->timestamps();

            $table->foreign('id_usuari_creacio')->references('id')->on('users');
            $table->foreign('id_usuari_ultima_modificacio')->references('id')->on('users');
            $table->foreign('id_usuari_tancament')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recerques');
    }
}
