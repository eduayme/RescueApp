<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('search_id')->unsigned();
            $table->integer('status')->default('0'); // 0 - Active, 1 - Closed
            $table->string('vehicle')->nullable();
            $table->string('broadcast')->nullable();
            $table->string('gps')->nullable();
            $table->string('people_involved')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
