<?php

use Illuminate\Support\Facades\Route;

use Livewire\Volt\Volt;

Route::view('/', 'welcome');

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
