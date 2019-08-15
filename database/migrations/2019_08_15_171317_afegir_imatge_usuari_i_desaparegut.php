<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('avatar')->default('default_avatar.jpg');
        });

        Schema::table('desapareguts', function ($table) {
            $table->string('photo')->default('default_photo.jpg');
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
