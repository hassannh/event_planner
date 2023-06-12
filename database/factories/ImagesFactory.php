<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Images;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Images::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => function () {
                return \App\Models\Article::factory()->create()->id;
            },
            'images' => $this->faker->imageUrl(),
        ];
    }
}
