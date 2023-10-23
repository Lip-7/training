<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            [
                'Basic',
                2.99,
                '24:00:00'
            ],
            [
                'Gold',
                5.99,
                '72:00:00'
            ],[
                'Platinum',
                9.99,
                '144:00:00'
            ]
        ];

        foreach($sponsorships as $sponsorship){
            $newSponsorship = new Sponsorship();
            $newSponsorship->name = $sponsorship[0];
            $newSponsorship->price = $sponsorship[1];
            $newSponsorship->duration = $sponsorship[2];
            $newSponsorship->save();
        }

        for($i = 1; $i < 100; $i = $i + 3) {
            $apartment = Apartment::find($i);
            $rnd = rand(1, 7);
            if($rnd < 5) {
                $apartment->sponsorships()->sync([1]);
            } elseif ($rnd < 7) {
                $apartment->sponsorships()->sync([2]);
            } else {
                $apartment->sponsorships()->sync([3]);
            }
        }
    }
}