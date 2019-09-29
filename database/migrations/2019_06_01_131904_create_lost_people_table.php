<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_research')->unsigned();
            $table->tinyInteger('found')->nullable();
            $table->string('name')->nullable();
            $table->string('name_respond')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone_number')->nullable();
            $table->tinyInteger('whatsapp_or_gps')->nullable();
            $table->string('profile')->nullable();
            $table->string('physical_appearance')->nullable();
            $table->string('clothes')->nullable();
            $table->string('other')->nullable();

            // person status
            $table->string('physical_condition')->nullable();
            $table->string('diseases_or_injuries')->nullable();
            $table->string('medication')->nullable();
            $table->string('discapacities_or_limitations')->nullable();

            // vehicle
            $table->string('model_vehicle')->nullable();
            $table->string('color_vehicle')->nullable();
            $table->string('car_plate_number')->nullable();

            $table->timestamps();
        });

        Schema::table('lost_people', function (Blueprint $table) {
            $table->foreign('id_research')->references('id')->on('researches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lost_people');
    }
}
