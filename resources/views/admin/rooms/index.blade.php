<x-app-layout>
    <x-slot name="header">
        <h2 class="text-amber-500 font-black tracking-[0.4em] mb-2 text-[10px] uppercase">Gestion de l'Hôtel</h2>
        <h3 class="text-4xl font-black tracking-tight text-white">Nos <span class="text-gradient">Chambres</span></h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 rounded-2xl font-bold text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-8 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-2xl font-bold text-sm">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex justify-end mb-10 px-4 sm:px-0">
                <a href="{{ route('admin.rooms.create') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-black text-[10px] font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-all shadow-lg shadow-amber-500/20">
                    <span class="material-symbols-outlined text-base">add</span>
                    Ajouter une Chambre
                </a>
            </div>

            <div class="glass rounded-[3rem] border-white/5 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/5 bg-white/5">
                            <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">Photo</th>
                            <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">N° Chambre</th>
                            <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">Type</th>
                            <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">Prix / Nuit</th>
                            <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500">Status</th>
                            <th class="p-8 text-[10px] font-black uppercase tracking-widest text-slate-500 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rooms as $room)
                            <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors group">
                                <td class="p-8">
                                    @if($room->image)
                                        <img src="{{ asset('storage/' . $room->image) }}" class="w-16 h-14 rounded-xl object-cover border border-white/10">
                                    @else
                                        <div class="w-16 h-14 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
                                            <span class="material-symbols-outlined text-slate-600 text-2xl">image</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-8">
                                    <span class="font-black text-white text-lg">{{ $room->room_number }}</span>
                                </td>
                                <td class="p-8">
                                    <div class="flex items-center gap-4">
                                        @if($room->roomType->image)
                                            <img src="{{ asset('storage/' . $room->roomType->image) }}" class="w-12 h-12 rounded-xl object-cover border border-white/5">
                                        @endif
                                        <div>
                                            <div class="font-bold text-sm text-white">{{ $room->roomType->name }}</div>
                                            <div class="text-[10px] text-slate-500 uppercase tracking-widest">{{ $room->roomType->capacity }} Personnes</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-8 text-amber-500 font-black italic">
                                    {{ number_format($room->roomType->price_per_night, 0, ',', ' ') }} FCFA
                                </td>
                                <td class="p-8">
                                    <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest
                                        {{ $room->status == 'available' ? 'bg-emerald-500/10 text-emerald-500' : ($room->status == 'maintenance' ? 'bg-red-500/10 text-red-500' : 'bg-orange-500/10 text-orange-500') }}">
                                        {{ $room->status }}
                                    </span>
                                </td>
                                <td class="p-8 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.rooms.edit', $room->id) }}"
                                           class="p-4 rounded-xl bg-white/5 hover:bg-white/10 text-white transition-all flex items-center justify-center">
                                            <span class="material-symbols-outlined text-base">edit</span>
                                        </a>
                                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Supprimer cette chambre ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-4 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-500 transition-all">
                                                <span class="material-symbols-outlined text-base">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-16 text-center">
                                    <span class="material-symbols-outlined text-6xl text-slate-700 mb-4 block">bed</span>
                                    <p class="text-slate-500 font-bold mb-2">Aucune chambre enregistrée</p>
                                    <p class="text-slate-600 text-sm mb-6">Commencez par ajouter votre première chambre</p>
                                    <a href="{{ route('admin.rooms.create') }}"
                                       class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-black font-black text-xs uppercase tracking-widest rounded-xl">
                                        <span class="material-symbols-outlined text-base">add</span>
                                        Ajouter une chambre
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
