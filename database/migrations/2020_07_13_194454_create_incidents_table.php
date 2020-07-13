<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_search')->unsigned();
            $table->integer('id_user_creation')->unsigned();
            $table->integer('id_user_modification')->unsigned();
            $table->dateTime('date')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::table('incidents', function (Blueprint $table) {
            $table->foreign('id_search')->references('id')->on('searches')->onDelete('cascade');
            $table->foreign('id_user_creation')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_modification')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
