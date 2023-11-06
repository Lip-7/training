<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

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
            $newSponsorship->slug = Str::slug($sponsorship[0], '-');
            $newSponsorship->price = $sponsorship[1];
            $newSponsorship->duration = $sponsorship[2];
            $newSponsorship->save();
        }

        for($i = 1; $i < 13; $i = $i + 3) {
            $apartment = Apartment::find($i);
            $rnd = rand(1, 7);
            if($rnd < 5) {
                $apartment->sponsorships()->sync([1 => ['expire_date' => now('Europe/Rome')->addWeek()]]);
            } elseif ($rnd < 7) {
                $apartment->sponsorships()->sync([2 => ['expire_date' => now('Europe/Rome')->addWeek()]]);
            } else {
                $apartment->sponsorships()->sync([3 => ['expire_date' => now('Europe/Rome')->addWeek()]]);
            }
        }
    }
}
