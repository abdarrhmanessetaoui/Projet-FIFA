<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Hotel::truncate();
        $hotels = [
            [
                'name' => 'The Ritz-Carlton New York',
                'description' => 'Élégance intemporelle avec vue imprenable sur Central Park, au sommet du luxe new-yorkais.',
                'address' => '50 Central Park S, New York',
                'city' => 'New York',
                'country' => 'USA',
                'image' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?q=80&w=1200',
                'website_url' => 'https://www.ritzcarlton.com/en/hotels/new-york/central-park/'
            ],
            [
                'name' => 'Fairmont Royal York Toronto',
                'description' => 'Hôtel historique majestueux offrant une hospitalité de classe mondiale et une gastronomie raffinée.',
                'address' => '100 Front St W, Toronto',
                'city' => 'Toronto',
                'country' => 'Canada',
                'image' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=1200',
                'website_url' => 'https://www.fairmont.com/royal-york-toronto/'
            ],
            [
                'name' => 'Four Seasons Mexico City',
                'description' => 'Un havre de paix luxueux entouré d\'un jardin intérieur luxuriant sur le Paseo de la Reforma.',
                'address' => 'Paseo de la Reforma 500, Mexico City',
                'city' => 'Mexico City',
                'country' => 'Mexique',
                'image' => 'https://images.unsplash.com/photo-1551882547-ff43c63faff7?q=80&w=1200',
                'website_url' => 'https://www.fourseasons.com/mexicocity/'
            ],
            [
                'name' => 'Waldorf Astoria Beverly Hills',
                'description' => 'Le summum du luxe à Los Angeles, offrant des vues panoramiques à 360 degrés depuis son toit-terrasse emblématique.',
                'address' => '9850 Wilshire Blvd, Beverly Hills',
                'city' => 'Los Angeles',
                'country' => 'USA',
                'image' => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=80&w=1200',
                'website_url' => 'https://www.waldorfastoriabeverlyhills.com/'
            ],
            [
                'name' => 'Rosewood Hotel Georgia Vancouver',
                'description' => 'L\'élégance du Vieux Monde rencontre le chic moderne dans cet hôtel historique restauré au cœur de Vancouver.',
                'address' => '801 W Georgia St, Vancouver',
                'city' => 'Vancouver',
                'country' => 'Canada',
                'image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1200',
                'website_url' => 'https://www.rosewoodhotels.com/en/hotel-georgia-vancouver'
            ],
            [
                'name' => 'Banyan Tree Cabo Marqués Acapulco',
                'description' => 'Des villas luxueuses perchées sur des falaises avec piscine privée, offrant une vue spectaculaire sur l\'océan.',
                'address' => 'Blvd. Cabo Marqués, Lote 1, Acapulco',
                'city' => 'Acapulco',
                'country' => 'Mexique',
                'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200',
                'website_url' => 'https://www.banyantree.com/mexico/cabo-marques'
            ]
        ];

        foreach ($hotels as $hotel) {
            \App\Models\Hotel::create($hotel);
        }
    }
}
