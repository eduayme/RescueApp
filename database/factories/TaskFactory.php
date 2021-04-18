<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Search;
use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'search_id'   => Search::pluck('id')->random(),
        'Sector'      => $faker->word,
        'Status'      => 'to_do',
        'Group'       => $faker->randomDigit,
        'Start'       => $faker->dateTime,
        'End'         => $faker->dateTimeThisYear,
        'Type'        => $faker->word,
        'Description' => $faker->text($maxNbChars = 200),
    ];
});
