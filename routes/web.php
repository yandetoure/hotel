<?php

use Illuminate\Support\Facades\Route;

use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('home');
Route::view('/hotels', 'hotels.index')->name('hotels.index');
Route::view('/offres', 'offres')->name('offres');
Route::view('/seminaires', 'seminaires')->name('seminaires');
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
