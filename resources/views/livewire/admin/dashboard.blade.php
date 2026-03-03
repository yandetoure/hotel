<?php

use function Livewire\Volt\{state, layout};
use App\Models\Room;
use App\Models\Booking;
use App\Models\Guest;

layout('layouts.app');

state([
    'totalRooms' => fn() => Room::count(),
    'activeBookings' => fn() => Booking::where('status', 'confirmed')->count(),
    'todayCheckins' => fn() => Booking::where('check_in', now()->toDateString())->count(),
    'totalRevenue' => fn() => Booking::sum('total_price'),
]);

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach([
                ['label' => 'Total Chambres', 'value' => $totalRooms, 'icon' => '🏨', 'color' => 'from-blue-500 to-cyan-500'],
                ['label' => 'Réservations Actives', 'value' => $activeBookings, 'icon' => '📅', 'color' => 'from-amber-500 to-orange-500'],
                ['label' => 'Check-ins Aujourd\'hui', 'value' => $todayCheckins, 'icon' => '🔑', 'color' => 'from-emerald-500 to-teal-500'],
                ['label' => 'Revenu Total', 'value' => number_format($totalRevenue, 0) . '€', 'icon' => '💰', 'color' => 'from-purple-500 to-pink-500']
            ] as $stat)
                <div class="glass p-8 rounded-[2rem] border-white/5 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br {{ $stat['color'] }} opacity-10 blur-3xl -mr-16 -mt-16 group-hover:opacity-20 transition-opacity"></div>
                    <div class="text-4xl mb-4">{{ $stat['icon'] }}</div>
                    <div class="text-3xl font-black text-white mb-1">{{ $stat['value'] }}</div>
                    <div class="text-[10px] uppercase font-bold tracking-widest text-slate-500">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="glass p-10 rounded-[3rem] border-white/5">
                <h3 class="text-xl font-black mb-6 uppercase tracking-tight">Actions Rapides</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('admin.rooms') }}" wire:navigate class="p-6 rounded-2xl bg-white/5 border border-white/5 hover:border-amber-500/50 hover:bg-amber-500/5 transition-all group">
                        <div class="text-2xl mb-2">🛏️</div>
                        <div class="font-bold text-sm">Gérer les Chambres</div>
                        <div class="text-[10px] text-slate-500 uppercase tracking-widest mt-1">Disponibilité & Types</div>
                    </a>
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/5 hover:border-amber-500/50 hover:bg-amber-500/5 transition-all group cursor-not-allowed opacity-50">
                        <div class="text-2xl mb-2">📝</div>
                        <div class="font-bold text-sm">Réservations</div>
                        <div class="text-[10px] text-slate-500 uppercase tracking-widest mt-1">Calendrier & Suivi</div>
                    </div>
                </div>
            </div>

            <div class="glass rounded-[3rem] border-white/5 overflow-hidden">
                <div class="p-10 border-b border-white/5 flex justify-between items-center">
                    <h3 class="text-xl font-black uppercase tracking-tight">Dernières Activités</h3>
                    <span class="text-[10px] font-bold text-amber-500 uppercase tracking-widest">En direct</span>
                </div>
                <div class="p-10 space-y-6">
                    @forelse(Booking::with('guest', 'room.roomType')->latest()->take(3)->get() as $booking)
                        <div class="flex items-center gap-6">
                            <div class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center text-xl">
                                🆕
                            </div>
                            <div class="flex-1">
                                <div class="font-bold text-sm">{{ $booking->guest->first_name }} {{ $booking->guest->last_name }}</div>
                                <div class="text-[10px] text-slate-500 uppercase tracking-widest">{{ $booking->room->roomType->name }} • {{ $booking->total_price }}€</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $booking->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10">
                            <p class="text-slate-500 text-sm font-light">Aucune activité récente.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>