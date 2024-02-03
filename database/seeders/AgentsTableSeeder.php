<?php

namespace Database\Seeders;

use App\Models\Agent;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Agent::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'age' => $faker->numberBetween(20, 60),
                'gender' => $faker->randomElement(['MALE', 'FEMALE']),
                'address' => $faker->address,
                'nationality' => $faker->country,
                'passport_id' => $faker->unique()->uuid,
                'notes' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
