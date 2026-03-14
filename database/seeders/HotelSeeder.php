<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        // ───────── Le Royal Saly ─────────
        $royal = Hotel::updateOrCreate(
            ['slug' => 'royal-saly'],
            [
                'name'        => 'Le Royal Saly',
                'location'    => 'Saly',
                'description' => 'Hôtel balnéaire de charme à Saly, alliant luxe et détente au bord de l\'océan.',
                'image'       => 'assets/img/royal.png',
                'active'      => true,
            ]
        );

        $royalRooms = [
            [
                'hotel_id'       => $royal->id,
                'name'           => 'Chambre Standard',
                'category'       => 'Chambre',
                'description'    => 'Une chambre confortable avec terrasse privée, idéale pour se détendre après une journée au soleil.',
                'price_per_night'=> 65000,
                'capacity'       => 2,
                'image'          => 'assets/img/royal.png',
            ],
            [
                'hotel_id'       => $royal->id,
                'name'           => 'Chambre Supérieure',
                'category'       => 'Chambre',
                'description'    => 'Une chambre spacieuse avec balcon privatif offrant une vue superbe sur le jardin tropical ou la mer.',
                'price_per_night'=> 85000,
                'capacity'       => 2,
                'image'          => 'assets/img/hero.png',
            ],
            [
                'hotel_id'       => $royal->id,
                'name'           => 'Suite Junior',
                'category'       => 'Suite',
                'description'    => 'Une suite élégante et spacieuse incluant un salon, idéale pour un séjour luxueux et romantique.',
                'price_per_night'=> 120000,
                'capacity'       => 2,
                'image'          => 'assets/img/royal.png',
            ],
        ];

        foreach ($royalRooms as $room) {
            RoomType::updateOrCreate(
                ['hotel_id' => $royal->id, 'name' => $room['name']],
                $room
            );
        }

        // ───────── Le Pélican du Saloum ─────────
        $pelican = Hotel::updateOrCreate(
            ['slug' => 'pelican-du-saloum'],
            [
                'name'        => 'Le Pélican du Saloum',
                'location'    => 'Toubacouta',
                'description' => 'Éco-lodge enchanteur au cœur du Delta du Saloum.',
                'image'       => 'assets/img/pelican.png',
                'active'      => true,
            ]
        );

        $pelicanRooms = [
            [
                'hotel_id'       => $pelican->id,
                'name'           => 'Lodge Standard',
                'category'       => 'Chambre',
                'description'    => 'Charme et simplicité au cœur de la nature, parfait pour une évasion tranquille dans le delta.',
                'price_per_night'=> 55000,
                'capacity'       => 2,
                'image'          => 'assets/img/pelican.png',
            ],
            [
                'hotel_id'       => $pelican->id,
                'name'           => 'Lodge Premium',
                'category'       => 'Suite',
                'description'    => 'Luxe discret avec vue imprenable sur le fleuve, alliant confort moderne et architecture locale.',
                'price_per_night'=> 75000,
                'capacity'       => 2,
                'image'          => 'assets/img/pelican.png',
            ],
        ];

        foreach ($pelicanRooms as $room) {
            RoomType::updateOrCreate(
                ['hotel_id' => $pelican->id, 'name' => $room['name']],
                $room
            );
        }

        // ───────── Le Néma Kadior ─────────
        $nema = Hotel::updateOrCreate(
            ['slug' => 'nema-kadior'],
            [
                'name'        => 'Le Néma Kadior',
                'location'    => 'Casamance',
                'description' => 'Havre de paix caché dans les forêts de Casamance.',
                'image'       => 'assets/img/nema.png',
                'active'      => true,
            ]
        );

        $nemaRooms = [
            [
                'hotel_id'       => $nema->id,
                'name'           => 'Case Africaine',
                'category'       => 'Chambre',
                'description'    => 'Tradition et confort pour une expérience unique et immersive au cœur de la Casamance.',
                'price_per_night'=> 45000,
                'capacity'       => 2,
                'image'          => 'assets/img/nema.png',
            ],
            [
                'hotel_id'       => $nema->id,
                'name'           => 'Chambre Prestige',
                'category'       => 'Chambre',
                'description'    => 'Élégance et modernité avec vue plongeante sur notre magnifique jardin tropical luxuriant.',
                'price_per_night'=> 65000,
                'capacity'       => 2,
                'image'          => 'assets/img/nema.png',
            ],
        ];

        foreach ($nemaRooms as $room) {
            RoomType::updateOrCreate(
                ['hotel_id' => $nema->id, 'name' => $room['name']],
                $room
            );
        }
    }
}
