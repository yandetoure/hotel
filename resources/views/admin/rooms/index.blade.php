<x-app-layout>
    <x-slot name="header">
        <h2 class="text-amber-500 font-black tracking-[0.4em] mb-2 text-[10px] uppercase">Gestion de l'Hôtel</h2>
        <h3 class="text-4xl font-black tracking-tight text-white">Nos <span class="text-gradient">Chambres</span></h3>
    </x-slot>

    <div class="py-12" x-data="{ 
        showModal: false, 
        editingItem: null,
        room_number: '',
        room_type_id: '',
        status: 'available',
        form_action: '/admin/rooms',
        method: 'POST',
        imagePreview: null,
        currentImage: null,

        openCreate() {
            this.editingItem = null;
            this.room_number = '';
            this.room_type_id = '{{ $roomTypes->first()->id ?? '' }}';
            this.status = 'available';
            this.form_action = '/admin/rooms';
            this.method = 'POST';
            this.imagePreview = null;
            this.currentImage = null;
            this.showModal = true;
        },

        openEdit(room) {
            this.editingItem = room.id;
            this.room_number = room.room_number;
            this.room_type_id = room.room_type_id;
            this.status = room.status;
            this.form_action = `/admin/rooms/${room.id}`;
            this.method = 'PUT';
            this.imagePreview = null;
            this.currentImage = room.image ? '/storage/' + room.image : null;
            this.showModal = true;
        },

        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => { this.imagePreview = e.target.result; };
                reader.readAsDataURL(file);
            }
        }
    }">
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
                <button @click="openCreate()"
                    class="px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-black text-[10px] font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-all shadow-lg shadow-amber-500/20">
                    Ajouter une Chambre
                </button>
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
                        @foreach($rooms as $room)
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
                                        <img src="{{ $room->roomType->image }}" class="w-12 h-12 rounded-xl object-cover border border-white/5">
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
                                        <button @click="openEdit({{ json_encode($room) }})" class="p-4 rounded-xl bg-white/5 hover:bg-white/10 text-white transition-all">
                                            ⚙️
                                        </button>
                                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Supprimer cette chambre ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-4 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-500 transition-all">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Form -->
        <div x-show="showModal" 
             class="fixed inset-0 z-[110] flex items-center justify-center p-6 bg-black/80 backdrop-blur-sm"
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
            <div class="glass w-full max-w-xl rounded-[3rem] border-white/10 p-10 relative" @click.away="showModal = false">
                <button @click="showModal = false" class="absolute top-8 right-8 text-slate-500 hover:text-white transition-colors">✕</button>
                
                <h3 class="text-2xl font-black text-white mb-8">
                    <span x-text="editingItem ? 'Modifier' : 'Ajouter'"></span> une <span class="text-gradient">Chambre</span>
                </h3>

                <form :action="form_action" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <template x-if="method === 'PUT'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <!-- Room Number -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Numéro de Chambre</label>
                        <input type="text" name="room_number" x-model="room_number" placeholder="Ex: 101" class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                    </div>

                    <!-- Room Type -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Type de Chambre</label>
                        <select name="room_type_id" x-model="room_type_id" class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                            @foreach($roomTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }} ({{ number_format($type->price_per_night, 0, ',', ' ') }} FCFA)</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Status</label>
                        <select name="status" x-model="status" class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                            <option value="available">Disponible</option>
                            <option value="occupied">Occupée</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>

                    <!-- Image -->
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Photo de la chambre</label>

                        <!-- Prévisualisation -->
                        <div x-show="imagePreview || currentImage" class="relative w-full h-48 rounded-2xl overflow-hidden border border-white/10">
                            <img :src="imagePreview || currentImage" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <span class="absolute bottom-3 left-4 text-[10px] font-bold text-white/70 uppercase tracking-widest">Aperçu</span>
                        </div>

                        <!-- Zone de dépôt -->
                        <label class="flex flex-col items-center justify-center w-full h-32 rounded-2xl border border-dashed border-white/20 bg-slate-900 hover:border-amber-500/50 hover:bg-amber-500/5 transition-all cursor-pointer">
                            <input type="file" name="image" accept="image/*" class="hidden" @change="handleImageChange($event)">
                            <span class="material-symbols-outlined text-3xl text-slate-600 mb-2">add_photo_alternate</span>
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Cliquer pour choisir une image</span>
                            <span class="text-[9px] text-slate-600 mt-1">JPEG, PNG, WEBP — max 4 Mo</span>
                        </label>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full py-5 bg-gradient-to-r from-amber-500 to-orange-600 text-black font-black uppercase tracking-[0.3em] text-xs rounded-2xl hover:scale-[1.02] transition-all shadow-xl shadow-amber-500/20">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
