<?php

namespace Database\Factories;

use App\Models\Search;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Search::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'is_a_practice'                   => $this->faker->boolean,
            'search_id'                       => $this->faker->unique()->word,
            'status'                          => $this->faker->boolean,
            'user_creation_id'                => User::pluck('id')->random(),
            'user_last_modification_id'       => User::pluck('id')->random(),
        ];
    }
}
