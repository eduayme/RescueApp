<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesaparegutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desapareguts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_recerca')->unsigned();
            $table->string('nom')->nullable();
            $table->string('nom_respon')->nullable();
            $table->integer('edat')->nullable();
            $table->string('telefon')->nullable();
            $table->tinyInteger('whatsapp_o_gps')->nullable();
            $table->string('perfil')->nullable();
            $table->string('descripcio_fisica')->nullable();
            $table->string('roba')->nullable();
            $table->string('altres')->nullable();

            // estat persona
            $table->string('forma_fisica')->nullable();
            $table->string('malalties_o_lesions')->nullable();
            $table->string('medicacio')->nullable();
            $table->string('limitacio_o_discapacitat')->nullable();

            // vehicle
            $table->string('marca_model_vehicle')->nullable();
            $table->string('color_vehicle')->nullable();
            $table->string('matricula_vehicle')->nullable();

            $table->timestamps();
        });

        Schema::table('desapareguts', function (Blueprint $table) {
            $table->foreign('id_recerca')->references('id')->on('recerques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desapareguts');
    }
}
