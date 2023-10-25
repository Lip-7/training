<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {   

        for ($i = 0; $i < 10; $i++){
            
            $newUser = new User();

            $newUser->name = $faker->firstname();
            $newUser->lastname = $faker->lastname();
            $newUser->email = $faker->email();
            $newUser->password = 'training';
            $newUser->birth_date = $faker->dateTimeBetween('-70 years', '-18 years');

            $newUser->save();
        };
    }
}
