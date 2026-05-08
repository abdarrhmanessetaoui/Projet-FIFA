<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stadium;
use App\Models\Ville;

class StadiumSeeder extends Seeder
{
    public function run(): void
    {
        Stadium::truncate();

        $stadiums = [
            [
                'name' => 'SoFi Stadium',
                'city' => 'Los Angeles',
                'capacity' => 70240,
                'opened_year' => '2020',
                'surface' => 'Matrix Helix Turf',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/SoFi_Stadium_2021.jpg/1280px-SoFi_Stadium_2021.jpg',
                'description' => 'Merveille architecturale située à Inglewood, en Californie, le SoFi Stadium est l\'un des stades les plus modernes au monde. Il accueillera des matchs cruciaux de la Coupe du Monde de la FIFA 2026 dans une ambiance futuriste.',
                'location_url' => 'https://www.google.com/maps/search/?api=1&query=SoFi+Stadium'
            ],
        ];

        foreach ($stadiums as $s) {
            $city = Ville::where('name', 'like', '%' . $s['city'] . '%')->first();

            Stadium::create([
                'name'         => $s['name'],
                'city_id'      => $city ? $city->id : null,
                'capacity'     => $s['capacity'],
                'opened_year'  => $s['opened_year'],
                'surface'      => $s['surface'],
                'image_url'    => $s['image_url'],
                'description'  => $s['description'],
                'location_url' => $s['location_url'],
            ]);
        }
    }
}
