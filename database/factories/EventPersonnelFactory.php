<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventPersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_id' => function () {
                return \App\Models\Evenement::factory()->create()->id;
            },
            'personnel_id' => function () {
                return \App\Models\Personnel::factory()->create()->id;
            },
            'nbrHomme' => $this->faker->numberBetween(0, 10),
            'nbrFemme' => $this->faker->numberBetween(0, 10),
        ];
    }
}
