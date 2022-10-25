<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 255),
            'uuid' => $this->faker->uuid(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'elapsed_time' => $this->faker->numberBetween(1, 255),
            'feeling' => $this->faker->realText(),
            'coping_measures' => $this->faker->realText(),
        ];
    }
}
