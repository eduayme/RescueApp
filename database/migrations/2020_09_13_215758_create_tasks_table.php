<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('Sector');
            $table->string('Status')->default("to_do");
            $table->integer('Group');
            $table->dateTime('Start');
            $table->dateTime('End');
            $table->string('Type');
            $table->longText('Description');
            $table->integer('Gpx')->default(0);
            $table->string('GpxFileName')->nullable();
            $table->binary('GpxFile')->nullable();
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
