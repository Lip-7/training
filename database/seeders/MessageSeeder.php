<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void

    {
        $messaggi = config("messaggi");
        for($i = 0; $i < 130; $i++) {
            $newMessage = new Message();
            $newMessage->name = $faker->firstName();
            $newMessage->lastname = $faker->lastName();
            $newMessage->email = $faker->email();
            $newMessage->text = $messaggi[$i];
            if($i < 100){
                $newMessage->apartment_id = $i + 1;
            } else {
                $newMessage->apartment_id = $faker->numberBetween(1, 100);
            }
            $newMessage->save();
        }
    }
}
