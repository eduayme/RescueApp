<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AfegirImatgeUsuariIDesaparegut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('avatar')->default('default.jpg');
        });

        Schema::table('desapareguts', function ($table) {
            $table->string('photo')->default('default.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('avatar');
        });

        Schema::table('desapareguts', function ($table) {
            $table->dropColumn('photo');
        });
    }
}
