<?php

namespace Database\Factories;

use App\Models\sousServiceImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class sousServiceImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = sousServiceImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sous_service_id' => function () {
                return \App\Models\SousService::factory()->create()->id;
            },
            'images' => $this->faker->imageUrl(),
        ];
    }
}
