<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('search_id')->unsigned();
            $table->string('sector')->nullable();
            $table->string('status')->default('to_do');
            $table->string('group')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->string('type')->nullable();
            $table->longText('description')->nullable();
            $table->string('trackingDevice')->nullable();
            $table->integer('gpx')->default(0);
            $table->binary('gpxFile')->nullable();
            $table->string('gpxFileName')->nullable();
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('search_id')->references('id')->on('searches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
