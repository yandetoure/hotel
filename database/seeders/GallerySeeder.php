<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GalleryItem;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = ['royal', 'pelican', 'nema'];
        $categories = ['hotel', 'pool', 'food', 'spa', 'room', 'event'];

        foreach ($hotels as $hotel) {
            foreach ($categories as $category) {
                // Add 2 images per category per hotel
                for ($i = 1; $i <= 2; $i++) {
                    GalleryItem::create([
                        'hotel_key' => $hotel,
                        'category' => $category,
                        'image_path' => "assets/img/{$hotel}.png",
                    ]);
                }
            }
        }
    }
}
