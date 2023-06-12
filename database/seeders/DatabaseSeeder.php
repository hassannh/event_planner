<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Salle::factory(10)->create();
        \App\Models\equipement::factory(10)->create();
        \App\Models\Personnel::factory(10)->create();
        \App\Models\Service::factory(10)->create();
        \App\Models\SousService::factory(10)->create();
        \App\Models\article::factory(10)->create();
        \App\Models\TypeEvent::factory(10)->create();
        \App\Models\evenement::factory(10)->create();
        \App\Models\EventArticle::factory(10)->create();
        \App\Models\EventPersonnel::factory(10)->create();
        \App\Models\EventService::factory(10)->create();
        \App\Models\sousServiceImage::factory(10)->create();
        \App\Models\ImageSalle::factory(10)->create();
        \App\Models\Images::factory(10)->create();
    }
}
