<x-hotel-layout>
    @section('title', 'Galerie - Les Hôtels du Sénégal Group')

    <div class="pt-32 pb-24 px-6 min-h-screen bg-[var(--bg-creme)]" x-data="{ 
        hotel: '{{ $selectedHotel }}', 
        category: '{{ $selectedCategory }}',
        updateFilters() {
            window.location.href = `/galerie?hotel=${this.hotel}&category=${this.category}`;
        }
    }">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="font-serif text-5xl md:text-6xl text-gray-800 mb-4 tracking-tight">Galerie</h1>
                <p class="text-xl font-serif italic text-primary-brown flex items-center justify-center space-x-4">
                    <span>Découvrez le Charme des Hôtels du Sénégal</span>
                    <span class="material-symbols-outlined text-sm opacity-50">wb_sunny</span>
                </p>
            </div>

            <!-- Filters -->
            <div class="flex flex-col space-y-8 mb-16">
                <!-- Hotel Filter -->
                <div class="flex flex-wrap justify-center gap-4">
                    <button @click="hotel = 'all'; updateFilters()" 
                        :class="hotel === 'all' ? 'bg-primary-brown text-white' : 'bg-white/50 text-gray-600 hover:bg-white'"
                        class="px-8 py-2 text-xs uppercase tracking-widest font-bold transition-all shadow-sm">
                        Tous les Hôtels
                    </button>
                    <button @click="hotel = 'royal'; updateFilters()" 
                        :class="hotel === 'royal' ? 'bg-primary-brown text-white' : 'bg-white/50 text-gray-600 hover:bg-white'"
                        class="px-8 py-2 text-xs uppercase tracking-widest font-bold transition-all shadow-sm">
                        Le Royal Saly
                    </button>
                    <button @click="hotel = 'pelican'; updateFilters()" 
                        :class="hotel === 'pelican' ? 'bg-primary-brown text-white' : 'bg-white/50 text-gray-600 hover:bg-white'"
                        class="px-8 py-2 text-xs uppercase tracking-widest font-bold transition-all shadow-sm">
                        Le Pélican du Saloum
                    </button>
                    <button @click="hotel = 'nema'; updateFilters()" 
                        :class="hotel === 'nema' ? 'bg-primary-brown text-white' : 'bg-white/50 text-gray-600 hover:bg-white'"
                        class="px-8 py-2 text-xs uppercase tracking-widest font-bold transition-all shadow-sm">
                        Le Néma Kadior
                    </button>
                </div>

                <!-- Category Filter -->
                <div class="flex flex-wrap justify-center gap-0 border border-gray-200 divide-x divide-gray-200 shadow-sm max-w-4xl mx-auto bg-white/30">
                    @php
                        $categories = [
                            'all' => 'Tout',
                            'hotel' => 'Hôtel',
                            'pool' => 'Piscines & Plage',
                            'food' => 'Gourmand',
                            'spa' => 'Spa',
                            'room' => 'Chambres',
                            'event' => 'Événements'
                        ];
                    @endphp
                    @foreach($categories as $key => $label)
                        <button @click="category = '{{ $key }}'; updateFilters()"
                            :class="category === '{{ $key }}' ? 'bg-primary-brown text-white shadow-inner' : 'text-gray-500 hover:bg-white'"
                            class="grow px-6 py-3 text-[10px] uppercase tracking-[0.2em] font-bold transition-all">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Image Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($items as $item)
                    <div class="group relative aspect-video overflow-hidden border border-white/60 shadow-sm hover:shadow-xl transition-all duration-700 cursor-zoom-in">
                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->category }}"
                            class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col items-center justify-center text-white p-6">
                            <span class="text-[10px] uppercase tracking-[0.4em] mb-2">{{ $item->category }}</span>
                            <div class="mt-4 w-8 h-px bg-white/50"></div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center">
                        <span class="material-symbols-outlined text-4xl text-gray-300 mb-4">image_not_supported</span>
                        <p class="font-serif text-xl text-gray-400">Aucune image ne correspond à votre sélection.</p>
                    </div>
                @endforelse
            </div>

            <!-- Call to Action -->
            <div class="mt-24 text-center">
                <h2 class="font-serif text-3xl md:text-5xl text-gray-800 mb-10">Prêt pour un séjour de rêve ?</h2>
                <a href="/reservations" class="inline-block bg-[#8B6B41] text-white px-12 py-4 rounded-none text-xs uppercase tracking-[0.3em] font-bold shadow-lg hover:bg-[#765A36] transition-all">
                    Réserver Votre Séjour <span class="ml-2 font-serif">›</span>
                </a>
            </div>
        </div>
    </div>
</x-hotel-layout>
