<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Episode;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $episodes = Episode::factory(10)->create();
        $characters = Character::factory(5)->create();

        $episodes->each(function (Episode $episode) use ($characters) {
            $episode->characters()->attach(
                $characters->random()->pluck('id')->toArray()
            );
        });
    }
}
