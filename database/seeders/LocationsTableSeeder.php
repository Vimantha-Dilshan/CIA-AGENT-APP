<?php

namespace Database\Seeders;

use App\Models\Location;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Location::create([
                'name' => $faker->city,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'agent_in_charge' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
