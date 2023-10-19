<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $servizi = config("servizi");
        foreach($servizi as $servizio) {
            $newService = new Service();
            $newService->name = $servizio;
            $newService->save();
        }

        for ($i = 1; $i < 101; $i++){
            $numServices = rand(1, 8);
            $usedServices = [];
            for($j = 0; $j < $numServices; $j++) {
                $singleService = rand(1, (count($servizi)));
                if(in_array($singleService, $usedServices)){
                    $j--;
                } else {
                    array_push($usedServices, $singleService);
                }
            }
            $apartment = Apartment::find($i);
            $apartment->services()->sync($usedServices);
        }
    }
}
