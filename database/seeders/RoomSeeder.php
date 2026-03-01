<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            [
                'name' => 'Suite Royale',
                'description' => 'Le Sommet du Luxe',
                'price_per_night' => 850,
                'capacity' => 2,
                'image' => '/suite_royale.png'
            ],
            [
                'name' => 'Villa Présidentielle',
                'price_per_night' => 1500,
                'description' => 'Privilège Absolu',
                'capacity' => 6,
                'image' => '/villa_presidentielle.png'
            ],
            [
                'name' => 'Chambre Deluxe',
                'price_per_night' => 350,
                'description' => 'Élégance Moderne',
                'capacity' => 2,
                'image' => '/chambre_deluxe.png'
            ],
            [
                'name' => 'Suite Famille',
                'price_per_night' => 550,
                'description' => 'Espace & Famille',
                'capacity' => 4,
                'image' => '/suite_famille.png'
            ],
            [
                'name' => 'Suite Junior',
                'price_per_night' => 450,
                'description' => 'Confort & Sérénité',
                'capacity' => 2,
                'image' => '/suite_junior.png'
            ],
            [
                'name' => 'Chambre Confort',
                'price_per_night' => 220,
                'description' => 'Essentiel Cosy',
                'capacity' => 2,
                'image' => '/chambre_confort.png'
            ]
        ];

        foreach ($roomTypes as $typeData) {
            $type = \App\Models\RoomType::create($typeData);

            // Create a few rooms for each type
            for ($i = 1; $i <= 3; $i++) {
                \App\Models\Room::create([
                    'room_type_id' => $type->id,
                    'room_number' => strtoupper(substr($type->name, 0, 1)) . $type->id . '0' . $i,
                    'status' => 'available'
                ]);
            }
        }
    }
}
