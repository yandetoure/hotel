@php
    $restaurantData = [
        'hotel_name' => 'Le Royal Saly',
        'hero_image' => asset('assets/img/hero.png'),
        'food_image' => asset('assets/img/royal.png'),
        'welcome_images' => [
            'top' => asset('assets/img/nema.png'),
            'bottom1' => asset('assets/img/pelican.png'),
            'bottom2' => asset('assets/img/hero.png'),
        ],
        'venues' => [
            ['name' => 'Le Coco Bar', 'image' => asset('assets/img/pelican.png')],
            ['name' => 'La Terrasse Gourmande', 'image' => asset('assets/img/hero.png')],
        ],
        'events_image' => asset('assets/img/royal.png'),
        'event_venues' => [
            ['name' => 'Mariage', 'image' => asset('assets/img/pelican.png')],
            ['name' => 'Réceptions Privées', 'image' => asset('assets/img/hero.png')],
        ],
        'table_features' => [
            ['label' => 'Vue sur Mer', 'icon' => '🌊'],
            ['label' => 'Cuisine Raffinée', 'icon' => '🍽️'],
            ['label' => 'Cocktails & Vins', 'icon' => '🍷'],
            ['label' => 'Terrasse Couverte', 'icon' => '⛱️'],
        ],
        'footer_stats' => [
            ['label' => 'Navette Aétoport', 'icon' => '✈️'],
            ['label' => 'Petir Déteuner Buffet', 'icon' => '🥐'],
            ['label' => 'Activités Nautiques', 'icon' => '🏄'],
            ['label' => 'Spa & Bien-être', 'icon' => '💆'],
        ],
    ];
@endphp

<x-hotel-layout>
    @section('title', 'Restaurant & Bars - ' . $restaurantData['hotel_name'])

    <!-- Hero Section -->
    <section class="relative h-[70vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $restaurantData['hero_image'] }}" class="w-full h-full object-cover scale-105 brightness-75">
            <div class="absolute inset-0 bg-black/25"></div>
        </div>
        <div class="relative z-10 h-full flex flex-col justify-center items-start max-w-7xl mx-auto px-6 w-full">
            <h1 class="font-serif text-5xl md:text-7xl text-white mb-2 leading-tight drop-shadow-lg italic">Restaurant & Bars</h1>
            <p class="text-xl md:text-2xl text-white/90 font-light mb-10 drop-shadow-md italic">Saveurs raffinées au bord de l'océan</p>
            <a href="#reserver" class="px-12 py-4 bg-[#a67c52] text-white text-xs font-bold uppercase tracking-[0.3em] rounded border border-[#b08d57]/30 shadow-2xl hover:bg-[#8c6542] hover:scale-105 transition-all">
                Réserver
            </a>
        </div>
    </section>

    <!-- Welcome / Food Section -->
    <section class="py-24 px-6 bg-[#f7f1f0] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-start">

                <!-- Left: Text + Big Food Photo -->
                <div class="lg:w-[55%]">
                    <h2 class="font-serif text-4xl text-[#4a3a35] mb-8 leading-tight italic">Organisez votre Cuisine Gourmande</h2>
                    <p class="text-[#8c7a76] leading-relaxed mb-8 font-light">
                        Au {{ $restaurantData['hotel_name'] }}, dégustez une cuisine savoureuse sur nos terrasses en bord de mer. Nos chefs vous invitent à un voyage culinaire mêlant spécialités sénégalaises, saveurs d'ailleurs et produits frais dans une ambiance élégante et conviviale où la mer est toujours à portée de vue.
                    </p>
                    <!-- Decorative Leaf -->
                    <div class="relative w-full h-8 mb-6 pointer-events-none">
                        <svg class="absolute top-0 right-0 w-20 h-8 text-[#a67c52] opacity-50" viewBox="0 0 80 30" fill="currentColor">
                            <path d="M0 15 Q 20 0, 40 15 T 80 15" fill="transparent" stroke="currentColor" stroke-width="1"/>
                            <path d="M40 15 Q 50 5, 60 10 Q 65 5, 70 12 Q 60 8, 50 18 Q 45 22, 40 15" opacity="0.5"/>
                        </svg>
                    </div>
                    <!-- Big Food Image -->
                    <div class="aspect-[16/9] overflow-hidden rounded shadow-lg">
                        <img src="{{ $restaurantData['food_image'] }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Right: Venue Cards -->
                <div class="lg:w-[45%] flex flex-col gap-6">
                    <!-- Top big venue image -->
                    <img src="{{ $restaurantData['welcome_images']['top'] }}" class="w-full aspect-video object-cover rounded shadow-md">

                    <!-- Two smaller venue cards with names + button -->
                    <div class="grid grid-cols-2 gap-6">
                        @foreach($restaurantData['venues'] as $venue)
                            <div class="group">
                                <div class="aspect-[4/3] overflow-hidden rounded shadow-md mb-4">
                                    <img src="{{ $venue['image'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                </div>
                                <h3 class="font-serif text-lg text-[#4a3a35] mb-3 italic">{{ $venue['name'] }}</h3>
                                <a href="#" class="inline-block px-6 py-2 bg-[#a67c52] text-white text-[10px] font-bold uppercase tracking-widest rounded shadow hover:bg-[#8c6542] transition-all">
                                    Découvrir <span class="ml-1 opacity-70">›</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Private Events Section -->
    <section class="py-24 px-6 bg-[#f2e9e7] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.02] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-start mb-16">
                <!-- Left: Text -->
                <div class="lg:w-[55%]">
                    <h2 class="font-serif text-4xl text-[#4a3a35] mb-8 leading-tight italic">Un Cadre Idéal pour vos Événements Privés</h2>
                    <p class="text-[#8c7a76] leading-relaxed font-light">
                        Restez dans votre temps de la cuisine gourmande sur une sourmer Bar et envoyer à Ais iter tout en fransportes prùhines desins.
                    </p>
                </div>
                <!-- Right: Event venue image -->
                <div class="lg:w-[45%]">
                    <img src="{{ $restaurantData['events_image'] }}" class="w-full aspect-video object-cover rounded shadow-md">
                </div>
            </div>

            <!-- Event Type Cards -->
            <div class="flex flex-col lg:flex-row gap-8 items-start">
                <!-- Big left landscape photo -->
                <div class="lg:w-[50%]">
                    <img src="{{ $restaurantData['welcome_images']['bottom1'] }}" class="w-full aspect-[4/3] object-cover rounded shadow-md">
                </div>
                <!-- Right: Two venue cards -->
                <div class="lg:w-[50%] grid grid-cols-2 gap-6">
                    @foreach($restaurantData['event_venues'] as $ev)
                        <div class="group">
                            <div class="aspect-[4/3] overflow-hidden rounded shadow-md mb-4">
                                <img src="{{ $ev['image'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <h3 class="font-serif text-lg text-[#a67c52] mb-3 italic">{{ $ev['name'] }}</h3>
                            <a href="#" class="inline-block w-full text-center py-2.5 bg-[#a67c52] text-white text-[10px] font-bold uppercase tracking-widest rounded shadow hover:bg-[#8c6542] transition-all">
                                Demande de Devis
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Table Features Section -->
    <section id="reserver" class="py-24 px-6 bg-[#f7f1f0] relative border-t border-[#e8dedc]">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-[#e0d0cc] to-transparent"></div>
        <div class="max-w-7xl mx-auto">
            <h2 class="font-serif text-4xl text-center text-[#4a3a35] mb-16 italic">Réservez Votre Table</h2>
            
            <!-- Ornamental Separator -->
            <div class="flex items-center justify-center mb-16 gap-4 opacity-40">
                <div class="h-px flex-1 bg-[#a67c52]"></div>
                <span class="text-[#a67c52] text-xl">✦</span>
                <div class="h-px flex-1 bg-[#a67c52]"></div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                @foreach($restaurantData['table_features'] as $index => $feature)
                    <div class="flex-1 flex flex-col items-center text-center px-8 {{ !$loop->last ? 'md:border-r border-[#e8dedc]' : '' }} group">
                        <div class="text-4xl mb-6 group-hover:scale-110 transition-transform duration-500 opacity-60">{{ $feature['icon'] }}</div>
                        <span class="text-[11px] font-bold uppercase tracking-widest text-[#4a3a35] max-w-[130px] leading-relaxed italic">{{ $feature['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Branding Footer Bar -->
    <section class="py-16 px-6 bg-[#f7f1f0] relative overflow-hidden border-t border-[#e8dedc]">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-stretch bg-white/40 backdrop-blur-sm border border-[#e8dedc] rounded-lg overflow-hidden shadow-sm">
                
                <!-- Left: Hotel Branding with BG -->
                <div class="lg:w-[25%] relative min-h-[160px] flex items-center p-10 overflow-hidden group">
                    <img src="{{ $restaurantData['hero_image'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 brightness-[0.7]">
                    <div class="absolute inset-0 bg-black/20"></div>
                    <div class="relative z-10 flex items-center gap-4">
                        <img src="{{ asset('assets/img/logo.png') }}" class="w-12 h-12 object-contain invert">
                        <div class="text-white">
                            <div class="text-[8px] font-bold uppercase tracking-[0.4em] mb-1 opacity-70">Les Hôtels du Sénégal</div>
                            <div class="text-2xl font-serif leading-tight drop-shadow-lg italic">{{ $restaurantData['hotel_name'] }}</div>
                        </div>
                    </div>
                </div>

                <!-- Middle: Stats Grid -->
                <div class="lg:flex-1 grid grid-cols-2 md:grid-cols-4 items-center py-8 lg:py-0">
                    @foreach($restaurantData['footer_stats'] as $index => $stat)
                        <div class="flex flex-col items-center text-center px-4 {{ !$loop->last ? 'md:border-r border-[#e8dedc]' : '' }} group cursor-pointer">
                            <div class="text-3xl mb-3 transition-transform duration-500 group-hover:scale-110 opacity-60">{{ $stat['icon'] }}</div>
                            <div class="text-[9px] font-bold uppercase tracking-widest text-[#8c7a76] leading-[1.4] italic">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <!-- Right: Contact -->
                <div class="lg:w-[28%] p-8 flex flex-col justify-center border-l border-[#e8dedc] bg-[#fffbf9]/50">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="material-symbols-outlined text-[#a67c52] text-xl">location_on</span>
                        <span class="text-sm font-bold uppercase tracking-[0.2em] text-[#4a3a35] italic">Teranguest</span>
                    </div>
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center gap-3 text-[13px] text-[#4a3a35]">
                            <span class="material-symbols-outlined text-[#a67c52] text-sm">call</span>
                            <span class="font-light">+221 78 600 77 88</span>
                        </div>
                        <div class="flex items-center gap-3 text-[13px] text-[#4a3a35]">
                            <span class="material-symbols-outlined text-[#a67c52] text-sm">mail</span>
                            <span class="font-light truncate">info@leshotelsdusenegal.com</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 opacity-70 border-t border-[#e8dedc] pt-5">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-5">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-3">
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center text-[9px] text-[#8c7a76] uppercase tracking-[0.3em] opacity-40 italic">
                © {{ date('Y') }}. Les Hôtels du Sénégal . Tous droits réservés. Designed with 🧡 by LabelDigital
            </div>
        </div>
    </section>

</x-hotel-layout>
