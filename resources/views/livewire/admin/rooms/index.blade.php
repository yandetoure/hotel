<?php

use function Livewire\Volt\{state, layout};
use App\Models\Room;
use App\Models\RoomType;

layout('layouts.app');

state([
    'rooms' => fn() => Room::with('roomType')->get(),
]);

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-10 px-4 sm:px-0">
            <div>
                <h2 class="text-amber-500 font-black tracking-[0.4em] mb-2 text-[10px] uppercase">Gestion de l'Hôtel
                </h2>
                <h3 class="text-4xl font-black tracking-tight text-white">Nos <span
                        class="text-gradient">Chambres</span></h3>
            </div>
            <button
                class="px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-black text-[10px] font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-all shadow-lg shadow-amber-500/20 opacity-50 cursor-not-allowed">
                Ajouter une Chambre
            </button>
        </div>

        <div class="glass rounded-[3rem] border-white/5 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/5 bg-white/5">
                        <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">N° Chambre</th>
                        <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">Type</th>
                        <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">Prix / Nuit</th>
                        <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">Status</th>
                        <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500 text-right">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                        <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors group">
                            <td class="p-8">
                                <span class="font-black text-white text-lg">{{ $room->room_number }}</span>
                            </td>
                            <td class="p-8">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $room->roomType->image }}"
                                        class="w-12 h-12 rounded-xl object-cover border border-white/5">
                                    <div>
                                        <div class="font-bold text-sm text-white">{{ $room->roomType->name }}</div>
                                        <div class="text-[10px] text-slate-500 uppercase tracking-widest">
                                            {{ $room->roomType->capacity }} Personnes</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-8 text-amber-500 font-black italic">{{ $room->roomType->price_per_night }}€</td>
                            <td class="p-8">
                                <span
                                    class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest {{ $room->status == 'available' ? 'bg-emerald-500/10 text-emerald-500' : 'bg-orange-500/10 text-orange-500' }}">
                                    {{ $room->status }}
                                </span>
                            </td>
                            <td class="p-8 text-right">
                                <button class="p-4 rounded-xl bg-white/5 hover:bg-white/10 text-white transition-all">
                                    ⚙️
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>