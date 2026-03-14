<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\RoomType;

class PageController extends Controller
{
    /**
     * Page Séminaires - affiche uniquement les Salles de Séminaire
     */
    public function seminaires()
    {
        $salles = RoomType::where('category', 'Salle de Séminaire')
            ->orderBy('capacity', 'desc')
            ->get();

        return view('seminaires', compact('salles'));
    }

    /**
     * Page Offres - affiche Chambres, Suites, Appartements, Bungalows, Villas
     */
    public function offres()
    {
        $roomTypes = RoomType::whereNotIn('category', ['Salle de Séminaire'])
            ->orderBy('price_per_night')
            ->get()
            ->groupBy('category');

        return view('offres', compact('roomTypes'));
    }

    /**
     * Page Hôtels - types de chambres groupés par hôtel avec filtres Alpine.js
     */
    public function hotels()
    {
        $hotels   = Hotel::where('active', true)->orderBy('name')->get();
        $roomTypes = RoomType::with('hotel')
            ->whereHas('hotel', fn($q) => $q->where('active', true))
            ->orderBy('price_per_night')
            ->get();

        return view('hotels.index', compact('hotels', 'roomTypes'));
    }
}
