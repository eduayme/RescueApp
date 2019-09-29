<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddImagesUsersAndLostPeople extends Migration
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

        Schema::table('lost_people', function ($table) {
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

        Schema::table('lost_people', function ($table) {
            $table->dropColumn('photo');
        });
    }
}
