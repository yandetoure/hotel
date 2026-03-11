<?php

use Illuminate\Support\Facades\Route;

use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('home');
Route::view('/hotels', 'hotels.index')->name('hotels.index');
Route::view('/offres', 'offres')->name('offres');
Route::view('/seminaires', 'seminaires')->name('seminaires');
Route::get('/galerie', function () {
    $hotels = [
        'Royal Saly' => 'Royal saly',
        'Nema' => 'nema',
        'Pelican' => 'pellican'
    ];

    $gallery = [];
    foreach ($hotels as $displayName => $folderName) {
        $path = public_path('assets/img/' . $folderName);
        if (file_exists($path)) {
            $allFiles = array_filter(scandir($path), function ($file) use ($path) {
                return !is_dir($path . '/' . $file) && in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'gif']);
            });

            // Group files to find high-res vs thumbnails
            $files = [];
            foreach ($allFiles as $file) {
                $info = pathinfo($file);
                $name = $info['filename'];
                $ext = $info['extension'];

                // If it's a thumbnail, check if we already added a high-res version
                if (str_ends_with($name, '-th')) {
                    $baseName = substr($name, 0, -3);
                    $highResFile = $baseName . '.' . $ext;
                    if (in_array($highResFile, $allFiles)) {
                        continue; // Skip thumbnail if high-res exists
                    }
                }

                $files[] = $file;
            }

            $gallery[$displayName] = array_map(function ($file) use ($folderName) {
                return 'assets/img/' . $folderName . '/' . $file;
            }, $files);
        }
    }

    return view('gallery', compact('gallery'));
})->name('gallery');
Route::view('/contact', 'contact')->name('contact');
Route::get('/hotel/{slug}', function ($slug) {
    return view('hotels.show', ['slug' => $slug]);
})->name('hotels.show');
Route::view('/reservations', 'booking.form')->name('booking.form');
Route::view('/confirmation', 'booking.confirmation')->name('booking.confirmation');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('book', 'booking.pages.create')
    ->name('booking.create');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Volt::route('dashboard', 'admin.dashboard')->name('admin.dashboard');
    Volt::route('rooms', 'admin.rooms.index')->name('admin.rooms');
});

require __DIR__ . '/auth.php';
