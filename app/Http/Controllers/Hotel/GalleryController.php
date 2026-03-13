<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $selectedHotel = $request->query('hotel', 'all');
        $selectedCategory = $request->query('category', 'all');

        $query = GalleryItem::query();

        if ($selectedHotel !== 'all') {
            $query->where('hotel_key', $selectedHotel);
        }

        if ($selectedCategory !== 'all') {
            $query->where('category', $selectedCategory);
        }

        $items = $query->latest()->get();

        return view('hotel.galerie', compact('items', 'selectedHotel', 'selectedCategory'));
    }
}
