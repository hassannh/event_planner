<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventServiceFactory extends Factory
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
            'sousService_id' => function () {
                return \App\Models\SousService::factory()->create()->id;
            },
        ];
    }
}
