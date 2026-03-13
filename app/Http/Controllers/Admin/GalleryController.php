<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::latest()->get();
        return view('admin.gallery.index', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_key' => 'required|string',
            'category' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        try {
            $path = $request->file('image')->store('gallery', 'public');

            GalleryItem::create([
                'hotel_key' => $request->hotel_key,
                'category' => $request->category,
                'image_path' => 'storage/' . $path,
            ]);

            return redirect()->back()->with('success', 'Image ajoutée avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['image' => 'Erreur lors de l\'enregistrement : ' . $e->getMessage()])->withInput();
        }
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $request->validate([
            'hotel_key' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'hotel_key' => $request->hotel_key,
            'category' => $request->category,
        ];

        if ($request->hasFile('image')) {
            if (str_starts_with($gallery->image_path, 'storage/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $gallery->image_path));
            }
            
            $path = $request->file('image')->store('gallery', 'public');
            $data['image_path'] = 'storage/' . $path;
        }

        $gallery->update($data);

        return redirect()->back()->with('success', 'Image mise à jour !');
    }

    public function destroy(GalleryItem $gallery)
    {
        if (str_starts_with($gallery->image_path, 'storage/')) {
            Storage::disk('public')->delete(str_replace('storage/', '', $gallery->image_path));
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Image supprimée.');
    }
}
