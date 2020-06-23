<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableToDoTasksAp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do_tasks_ap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('action_plan_id')->unsigned();
            $table->longText('description')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
        });

        Schema::table('to_do_tasks_ap', function (Blueprint $table) {
            $table->foreign('action_plan_id')->references('id')->on('action_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_do_tasks_ap');
    }
}
