<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\personnel>
 */
class personnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $description = $this->faker->paragraph;
        $truncatedDescription = substr($description, 0, 255); // Truncate description to fit within the column's length

        return [
            'NomPers' => $this->faker->name,
            'price' => $this->faker->numberBetween(1000, 5000),
            'description' => $truncatedDescription,
            'image' => null, // or use $this->faker->imageUrl() for random image URLs
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
