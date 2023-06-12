<?php

namespace Database\Factories;

use App\Models\ImageSalle;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageSalleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImageSalle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'salle_id' => function () {
                return \App\Models\Salle::factory()->create()->id;
            },
            'images' => $this->faker->imageUrl(),
        ];
    }
}
