<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.rooms') }}" class="p-2 rounded-xl bg-white/5 hover:bg-white/10 text-slate-400 hover:text-white transition-all">
                <span class="material-symbols-outlined text-xl">arrow_back</span>
            </a>
            <div>
                <h2 class="text-amber-500 font-black tracking-[0.4em] mb-1 text-[10px] uppercase">Gestion de l'Hôtel</h2>
                <h3 class="text-4xl font-black tracking-tight text-white">Modifier <span class="text-gradient">Chambre {{ $room->room_number }}</span></h3>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if($errors->any())
                <div class="mb-8 p-5 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl text-sm">
                    <ul class="space-y-1 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="glass rounded-[2.5rem] border-white/5 p-10">
                <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('admin.rooms._form', ['room' => $room])
                    <div class="pt-8 flex gap-4">
                        <a href="{{ route('admin.rooms') }}"
                           class="flex-1 py-5 rounded-2xl bg-white/5 hover:bg-white/10 text-white font-black uppercase tracking-[0.3em] text-xs text-center transition-all">
                            Annuler
                        </a>
                        <button type="submit"
                            class="flex-[2] py-5 bg-gradient-to-r from-amber-500 to-orange-600 text-black font-black uppercase tracking-[0.3em] text-xs rounded-2xl hover:scale-[1.02] transition-all shadow-xl shadow-amber-500/20">
                            Enregistrer les Modifications
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
