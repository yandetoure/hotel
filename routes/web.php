<?php

use Illuminate\Support\Facades\Route;

use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('home');
Route::get('/hotels', [App\Http\Controllers\Hotel\PageController::class, 'hotels'])->name('hotels.index');
Route::get('/offres', [App\Http\Controllers\Hotel\PageController::class, 'offres'])->name('offres');
Route::get('/seminaires', [App\Http\Controllers\Hotel\PageController::class, 'seminaires'])->name('seminaires');
Route::view('/restaurant-bars', 'restaurants')->name('restaurants');
Route::view('/activites', 'activites')->name('activites');
Route::get('/galerie', [App\Http\Controllers\Hotel\GalleryController::class, 'index'])->name('galerie');
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
    // Room Management
    Route::get('rooms', [App\Http\Controllers\Admin\RoomController::class, 'index'])->name('admin.rooms');
    Route::get('rooms/create', [App\Http\Controllers\Admin\RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('rooms', [App\Http\Controllers\Admin\RoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('rooms/{room}/edit', [App\Http\Controllers\Admin\RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::put('rooms/{room}', [App\Http\Controllers\Admin\RoomController::class, 'update'])->name('admin.rooms.update');
    Route::delete('rooms/{room}', [App\Http\Controllers\Admin\RoomController::class, 'destroy'])->name('admin.rooms.destroy');
    
    // Gallery Management
    Route::get('gallery', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.gallery');
    Route::post('gallery', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::put('gallery/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('gallery/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

    // Room Type Management
    Route::get('room-types', [App\Http\Controllers\Admin\RoomTypeController::class, 'index'])->name('admin.room-types');
    Route::get('room-types/create', [App\Http\Controllers\Admin\RoomTypeController::class, 'create'])->name('admin.room-types.create');
    Route::post('room-types', [App\Http\Controllers\Admin\RoomTypeController::class, 'store'])->name('admin.room-types.store');
    Route::get('room-types/{roomType}/edit', [App\Http\Controllers\Admin\RoomTypeController::class, 'edit'])->name('admin.room-types.edit');
    Route::put('room-types/{roomType}', [App\Http\Controllers\Admin\RoomTypeController::class, 'update'])->name('admin.room-types.update');
    Route::delete('room-types/{roomType}', [App\Http\Controllers\Admin\RoomTypeController::class, 'destroy'])->name('admin.room-types.destroy');
});

require __DIR__ . '/auth.php';
