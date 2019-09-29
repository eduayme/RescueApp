<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            // Engine DB
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->tinyInteger('is_a_practice')->default(0);
            $table->string('id_research')->unique();
            $table->string('region')->nullable();
            $table->integer('status')->default(0); // closed by default

            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_creation');
            $table->dateTime('date_last_modification');
            $table->dateTime('date_finalization')->nullable();

            $table->integer('id_user_creation')->unsigned();
            $table->integer('id_user_last_modification')->unsigned();
            $table->integer('id_user_finalization')->unsigned()->nullable();

            // person alerts
            $table->tinyInteger('is_lost_person')->nullable();
            $table->tinyInteger('is_contact_person')->nullable();
            $table->string('name_person_alerts')->nullable();
            $table->string('age_person_alerts')->nullable();
            $table->string('phone_number_person_alerts')->nullable();
            $table->string('address_person_alerts')->nullable();

            // incident
            $table->string('municipality_last_place_seen')->nullable();
            $table->dateTime('date_last_place_seen')->nullable();
            $table->string('zone_incident')->nullable();
            $table->string('potential_route')->nullable();
            $table->string('description_incident')->nullable();

            // lost people
            $table->integer('number_lost_people')->nullable();
            $table->string('physical_condition_lost_people')->nullable();

            // equipment and experience
            $table->tinyInteger('knowledge_of_the_zone')->nullable();
            $table->tinyInteger('experience_with_activity')->nullable();
            $table->tinyInteger('bring_water')->nullable();
            $table->tinyInteger('bring_food')->nullable();
            $table->tinyInteger('bring_medication')->nullable();
            $table->tinyInteger('bring_flashlight')->nullable();
            $table->tinyInteger('bring_cold_clothes')->nullable();
            $table->tinyInteger('bring_waterproof_clothes')->nullable();

            // contact person
            $table->string('name_contact_person')->nullable();
            $table->string('phone_number_contact_person')->nullable();
            $table->string('affinity_contact_person')->nullable();

            $table->timestamps();
        });

        Schema::table('researches', function (Blueprint $table) {
            $table->foreign('id_user_creation')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_last_modification')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_finalization')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researches');
    }
}
