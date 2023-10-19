<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    
    {   //far corrispondere lat e long con indirizzo e usare foto case/appartamenti

        $names = config('apartmentsNames');

        for ($i = 0; $i < 100; $i++){
            
            $newApartment = new Apartment();

            $newApartment->name = $names[$i];
            $newApartment->rooms = $faker->numberBetween(1, 5);
            $newApartment->beds = $faker->numberBetween(1, 5);
            $newApartment->bathrooms = $faker->numberBetween(1, 5);
            $newApartment->mq = $faker->numberBetween(50, 200);
            $newApartment->address = $faker->streetAddress();
            $newApartment->lat = $faker->latitude($min = -90, $max = 90);
            $newApartment->lon = $faker->longitude($min = -180, $max = 180);
            $newApartment->photo = 'https://picsum.photos/300/500';
            $newApartment->visible = 1;
            
            if($i<50){
                $newApartment->user_id = $i + 1;
            }else{
                $newApartment->user_id = $i + 1 - 50;
            }

            $newApartment->save();
        };
    }
}
