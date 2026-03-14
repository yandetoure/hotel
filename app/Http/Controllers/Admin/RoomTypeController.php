<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::withCount('rooms')->orderBy('name')->get();
        return view('admin.room-types.index', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:100',
            'category'        => 'required|string|max:100',
            'description'     => 'nullable|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity'        => 'required|integer|min:1',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $data = $request->only(['name', 'category', 'description', 'price_per_night', 'capacity']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('room-types', 'public');
        }

        RoomType::create($data);

        return redirect()->back()->with('success', 'Type de chambre créé avec succès !');
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name'            => 'required|string|max:100',
            'category'        => 'required|string|max:100',
            'description'     => 'nullable|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity'        => 'required|integer|min:1',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $data = $request->only(['name', 'category', 'description', 'price_per_night', 'capacity']);

        if ($request->hasFile('image')) {
            if ($roomType->image) {
                Storage::disk('public')->delete($roomType->image);
            }
            $data['image'] = $request->file('image')->store('room-types', 'public');
        }

        $roomType->update($data);

        return redirect()->back()->with('success', 'Type de chambre mis à jour !');
    }

    public function destroy(RoomType $roomType)
    {
        if ($roomType->image) {
            Storage::disk('public')->delete($roomType->image);
        }
        $roomType->delete();

        return redirect()->back()->with('success', 'Type de chambre supprimé.');
    }
}
