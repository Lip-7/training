<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Apartment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            $newApartment->slug = Apartment::generateSlug($newApartment->name, rand(0,1000));
            $newApartment->rooms = $faker->numberBetween(1, 5);
            $newApartment->beds = $faker->numberBetween(1, 5);
            $newApartment->bathrooms = $faker->numberBetween(1, 5);
            $newApartment->mq = $faker->numberBetween(50, 200);
            $newApartment->address = $faker->streetAddress();
            //$newApartment->coordinates = DB::raw("POINT(" . $faker->longitude($min = -80, $max = -70) . " " . $faker->latitude($min = 35, $max = 45) . "), 0");
            $newApartment->coordinates = ['x' => 40.934278, 'y' => 14.272311];
            $newApartment->photo = 'https://picsum.photos/500/400';
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
