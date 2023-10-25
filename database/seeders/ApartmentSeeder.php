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

        $apartments = config('apartmentsNames');

        for ($i = 0; $i < count($apartments); $i++){

            $newApartment = new Apartment();

            $newApartment->name = $apartments[$i]['name'];
            $newApartment->slug = Apartment::generateSlug($newApartment->name, rand(0,1000));
            $newApartment->rooms = $faker->numberBetween(1, 5);
            $newApartment->beds = $faker->numberBetween(1, 5);
            $newApartment->bathrooms = $faker->numberBetween(1, 5);
            $newApartment->mq = $faker->numberBetween(50, 200);
            $newApartment->address = $apartments[$i]['address'];
            $newApartment->coordinates = DB::raw("ST_GeomFromText('POINT(" . $apartments[$i]['coordinates'] . ")',0)");
            $newApartment->photo = $apartments[$i]['photo'];

            if($i<10){
                $newApartment->user_id = $i + 1;
            }else{
                $newApartment->user_id = $i + 1 - 10;
            }

            if($i == 0) {
                $newApartment->visible = 0;
            }else{
                $newApartment->visible = 1;
            }

            $newApartment->save();
        };
    }
}
