<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\evenement>
 */
class evenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'typeEvent_id' => function () {
                return \App\Models\TypeEvent::factory()->create()->id;
            },
            'salle_id' => function () {
                return \App\Models\Salle::factory()->create()->id;
            },
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'eventName' => $this->faker->word,
            'guests' => $this->faker->numberBetween(10, 100),
            'ville' => $this->faker->city,
            'datestart' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'dateEnd' => $this->faker->dateTimeBetween('+2 months', '+3 months')->format('Y-m-d'),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
