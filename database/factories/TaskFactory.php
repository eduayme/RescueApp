<?php

namespace Database\Factories;

use App\Models\Search;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'search_id'   => Search::pluck('id')->random(),
            'sector'      => $this->faker->word,
            'status'      => 'to_do',
            'group'       => $this->faker->randomDigit,
            'start'       => $this->faker->dateTime,
            'end'         => $this->faker->dateTimeThisYear,
            'type'        => $this->faker->word,
            'description' => $this->faker->text(200),
        ];
    }
}
