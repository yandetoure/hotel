<x-app-layout>
    <x-slot name="header">
        <h2 class="text-amber-500 font-black tracking-[0.4em] mb-2 text-[10px] uppercase">Configuration</h2>
        <h3 class="text-4xl font-black tracking-tight text-white">Types de <span class="text-gradient">Chambres</span></h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 rounded-2xl font-bold text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-10 px-4 sm:px-0">
                <a href="{{ route('admin.room-types.create') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-black text-[10px] font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-all shadow-lg shadow-amber-500/20">
                    <span class="material-symbols-outlined text-base">add</span>
                    Ajouter un type
                </a>
            </div>

            {{-- GRID DE CARTES --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($roomTypes as $type)
                    <div class="glass rounded-[2rem] border-white/5 overflow-hidden group hover:border-amber-500/20 transition-all">

                        {{-- Image --}}
                        <div class="relative h-52 overflow-hidden bg-slate-900">
                            @if($type->image)
                                <img src="{{ asset('storage/' . $type->image) }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="material-symbols-outlined text-7xl text-slate-700">image</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>

                            {{-- Badge catégorie --}}
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1.5 rounded-full bg-amber-500/20 border border-amber-500/30 text-amber-400 text-[9px] font-black uppercase tracking-widest backdrop-blur-sm">
                                    {{ $type->category }}
                                </span>
                            </div>

                            {{-- Badge nb chambres --}}
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1.5 rounded-full bg-white/10 border border-white/20 text-white text-[9px] font-black uppercase tracking-widest backdrop-blur-sm">
                                    {{ $type->rooms_count }} chambre{{ $type->rooms_count > 1 ? 's' : '' }}
                                </span>
                            </div>
                        </div>

                        {{-- Infos --}}
                        <div class="p-6">
                            <h4 class="text-white font-black text-lg mb-1">{{ $type->name }}</h4>
                            @if($type->description)
                                <p class="text-slate-500 text-xs leading-relaxed mb-4 line-clamp-2">{{ $type->description }}</p>
                            @else
                                <p class="text-slate-600 text-xs mb-4 italic">Aucune description</p>
                            @endif

                            <div class="flex items-center justify-between mb-5">
                                <div class="flex items-center gap-2 text-slate-400 text-xs">
                                    <span class="material-symbols-outlined text-base">group</span>
                                    <span>{{ $type->capacity }} pers.</span>
                                </div>
                                <div class="text-amber-500 font-black text-sm">
                                    {{ number_format($type->price_per_night, 0, ',', ' ') }} <span class="text-[10px] text-slate-500 font-bold">FCFA / nuit</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('admin.room-types.edit', $type->id) }}"
                                    class="flex-1 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white text-xs font-bold uppercase tracking-widest transition-all flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-base">edit</span>
                                    Modifier
                                </a>
                                <form action="{{ route('admin.room-types.destroy', $type->id) }}" method="POST"
                                      onsubmit="return confirm('Supprimer ce type ? Les chambres associées seront aussi supprimées.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="py-3 px-4 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-500 transition-all flex items-center justify-center">
                                        <span class="material-symbols-outlined text-base">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 glass rounded-[2rem] border-white/5 p-16 text-center">
                        <span class="material-symbols-outlined text-6xl text-slate-700 mb-4 block">category</span>
                        <p class="text-slate-500 font-bold mb-2">Aucun type de chambre configuré</p>
                        <p class="text-slate-600 text-sm mt-1 mb-6">Commencez par ajouter votre premier type</p>
                        <a href="{{ route('admin.room-types.create') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-black font-black text-xs uppercase tracking-widest rounded-xl">
                            <span class="material-symbols-outlined text-base">add</span>
                            Ajouter un type
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
