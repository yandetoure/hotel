@php
    $rooms = [
        [
            'hotel' => 'royal-saly',
            'hotel_name' => 'Le Royal Saly',
            'name' => 'Chambre Standard',
            'description' => 'Une chambre confortable avec terrasse privée, idéale pour se détendre après une journée au soleil.',
            'image' => asset('assets/img/royal.png'),
            'price' => 'À partir de 65 000 FCFA'
        ],
        [
            'hotel' => 'royal-saly',
            'hotel_name' => 'Le Royal Saly',
            'name' => 'Chambre Supérieure',
            'description' => 'Une chambre spacieuse avec balcon privatif offrant une vue superbe sur le jardin tropical ou la mer.',
            'image' => asset('assets/img/hero.png'),
            'price' => 'À partir de 85 000 FCFA'
        ],
        [
            'hotel' => 'royal-saly',
            'hotel_name' => 'Le Royal Saly',
            'name' => 'Suite Junior',
            'description' => 'Une suite élégante et spacieuse incluant un salon, idéale pour un séjour luxueux et romantique.',
            'image' => asset('assets/img/royal.png'),
            'price' => 'À partir de 120 000 FCFA'
        ],
        [
            'hotel' => 'pelican-du-saloum',
            'hotel_name' => 'Le Pélican du Saloum',
            'name' => 'Lodge Standard',
            'description' => 'Charme et simplicité au cœur de la nature, parfait pour une évasion tranquille dans le delta.',
            'image' => asset('assets/img/pelican.png'),
            'price' => 'À partir de 55 000 FCFA'
        ],
        [
            'hotel' => 'pelican-du-saloum',
            'hotel_name' => 'Le Pélican du Saloum',
            'name' => 'Lodge Premium',
            'description' => 'Luxe discret avec vue imprenable sur le fleuve, alliant confort moderne et architecture locale.',
            'image' => asset('assets/img/pelican.png'),
            'price' => 'À partir de 75 000 FCFA'
        ],
        [
            'hotel' => 'nema-kadior',
            'hotel_name' => 'Le Néma Kadior',
            'name' => 'Case Africaine',
            'description' => 'Tradition et confort pour une expérience unique et immersive au cœur de la Casamance.',
            'image' => asset('assets/img/nema.png'),
            'price' => 'À partir de 45 000 FCFA'
        ],
        [
            'hotel' => 'nema-kadior',
            'hotel_name' => 'Le Néma Kadior',
            'name' => 'Chambre Prestige',
            'description' => 'Élégance et modernité avec vue plongeante sur notre magnifique jardin tropical luxuriant.',
            'image' => asset('assets/img/nema.png'),
            'price' => 'À partir de 65 000 FCFA'
        ],
    ];
@endphp

<x-hotel-layout>
    @section('title', 'Chambres & Suites - Les Hôtels du Sénégal Group')

    <!-- Hero Section -->
    <section class="relative h-[65vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/img/hero.png') }}" class="w-full h-full object-cover scale-105 animate-slow-zoom brightness-90">
            <div class="absolute inset-0 bg-black/30"></div>
        </div>
        <div class="relative z-10 h-full flex flex-col justify-center items-start max-w-7xl mx-auto px-6">
            <h1 class="font-serif text-5xl md:text-7xl text-white mb-2 leading-tight drop-shadow-lg">Chambres & Suites</h1>
            <p class="text-xl md:text-2xl text-white/90 font-light mb-10 drop-shadow-md italic">L'élégance et le confort dans nos trois destinations.</p>
        </div>
    </section>

    <!-- Rooms and Filters Section (Alpine.js) -->
    <section x-data="{ filter: 'all' }" class="py-24 px-6 bg-[#f7f1f0] relative">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            
            <!-- Filters -->
            <div class="flex flex-wrap justify-center gap-4 mb-16">
                <button @click="filter = 'all'" 
                        :class="filter === 'all' ? 'bg-[#a67c52] text-white border-[#a67c52]' : 'bg-transparent text-[#4a3a35] border-[#e8dedc] hover:border-[#a67c52]'"
                        class="px-8 py-3 text-[11px] font-bold uppercase tracking-widest border rounded transition-all italic">
                    Tous nos hôtels
                </button>
                <button @click="filter = 'royal-saly'" 
                        :class="filter === 'royal-saly' ? 'bg-[#a67c52] text-white border-[#a67c52]' : 'bg-transparent text-[#4a3a35] border-[#e8dedc] hover:border-[#a67c52]'"
                        class="px-8 py-3 text-[11px] font-bold uppercase tracking-widest border rounded transition-all italic">
                    Le Royal Saly
                </button>
                <button @click="filter = 'pelican-du-saloum'" 
                        :class="filter === 'pelican-du-saloum' ? 'bg-[#a67c52] text-white border-[#a67c52]' : 'bg-transparent text-[#4a3a35] border-[#e8dedc] hover:border-[#a67c52]'"
                        class="px-8 py-3 text-[11px] font-bold uppercase tracking-widest border rounded transition-all italic">
                    Le Pélican du Saloum
                </button>
                <button @click="filter = 'nema-kadior'" 
                        :class="filter === 'nema-kadior' ? 'bg-[#a67c52] text-white border-[#a67c52]' : 'bg-transparent text-[#4a3a35] border-[#e8dedc] hover:border-[#a67c52]'"
                        class="px-8 py-3 text-[11px] font-bold uppercase tracking-widest border rounded transition-all italic">
                    Le Néma Kadior
                </button>
            </div>

            <!-- Rooms Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($rooms as $room)
                    <div x-show="filter === 'all' || filter === '{{ $room['hotel'] }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="bg-white/70 backdrop-blur-sm rounded-xl overflow-hidden shadow-sm hover:shadow-lg border border-[#e8dedc] transition-all group flex flex-col">
                        
                        <div class="aspect-[4/3] overflow-hidden relative">
                            <img src="{{ $room['image'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <!-- Hotel Label Badge -->
                            <div class="absolute top-4 right-4 bg-black/60 backdrop-blur-md px-3 py-1.5 rounded border border-white/20">
                                <span class="text-[9px] font-bold uppercase tracking-widest text-[#e8dedc]">{{ $room['hotel_name'] }}</span>
                            </div>
                        </div>
                        
                        <div class="p-8 flex flex-col flex-grow text-center">
                            <div class="text-[#a67c52] text-xl opacity-40 mb-2">❧</div>
                            <h3 class="font-serif text-2xl text-[#4a3a35] mb-4">{{ $room['name'] }}</h3>
                            <p class="text-[#8c7a76] text-sm leading-relaxed mb-6 flex-grow">{{ $room['description'] }}</p>
                            
                            <div class="mt-auto pt-6 border-t border-[#e8dedc]">
                                <a href="{{ route('booking.form') }}?room={{ urlencode($room['name']) }}&hotel={{ $room['hotel'] }}" 
                                   class="block px-10 py-3 bg-transparent border border-[#a67c52] text-[#a67c52] text-[10px] font-bold uppercase tracking-widest rounded hover:bg-[#a67c52] hover:text-white transition-all w-full">
                                    Réserver
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Branding & Partner Section -->
    <section class="py-12 px-6 bg-[#f7f1f0] border-t border-[#e8dedc]">
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