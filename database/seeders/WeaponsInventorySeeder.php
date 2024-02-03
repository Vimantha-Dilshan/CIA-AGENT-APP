<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\WeaponInventory;

class WeaponsInventorySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $weapons = [
            ['name' => 'Glock 19', 'bullet_type' => '9mm', 'manufacturer' => 'Glock'],
            ['name' => 'Smith & Wesson M&P Shield', 'bullet_type' => '9mm', 'manufacturer' => 'Smith & Wesson'],
            ['name' => 'Sig Sauer P320', 'bullet_type' => '9mm', 'manufacturer' => 'Sig Sauer'],
            ['name' => 'AK-47', 'bullet_type' => '7.62mm', 'manufacturer' => 'Kalashnikov Concern'],
            ['name' => 'AR-15', 'bullet_type' => '5.56mm', 'manufacturer' => 'ArmaLite'],
            ['name' => 'Beretta APX', 'bullet_type' => '9mm', 'manufacturer' => 'Beretta'],
            ['name' => 'H&K USP', 'bullet_type' => '9mm', 'manufacturer' => 'Heckler & Koch'],
            ['name' => 'Ruger SR9', 'bullet_type' => '9mm', 'manufacturer' => 'Sturm, Ruger & Co.'],
            ['name' => 'FN SCAR', 'bullet_type' => '5.56mm', 'manufacturer' => 'FN Herstal'],
            ['name' => 'Taurus TX22', 'bullet_type' => '9mm', 'manufacturer' => 'Taurus Holdings'],
            ['name' => 'MP5', 'bullet_type' => '9mm', 'manufacturer' => 'Heckler & Koch'],
            ['name' => 'AK-74', 'bullet_type' => '5.45mm', 'manufacturer' => 'Kalashnikov Concern'],
            ['name' => 'Ruger Security-9', 'bullet_type' => '9mm', 'manufacturer' => 'Sturm, Ruger & Co.'],
            ['name' => 'Smith & Wesson M&P15', 'bullet_type' => '5.56mm', 'manufacturer' => 'Smith & Wesson'],
            ['name' => 'Remington 700', 'bullet_type' => '7.62mm', 'manufacturer' => 'Remington Arms'],
            ['name' => 'SIG SG 550', 'bullet_type' => '5.56mm', 'manufacturer' => 'SIG Sauer'],
            ['name' => 'Beretta 92FS', 'bullet_type' => '9mm', 'manufacturer' => 'Beretta'],
            ['name' => 'MP7', 'bullet_type' => '4.6mm', 'manufacturer' => 'Heckler & Koch'],
            ['name' => 'AKM', 'bullet_type' => '7.62mm', 'manufacturer' => 'Kalashnikov Concern'],
            ['name' => 'Springfield XD', 'bullet_type' => '9mm', 'manufacturer' => 'Springfield Armory']
        ];

        shuffle($weapons);

        foreach ($weapons as $weapon) {
            WeaponInventory::create([
                'name' => $weapon['name'],
                'weapon_code' => 'WI' . $faker->unique()->randomNumber(4),
                'bullet_type' => $weapon['bullet_type'],
                'agent_id' => $faker->optional()->numberBetween(1, 10),
                'manufacturer' => $weapon['manufacturer'],
                'purchase_date' => $faker->date(),
                'history' => $faker->optional()->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
