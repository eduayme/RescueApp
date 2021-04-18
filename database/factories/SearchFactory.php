<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Search;
use App\User;
use Faker\Generator as Faker;

$factory->define(Search::class, function (Faker $faker) {
    return [
        'is_a_practice'                   => $faker->boolean,
        'search_id'                       => $faker->unique()->word,
        'status'                          => $faker->boolean,
        'user_creation_id'                => User::pluck('id')->random(),
        'user_last_modification_id '      => User::pluck('id')->random(),
    ];
});
