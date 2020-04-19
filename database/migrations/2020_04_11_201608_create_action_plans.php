<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActionPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('version');
            $table->longText('description')->nullable();
            $table->string('task1')->nullable();
            $table->string('task2')->nullable();
            $table->string('task3')->nullable();
            $table->string('task4')->nullable();
            $table->string('task5')->nullable();
            $table->string('task6')->nullable();
            $table->integer('search_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('action_plans', function (Blueprint $table) {
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
        Schema::dropIfExists('action_plans');
    }
}
