<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvolvedPeople extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('involved_people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('search_id')->unsigned();
            $table->integer('user_creation_id')->unsigned();
            $table->integer('user_modification_id')->unsigned();
            $table->string('name');
            $table->integer('total_people')->default(1);
            $table->string('vehicle')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('people')->nullable();
            $table->timestamps();
        });

        Schema::table('incidents', function (Blueprint $table) {
            $table->foreign('search_id')->references('id')->on('searches')->onDelete('cascade');
            $table->foreign('user_creation_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_modification_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('involved_people');
    }
}
