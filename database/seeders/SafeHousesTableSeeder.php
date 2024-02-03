<?php

namespace Database\Seeders;

use App\Models\SafeHouse;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SafeHousesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            SafeHouse::create([
                'name' => $faker->company,
                'security_level' => $faker->randomElement(['LEVEL-1', 'LEVEL-2', 'LEVEL-3', 'LEVEL-4']),
                'status' => $faker->randomElement(['SAFE', 'DANGER']),
                'location_id' => $faker->numberBetween(1, 10),
                'agent_in_charge' => $faker->numberBetween(1, 10),
                'established_in' => $faker->date(),
                'notes' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
