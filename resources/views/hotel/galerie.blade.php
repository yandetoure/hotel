<x-hotel-layout>
    @section('title', 'Galerie - Les Hôtels du Sénégal Group')

    <!-- Hero Section -->
    <section class="relative h-[65vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/img/hero.png') }}" class="w-full h-full object-cover scale-105 animate-slow-zoom brightness-75">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="relative z-10 h-full flex flex-col justify-center items-center max-w-7xl mx-auto px-6 text-center">
            <h1 class="font-serif text-5xl md:text-7xl text-white mb-4 leading-tight drop-shadow-lg">Notre Galerie</h1>
            <p class="text-xl md:text-2xl text-white/90 font-light mb-10 drop-shadow-md italic">Plongez dans l'univers de nos établissements d'exception.</p>
        </div>
    </section>

    <!-- Main Content with Alpine.js -->
    <div class="py-24 px-6 min-h-screen bg-[#f7f1f0] relative" x-data="{
        hotel: 'all',
        category: 'all',
        lightboxOpen: false,
        lightboxImage: '',
        openLightbox(src) {
            this.lightboxImage = src;
            this.lightboxOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeLightbox() {
            this.lightboxOpen = false;
            setTimeout(() => { this.lightboxImage = ''; }, 300);
            document.body.style.overflow = 'auto';
        }
    }">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">

            <!-- Filters -->
            <div class="flex flex-col space-y-8 mb-16">
                <!-- Hotel Filter -->
                <div class="flex flex-wrap justify-center gap-4">
                    <button @click="hotel = 'all'"
                        :class="hotel === 'all' ? 'bg-[#a67c52] text-white border-[#a67c52]' : 'bg-transparent text-[#4a3a35] border-[#e8dedc] hover:border-[#a67c52]'"
                        class="px-8 py-3 text-[11px] font-bold uppercase tracking-widest border rounded transition-all italic shadow-sm">
                        Tous nos hôtels
                    </button>
                    <button @click="hotel = 'royal'"
                        :class="hotel === 'royal' ? 'bg-[#a67c52] text-white border-[#a67c52]' : 'bg-transparent text-[#4a3a35] border-[#e8dedc] hover:border-[#a67c52]'"
                        class="px-8 py-3 text-[11px] font-bold uppercase tracking-widest border rounded transition-all italic shadow-sm">
                        Le Royal Saly
                    </button>
                    <button @click="hotel = 'pelican'"
                        :class="hotel === 'pelican' ? 'bg-[#a67c52] text-white border-[#a67c52]' : 'bg-transparent text-[#4a3a35] border-[#e8dedc] hover:border-[#a67c52]'"
                        class="px-8 py-3 text-[11px] font-bold uppercase tracking-widest border rounded transition-all italic shadow-sm">
                        Le Pélican du Saloum
                    </button>
                    <button @click="hotel = 'nema'"
                        :class="hotel === 'nema' ? 'bg-[#a67c52] text-white border-[#a67c52]' : 'bg-transparent text-[#4a3a35] border-[#e8dedc] hover:border-[#a67c52]'"
                        class="px-8 py-3 text-[11px] font-bold uppercase tracking-widest border rounded transition-all italic shadow-sm">
                        Le Néma Kadior
                    </button>
                </div>

                <!-- Category Filter -->
                <div class="flex flex-wrap justify-center border border-[#e8dedc] divide-x divide-[#e8dedc] shadow-sm max-w-4xl mx-auto bg-white/50 rounded overflow-hidden">
                    @php
                        $categories = [
                            'all' => 'Tout',
                            'hotel' => 'Hôtel',
                            'pool' => 'Piscines & Plage',
                            'food' => 'Restaurant',
                            'spa' => 'Spa',
                            'room' => 'Chambres',
                            'event' => 'Événements'
                        ];
                    @endphp
                    @foreach($categories as $key => $label)
                        <button @click="category = '{{ $key }}'"
                            :class="category === '{{ $key }}' ? 'bg-[#a67c52] text-white' : 'text-[#8c7a76] hover:bg-white hover:text-[#a67c52]'"
                            class="flex-grow px-6 py-4 text-[10px] uppercase tracking-[0.2em] font-bold transition-all">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Image Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($items as $item)
                    <div x-show="(hotel === 'all' || hotel === '{{ $item->hotel_key }}') && (category === 'all' || category === '{{ $item->category }}')"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         @click="openLightbox('{{ $item->getFirstMediaUrl('galerie') }}')"
                         class="group relative aspect-[4/3] overflow-hidden rounded-xl border border-[#e8dedc] shadow-sm hover:shadow-xl transition-all duration-700 cursor-zoom-in">
                        <img src="{{ $item->getFirstMediaUrl('galerie','galerie') }}" alt="{{ $item->category }}"
                            class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col items-center justify-center text-white p-6">
                            <span class="material-symbols-outlined text-3xl mb-3 transform translate-y-4 group-hover:translate-y-0 transition-all duration-500 delay-75 text-[#a67c52]">zoom_in</span>
                            <span class="text-[10px] font-bold uppercase tracking-[0.3em] transform translate-y-4 group-hover:translate-y-0 transition-all duration-500 delay-100">Agrandir</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-black/60 backdrop-blur-md px-3 py-1.5 rounded border border-white/20">
                            <span class="text-[8px] font-bold uppercase tracking-widest text-white/90">{{ $categories[$item->category] ?? $item->category }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center bg-white/50 rounded-2xl border border-[#e8dedc]">
                        <span class="material-symbols-outlined text-5xl text-[#ceb096] mb-4">image_not_supported</span>
                        <p class="font-serif text-2xl text-[#8c7a76]">Aucune image dans la galerie pour le moment.</p>
                        <p class="text-sm mt-2 text-[#8c7a76]/70 uppercase tracking-widest font-bold">Veuillez revenir plus tard</p>
                    </div>
                @endforelse
            </div>

        </div>

        <!-- Lightbox Modal -->
        <div x-show="lightboxOpen" 
             style="display: none;"
             class="fixed inset-0 z-[100] bg-black/95 backdrop-blur-md flex items-center justify-center"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
            <!-- Close Button -->
            <button @click="closeLightbox()" class="absolute top-8 right-8 text-white/50 hover:text-white transition-colors z-[110] p-4">
                <span class="material-symbols-outlined text-4xl">close</span>
            </button>

            <!-- Image Container -->
            <div class="relative w-full h-full max-w-6xl max-h-screen p-4 sm:p-12 flex items-center justify-center" @click.away="closeLightbox()">
                <img :src="lightboxImage" 
                     class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transform transition-transform duration-500"
                     x-show="lightboxOpen"
                     x-transition:enter="transition ease-out duration-500 delay-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100" />
            </div>
        </div>
    </div>
    
    <!-- Branding & Partner Section -->
    <section class="py-4 px-6 bg-[#f7f1f0] border-t border-[#e8dedc]">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-stretch h-20">
                <!-- Royal Saly Card -->
                <a href="/hotel/royal-saly" class="relative overflow-hidden group border border-[#e8dedc] hover:shadow-lg transition-all md:col-span-1 rounded">
                    <img src="{{ asset('assets/img/royal.png') }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 brightness-75">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-2">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/img/logo.png') }}" class="w-5 h-5 object-contain invert">
                            <div>
                                <div class="text-[5px] text-white font-bold uppercase tracking-[0.2em] opacity-80 mb-0.5 leading-tight">Les Hôtels <br> Du Sénégal</div>
                            </div>
                        </div>
                        <div class="text-sm font-serif text-white mt-1">Le Royal Saly</div>
                    </div>
                </a>

                <!-- Pelican Card -->
                <a href="/hotel/pelican-du-saloum" class="relative overflow-hidden group border border-[#e8dedc] hover:shadow-lg transition-all md:col-span-2 rounded">
                    <img src="{{ asset('assets/img/pelican.png') }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 brightness-75">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-2">
                        <div class="flex items-center gap-2 mb-1">
                            <img src="{{ asset('assets/img/logo.png') }}" class="w-5 h-5 object-contain invert">
                            <div class="text-lg font-serif text-white drop-shadow-md">Le Pélican du Saloum</div>
                        </div>
                        <div class="text-[7px] text-white font-bold uppercase tracking-[0.3em] opacity-80">Toubacouta</div>
                    </div>
                </a>

                <!-- Teranguest / Partners -->
                <div class="bg-white/50 border border-[#e8dedc] p-2 flex flex-col justify-center items-center text-center md:col-span-1 rounded">
                    <div class="flex items-center gap-1.5 mb-1.5 text-[#a67c52]">
                        <span class="material-symbols-outlined text-sm">location_on</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest italic text-[#4a3a35]">Teranguest</span>
                    </div>
                    <div class="flex flex-wrap justify-center gap-2 items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-500 mb-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-2.5">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-2.5">
                    </div>
                    <div class="pt-1.5 border-t border-[#e8dedc]/50 w-full">
                        <p class="text-[6px] font-bold uppercase tracking-[0.2em] text-[#8c7a76] opacity-50">WIEFC . CREA 77227 . BRULAN</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-hotel-layout>
