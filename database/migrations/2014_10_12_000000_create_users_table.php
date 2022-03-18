<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dni')->unique()->nullable();
            $table->enum('profile', ['admin', 'firefighter', 'operator', 'commander', 'guest'])->default('guest');
            $table->rememberToken();
            $table->timestamps();
        });

        // Add default admin user
        DB::table('users')->insert(
            [
                'name'     => 'admin',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'profile'  => 'admin',
            ]
        );

        // Add default guest user
        DB::table('users')->insert(
            [
                'name'     => 'guest',
                'email'    => 'guest@gmail.com',
                'password' => Hash::make('guest'),
                'profile'  => 'guest',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
