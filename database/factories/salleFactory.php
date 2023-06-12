<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\salle>
 */
class salleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'SalleName' => $this->faker->name,
            'capacite' => $this->faker->randomElement([10, 20, 30, 40]), // Replace with actual capacite values
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100), // Replace with desired price range
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
