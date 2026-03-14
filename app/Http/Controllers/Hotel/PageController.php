<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
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
     * Page Hôtels - toutes les catégories de chambres
     */
    public function hotels()
    {
        $roomTypes = RoomType::orderBy('category')->orderBy('price_per_night')->get();
        return view('hotels.index', compact('roomTypes'));
    }
}
