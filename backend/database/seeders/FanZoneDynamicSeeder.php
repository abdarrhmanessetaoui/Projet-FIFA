<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\FanZone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FanZoneDynamicSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        FanZone::truncate();
        Schema::enableForeignKeyConstraints();

        $fanZones = [
            [
                'ville' => 'New York/New Jersey',
                'name' => 'FIFA Fan Festival New York/New Jersey',
                'description' => 'The ultimate destination for fans in New York and New Jersey! Experience live match broadcasts on massive screens, live music, and family-friendly activities in the heart of the city.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/FIFA_Fan_Fest_Rio_de_Janeiro_2014.jpg',
                'location_url' => 'https://www.google.com/maps/search/?api=1&query=Central+Park+New+York',
            ],
            [
                'ville' => 'Mexico City',
                'name' => 'FIFA Fan Festival Mexico City',
                'description' => 'Join the passion in Mexico City! The Zócalo becomes the epicenter of football fever with incredible food, cultural performances, and every goal celebrated with Mexican intensity.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/4/43/Fan_Fest_Moscow_2018.jpg',
                'location_url' => 'https://www.google.com/maps/search/?api=1&query=Zocalo+Mexico+City',
            ],
        ];

        foreach ($fanZones as $fz) {
            $city = City::where('name', $fz['ville'])->first();
            
            FanZone::create([
                'city_id' => $city ? $city->id : 1,
                'stadium_name' => 'Official Site',
                'capacity' => 'Various',
                'matches_count' => 64,
                'address' => 'Official Celebration Site',
                'zone_label' => $fz['name'],
                'description' => $fz['description'],
                'image_url' => $fz['image_url'],
                'location_url' => $fz['location_url'],
                'group_label' => 'Official',
                'status' => 'active',
            ]);
        }
    }
}
