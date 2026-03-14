<x-app-layout>
    <x-slot name="header">
        <h2 class="text-amber-500 font-black tracking-[0.4em] mb-2 text-[10px] uppercase">Contenu Visuel</h2>
        <h3 class="text-4xl font-black tracking-tight text-white">Gestion de la <span class="text-gradient">Galerie</span></h3>
    </x-slot>

    <div class="py-12" x-data="{
        showModal: false,
        editingItem: null,
        hotel_key: 'royal',
        category: 'hotel',
        image_preview: null,
        existing_image: null,
        form_action: '/admin/gallery',
        method: 'POST',

        openCreate() {
            this.editingItem = null;
            this.hotel_key = 'royal';
            this.category = 'hotel';
            this.image_preview = null;
            this.existing_image = null;
            this.form_action = '/admin/gallery';
            this.method = 'POST';
            this.showModal = true;
        },

        openEdit(item) {
            this.editingItem = item.id;
            this.hotel_key = item.hotel_key;
            this.category = item.category;
            this.image_preview = null;
            this.existing_image = '/' + item.image_path;
            this.form_action = `/admin/gallery/${item.id}`;
            this.method = 'PUT';
            this.showModal = true;
        },

        handleImage(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => this.image_preview = e.target.result;
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

            <div class="flex justify-end mb-10 px-4 sm:px-0 text-white">
                <button @click="openCreate()"
                    class="px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-black text-[10px] font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-all shadow-lg shadow-amber-500/20">
                    Ajouter une Photo
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($items as $item)
                    <div class="glass rounded-[2rem] border-white/5 overflow-hidden group relative">
                        <div class="aspect-square overflow-hidden">
                            <img src="{{ $item->getFirstMediaUrl('galerie','preview') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col items-center justify-center p-6 text-center">
                            <div class="text-[10px] font-bold text-amber-500 uppercase tracking-widest mb-1">{{ $item->hotel_key }}</div>
                            <div class="text-[10px] text-white/70 uppercase tracking-widest mb-4">{{ $item->category }}</div>
                            <div class="flex gap-2">
                                <button @click="openEdit({{ json_encode($item) }})" class="p-3 rounded-xl bg-white/10 hover:bg-white/20 text-white transition-all text-sm">
                                    ✏️
                                </button>
                                <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-3 rounded-xl bg-red-500/20 hover:bg-red-500/40 text-white transition-all text-sm">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(count($items) === 0)
                <div class="glass rounded-[3rem] border-white/5 p-20 text-center">
                    <div class="text-6xl mb-6">📸</div>
                    <h4 class="text-xl font-bold text-white mb-2">Aucune photo dans la galerie</h4>
                    <p class="text-slate-500 text-sm max-w-xs mx-auto">Commencez par ajouter des photos pour vos hôtels et services.</p>
                </div>
            @endif
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
                <button @click="showModal = false" class="absolute top-8 right-8 text-slate-500 hover:text-white transition-colors">
                    ✕
                </button>

                <h3 class="text-2xl font-black text-white mb-8">
                    <span x-text="editingItem ? 'Modifier' : 'Ajouter'"></span> une <span class="text-gradient">Photo</span>
                </h3>

                <form :action="form_action" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <template x-if="method === 'PUT'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <!-- Hotel Select -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Hôtel</label>
                        <select name="hotel_key" x-model="hotel_key" class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                            <option value="royal">Le Royal Saly</option>
                            <option value="pelican">Le Pélican du Saloum</option>
                            <option value="nema">Le Néma Kadior</option>
                        </select>
                    </div>

                    <!-- Category Select -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Catégorie</label>
                        <select name="category" x-model="category" class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                            <option value="hotel">Hôtel / Façade</option>
                            <option value="pool">Piscines & Plage</option>
                            <option value="food">Restaurant / Gastronomie</option>
                            <option value="spa">Spa & Détente</option>
                            <option value="room">Chambres & Suites</option>
                            <option value="event">Événements</option>
                        </select>
                    </div>


                    <!-- Image Upload -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-4">Image</label>
                        <div class="relative group">
                            <input type="file" name="image" @change="handleImage" class="absolute inset-0 opacity-0 cursor-pointer z-10">
                            <div class="w-full bg-white/5 border-2 border-dashed border-white/10 rounded-2xl p-8 flex flex-col items-center justify-center group-hover:border-amber-500/50 transition-all">
                                <template x-if="image_preview">
                                    <div class="text-center">
                                        <img :src="image_preview" class="w-24 h-24 rounded-xl object-cover mb-4 mx-auto">
                                        <div class="text-xs text-amber-500 font-bold">Nouvelle image prête !</div>
                                    </div>
                                </template>
                                <template x-if="!image_preview && existing_image">
                                    <div class="text-center">
                                        <img :src="existing_image" class="w-24 h-24 rounded-xl object-cover mb-4 mx-auto opacity-50">
                                        <div class="text-[10px] text-slate-500 uppercase font-bold">Mise à jour (Gardera l'ancienne si vide)</div>
                                    </div>
                                </template>
                                <template x-if="!image_preview && !existing_image">
                                    <div class="text-center">
                                        <div class="text-3xl mb-2">📥</div>
                                        <div class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Choisir un fichier</div>
                                        <div class="text-[8px] text-slate-600 mt-1">PNG, JPG jusqu'à 2Mo</div>
                                    </div>
                                </template>
                            </div>
                        </div>
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
