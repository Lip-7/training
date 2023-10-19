<?php

namespace Database\Seeders;

use App\Models\Visit;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 500; $i++) {
            $newVisit = new Visit();
            $newVisit->apartment_id = rand(1, 100);
            $newVisit->ip = $faker->ipv4();
            $newVisit->date = $faker->dateTimeBetween('-3 months', 'now');
            $newVisit->save();
        }
    }
}
