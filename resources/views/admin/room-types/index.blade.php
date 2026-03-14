<x-app-layout>
    <x-slot name="header">
        <h2 class="text-amber-500 font-black tracking-[0.4em] mb-2 text-[10px] uppercase">Configuration</h2>
        <h3 class="text-4xl font-black tracking-tight text-white">Types de <span class="text-gradient">Chambres</span></h3>
    </x-slot>

    <div class="py-12" x-data="{
        showModal: false,
        editingItem: null,
        name: '',
        category: 'Chambre',
        description: '',
        price_per_night: '',
        capacity: 1,
        form_action: '/admin/room-types',
        method: 'POST',
        imagePreview: null,
        currentImage: null,

        categories: [
            { value: 'Chambre',         icon: 'bed',               label: 'Chambre' },
            { value: 'Suite',           icon: 'king_bed',          label: 'Suite' },
            { value: 'Suite Présidentielle', icon: 'diamond',      label: 'Suite Présidentielle' },
            { value: 'Salle de Séminaire',   icon: 'meeting_room', label: 'Salle de Séminaire' },
            { value: 'Appartement',     icon: 'apartment',         label: 'Appartement' },
            { value: 'Bungalow',        icon: 'cottage',           label: 'Bungalow' },
            { value: 'Villa',           icon: 'villa',             label: 'Villa' },
        ],

        getCategoryIcon(cat) {
            const found = this.categories.find(c => c.value === cat);
            return found ? found.icon : 'bed';
        },

        openCreate() {
            this.editingItem = null;
            this.name = '';
            this.category = 'Chambre';
            this.description = '';
            this.price_per_night = '';
            this.capacity = 1;
            this.form_action = '/admin/room-types';
            this.method = 'POST';
            this.imagePreview = null;
            this.currentImage = null;
            this.showModal = true;
        },

        openEdit(item) {
            this.editingItem = item.id;
            this.name = item.name;
            this.category = item.category;
            this.description = item.description || '';
            this.price_per_night = item.price_per_night;
            this.capacity = item.capacity;
            this.form_action = `/admin/room-types/${item.id}`;
            this.method = 'PUT';
            this.imagePreview = null;
            this.currentImage = item.image ? '/storage/' + item.image : null;
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
                    + Ajouter un type
                </button>
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
                                <button @click="openEdit({{ json_encode($type) }})"
                                    class="flex-1 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white text-xs font-bold uppercase tracking-widest transition-all flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-base">edit</span>
                                    Modifier
                                </button>
                                <form action="{{ route('admin.room-types.destroy', $type->id) }}" method="POST"
                                      onsubmit="return confirm('Supprimer ce type de chambre ? Les chambres associées seront aussi supprimées.');">
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
                        <p class="text-slate-500 font-bold">Aucun type de chambre configuré</p>
                        <p class="text-slate-600 text-sm mt-1">Commencez par ajouter votre premier type</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- ===== MODAL FORM ===== --}}
        <div x-show="showModal"
             class="fixed inset-0 z-[110] flex items-center justify-center p-6 bg-black/80 backdrop-blur-sm"
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">

            <div class="glass w-full max-w-2xl rounded-[3rem] border-white/10 p-10 relative max-h-[90vh] overflow-y-auto" @click.away="showModal = false">
                <button @click="showModal = false" class="absolute top-8 right-8 text-slate-500 hover:text-white transition-colors">✕</button>

                <h3 class="text-2xl font-black text-white mb-8">
                    <span x-text="editingItem ? 'Modifier' : 'Nouveau'"></span> <span class="text-gradient">Type de Chambre</span>
                </h3>

                <form :action="form_action" method="POST" class="space-y-5" enctype="multipart/form-data">
                    @csrf
                    <template x-if="method === 'PUT'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    {{-- Catégorie --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Catégorie</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                            <template x-for="cat in categories" :key="cat.value">
                                <button type="button"
                                    @click="category = cat.value"
                                    :class="category === cat.value
                                        ? 'border-amber-500/60 bg-amber-500/10 text-amber-400'
                                        : 'border-white/10 bg-slate-900 text-slate-500 hover:border-white/20'"
                                    class="flex items-center gap-2 px-4 py-3 rounded-2xl border text-xs font-bold transition-all">
                                    <span class="material-symbols-outlined text-base" x-text="cat.icon"></span>
                                    <span x-text="cat.label"></span>
                                </button>
                            </template>
                        </div>
                        <input type="hidden" name="category" :value="category">
                    </div>

                    {{-- Nom --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Nom du type</label>
                        <input type="text" name="name" x-model="name"
                               placeholder="Ex: Suite Deluxe, Chambre Standard, Salle Conférence..."
                               class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                    </div>

                    {{-- Description --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Description</label>
                        <textarea name="description" x-model="description" rows="3"
                                  placeholder="Décrivez les caractéristiques, équipements, vue..."
                                  class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all resize-none"></textarea>
                    </div>

                    {{-- Prix & Capacité --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Prix / Nuit (FCFA)</label>
                            <input type="number" name="price_per_night" x-model="price_per_night"
                                   placeholder="Ex: 75000"
                                   min="0" step="500"
                                   class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Capacité (personnes)</label>
                            <input type="number" name="capacity" x-model="capacity"
                                   placeholder="Ex: 2"
                                   min="1" max="500"
                                   class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                        </div>
                    </div>

                    {{-- Image --}}
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Photo principale</label>

                        {{-- Prévisualisation --}}
                        <div x-show="imagePreview || currentImage" class="relative w-full h-52 rounded-2xl overflow-hidden border border-white/10">
                            <img :src="imagePreview || currentImage" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <span class="absolute bottom-3 left-4 text-[10px] font-bold text-white/70 uppercase tracking-widest">Aperçu</span>
                        </div>

                        {{-- Upload zone --}}
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
