<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AfegirTancamentRecerca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recerques', function ($table) {
            $table->string('grup_treball_utilitzat')->nullable();
            $table->string('derivacio_cossos_lliurades')->nullable();
            $table->string('derivacio_cossos_codi_receptor')->nullable();
            $table->string('comandament_inicial')->nullable();
            $table->string('comandament_relleus')->nullable();
            $table->string('comandament_final')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('recursos')->nullable();
            $table->dateTime('data_localitzacio')->nullable();
            $table->string('toponim_localitzacio')->nullable();
            $table->string('indret_localitzacio')->nullable();
            $table->string('terme_municipal_localitzacio')->nullable();
            $table->string('tall_coe_localitzacio')->nullable();
            $table->string('soc_localitzacio')->nullable();
            $table->string('seccio_localitzacio')->nullable();
            $table->float('utm_x_localitzacio')->nullable();
            $table->float('utm_y_localitzacio')->nullable();
            $table->integer('distancia_upa_localitzacio')->nullable();
            $table->string('qui_fa_localitzacio')->nullable();
            $table->string('estat_troben')->nullable();
            $table->string('motiu_finalitzacio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recerques', function ($table) {
            $table->dropColumn('grup_treball_utilitzat');
            $table->dropColumn('derivacio_cossos_lliurades');
            $table->dropColumn('derivacio_cossos_codi_receptor');
            $table->dropColumn('comandament_inicial');
            $table->dropColumn('comandament_relleus');
            $table->dropColumn('comandament_final');
            $table->dropColumn('tipologia');
            $table->dropColumn('recursos');
            $table->dropColumn('data_localitzacio');
            $table->dropColumn('toponim_localitzacio');
            $table->dropColumn('indret_localitzacio');
            $table->dropColumn('terme_municipal_localitzacio');
            $table->dropColumn('tall_coe_localitzacio');
            $table->dropColumn('soc_localitzacio');
            $table->dropColumn('seccio_localitzacio');
            $table->dropColumn('utm_x_localitzacio');
            $table->dropColumn('utm_y_localitzacio');
            $table->dropColumn('distancia_upa_localitzacio');
            $table->dropColumn('qui_fa_localitzacio');
            $table->dropColumn('estat_troben');
            $table->dropColumn('motiu_finalitzacio');
            $table->dropColumn('ip_comandament_finalitza');
            $table->dropColumn('durada');
        });
    }
}
