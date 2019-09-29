<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddFinalizationResearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('researches', function ($table)
        {
            $table->string('work_groups_used')->nullable();
            $table->string('derivation_emergency_service')->nullable();
            $table->string('emergency_service_receiver_id')->nullable();
            $table->string('first_command')->nullable();
            $table->string('intermediate_commands')->nullable();
            $table->string('last_command')->nullable();
            $table->string('tipology')->nullable();
            $table->string('resources')->nullable();
            $table->dateTime('date_localization')->nullable();
            $table->string('place_name_localization')->nullable();
            $table->string('location_localization')->nullable();
            $table->string('municipality_term_localization')->nullable();
            $table->integer('distance_from_last_place_seen_to_location')->nullable();
            $table->string('who_does_the_localization')->nullable();
            $table->string('physical_condition_people_when_find')->nullable();
            $table->string('reason_finalization')->nullable();

            // catalonia firefighters system coordinates
            $table->string('coe_cut_localization')->nullable();
            $table->string('soc_localization')->nullable();
            $table->string('section_localization')->nullable();
            $table->float('utm_x_localization')->nullable();
            $table->float('utm_y_localization')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('researches', function ($table)
        {
            $table->dropColumn('work_groups_used');
            $table->dropColumn('derivation_emergency_service');
            $table->dropColumn('emergency_service_receiver_id');
            $table->dropColumn('first_command');
            $table->dropColumn('intermediate_commands');
            $table->dropColumn('last_command');
            $table->dropColumn('tipology');
            $table->dropColumn('resources');
            $table->dropColumn('date_localization');
            $table->dropColumn('place_name_localization');
            $table->dropColumn('location_localization');
            $table->dropColumn('municipality_term_localization');
            $table->dropColumn('distance_from_last_place_seen_to_location');
            $table->dropColumn('who_does_the_localization');
            $table->dropColumn('physical_condition_people_when_find');
            $table->dropColumn('reason_finalization');
            $table->dropColumn('coe_cut_localization');
            $table->dropColumn('soc_localization');
            $table->dropColumn('section_localization');
            $table->dropColumn('utm_x_localization');
            $table->dropColumn('utm_y_localization');
        });
    }
}
