<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('roomType')->orderBy('room_number')->get();
        $roomTypes = RoomType::all();
        return view('admin.rooms.index', compact('rooms', 'roomTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|string|unique:rooms,room_number',
            'room_type_id' => 'required|exists:room_types,id',
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        Room::create($request->all());

        return redirect()->back()->with('success', 'Chambre ajoutée avec succès !');
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|string|unique:rooms,room_number,' . $room->id,
            'room_type_id' => 'required|exists:room_types,id',
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        $room->update($request->all());

        return redirect()->back()->with('success', 'Chambre mise à jour !');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->back()->with('success', 'Chambre supprimée.');
    }
}
