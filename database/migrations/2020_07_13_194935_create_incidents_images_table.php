<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('incident_id')->unsigned();
            $table->integer('user_updated_id')->unsigned();
            $table->string('photo')->unsigned();
            $table->timestamps();
        });

        Schema::table('incidents_images', function (Blueprint $table) {
            $table->foreign('id_incident')->references('id')->on('incidents')->onDelete('cascade');
            $table->foreign('id_user_updated')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents_images');
    }
}
