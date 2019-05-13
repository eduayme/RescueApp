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
            // Engine DB
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->tinyInteger('es_practica')->default(0);
            $table->string('num_actuacio')->unique();
            $table->string('regio');
            $table->string('estat');

            $table->dateTime('data_creacio');
            $table->dateTime('data_ultima_modificacio');
            $table->dateTime('data_tancament')->nullable();

            $table->integer('id_usuari_creacio')->unsigned();
            $table->integer('id_usuari_ultima_modificacio')->unsigned();
            $table->integer('id_usuari_tancament')->unsigned()->nullable();

            //alertant
            $table->string('es_desaparegut')->nullable();
            $table->string('es_contacte')->nullable();
            $table->string('nom_alertant')->nullable();
            $table->string('edat_alertant')->nullable();
            $table->string('telefon_alertant')->nullable();
            $table->string('adreca_alertant')->nullable();

            //incident
            $table->string('municipi_upa')->nullable();
            $table->dateTime('data_upa')->nullable();
            $table->string('zona_incident')->nullable();
            $table->string('possible_ruta')->nullable();
            $table->string('descripcio_incident')->nullable();
            $table->string('tall_mapa')->nullable(); // 999-9
            $table->string('soc_quadrant')->nullable(); // 99AA
            $table->integer('seccio_mapa')->nullable(); // 99

            //desapareguts
            $table->integer('desapareguts')->nullable();
            $table->string('estat_desapareguts')->nullable();

            //equipament i experiència
            $table->tinyInteger('coneix_zona')->default(0);
            $table->tinyInteger('experiencia_activitat')->default(0);
            $table->tinyInteger('porta_menjar')->default(0);
            $table->tinyInteger('porta_aigua')->default(0);
            $table->tinyInteger('llum_o_senyalitzacio')->default(0);
            $table->tinyInteger('roba_abric')->default(0);
            $table->tinyInteger('porta_impermeable')->default(0);

            //persona contacte
            $table->string('nom_persona_contacte');
            $table->string('telefon_persona_contacte');
            $table->string('afinitat_persona_contacte');

            $table->timestamps();
        });

        Schema::table('recerques', function (Blueprint $table) {
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
