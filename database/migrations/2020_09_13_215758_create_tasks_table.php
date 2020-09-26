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
            $table->string('sector')->nullable();
            $table->string('status')->default("to_do");
            $table->string('group')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->string('type')->nullable();
            $table->longText('description')->nullable();
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
