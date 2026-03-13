@php
    $hotels = [
        'royal-saly' => [
            'name' => 'Le Royal Saly',
            'tagline' => 'Votre Oasis de Luxe à Saly',
            'location' => 'Saly Portudal',
            'city' => 'Saly',
            'hero_image' => asset('assets/img/royal.png'),
            'welcome_images' => [
                'main' => asset('assets/img/hero.png'),
                'small1' => asset('assets/img/royal.png'),
                'small2' => asset('assets/img/pelican.png'),
            ],
            'description' => "Découvrez un hôtel balnéaire de charme à Saly, alliant luxe et détente au bord de l'océan. Le Royal Saly vous propose un cadre idyllique avec ses chambres confortables, ses restaurants et bars en bord de mer, plusieurs piscines, son spa de qualité et un large choix d'activités. Profitez de vacances inoubliables en pleine nature sénégalaise.",
            'features' => [
                '150 chambres confortables',
                'Plage privée et 3 piscines',
                'Restaurants & Bars en bord de mer',
                'Activités pour toute la famille'
            ],
            'rooms' => [
                [
                    'name' => 'Chambre Standard',
                    'description' => 'Une chambre confortable avec terrasse privée, idéale pour se détendre après une journée au soleil.',
                    'image' => asset('assets/img/royal.png')
                ],
                [
                    'name' => 'Chambre Supérieure',
                    'description' => 'Une chambre spacieuse avec balcon privatif offrant une vue superbe sur le jardin tropical ou la mer.',
                    'image' => asset('assets/img/hero.png')
                ],
                [
                    'name' => 'Suite Junior',
                    'description' => 'Une suite élégante et spacieuse incluant un salon, idéale pour un séjour luxueux et romantique.',
                    'image' => asset('assets/img/royal.png')
                ],
            ],
            'services' => [
                ['name' => 'Plage Privée', 'image' => asset('assets/img/pelican.png')],
                ['name' => 'Spa & Massages', 'image' => asset('assets/img/nema.png')],
                ['name' => 'Sport & Excursions', 'image' => asset('assets/img/hero.png')],
                ['name' => 'Restaurant Gourmand', 'image' => asset('assets/img/royal.png')],
            ],
            'stats' => [
                ['label' => 'Navette Aéroport', 'icon' => '🚐'],
                ['label' => 'Petit Déjeuner Buffet', 'icon' => '🥐'],
                ['label' => 'Activités Nautiques', 'icon' => '⛵'],
                ['label' => 'Spa & Bien-être', 'icon' => '🧘'],
            ]
        ],
        'pelican-du-saloum' => [
            'name' => 'Le Pélican du Saloum',
            'tagline' => 'Évasion Nature au Delta du Saloum',
            'location' => 'Sine-Saloum',
            'city' => 'Toubacouta',
            'hero_image' => asset('assets/img/pelican.png'),
            'welcome_images' => [
                'main' => asset('assets/img/pelican.png'),
                'small1' => asset('assets/img/hero.png'),
                'small2' => asset('assets/img/royal.png'),
            ],
            'description' => "Le Pélican du Saloum vous invite à une immersion totale dans la nature sauvage du Delta du Saloum. Profitez d'un confort authentique au bord de l'eau, entre mangrove et pirogues.",
            'features' => [
                'Loges éco-responsables',
                'Piscine à débordement',
                'Cuisine bio et locale',
                'Excursions en pirogue'
            ],
            'rooms' => [
                ['name' => 'Lodge Standard', 'description' => 'Charme et simplicité au cœur de la nature.', 'image' => asset('assets/img/pelican.png')],
                ['name' => 'Lodge Premium', 'description' => 'Luxe discret avec vue imprenable sur le delta.', 'image' => asset('assets/img/pelican.png')],
            ],
            'services' => [
                ['name' => 'Pirogue', 'image' => asset('assets/img/hero.png')],
                ['name' => 'Observation', 'image' => asset('assets/img/pelican.png')],
            ],
            'stats' => [
                ['label' => 'Eco-Tourisme', 'icon' => '🌿'],
                ['label' => 'Restaurant Bio', 'icon' => '🥗'],
            ]
        ],
        'nema-kadior' => [
            'name' => 'Le Nema Kadior',
            'tagline' => 'L\'âme de la Casamance',
            'location' => 'Ziguinchor',
            'city' => 'Casamance',
            'hero_image' => asset('assets/img/nema.png'),
            'welcome_images' => [
                'main' => asset('assets/img/nema.png'),
                'small1' => asset('assets/img/hero.png'),
                'small2' => asset('assets/img/royal.png'),
            ],
            'description' => "Plongez dans l'authenticité de la Casamance au Néma Kadior. Un hôtel de charme situé dans un écrin de verdure au bord du fleuve.",
            'features' => [
                'Jardin tropical luxuriant',
                'Piscine au bord du fleuve',
                'Gastronomie casamançaise',
                'Atmosphère paisible'
            ],
            'rooms' => [
                ['name' => 'Case Africaine', 'description' => 'Tradition et confort pour une expérience unique.', 'image' => asset('assets/img/nema.png')],
                ['name' => 'Chambre Prestige', 'description' => 'Élégance et modernité avec vue jardin.', 'image' => asset('assets/img/nema.png')],
            ],
            'services' => [
                ['name' => 'Piscine', 'image' => asset('assets/img/hero.png')],
                ['name' => 'Culture', 'image' => asset('assets/img/nema.png')],
            ],
            'stats' => [
                ['label' => 'Jardin Tropical', 'icon' => '🌴'],
                ['label' => 'Cuisine Locale', 'icon' => '🍲'],
            ]
        ]
    ];
    $hotel = $hotels[$slug] ?? $hotels['royal-saly'];
@endphp

<x-hotel-layout>
    @section('title', $hotel['name'] . ' - Les Hôtels du Sénégal Group')

    <!-- Local Navigation Header -->
    <nav class="sticky top-0 z-[100] bg-white border-b border-[#e8dedc] py-4 px-6 shadow-sm">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img src="{{ asset('assets/img/logo.png') }}" class="w-10 h-10 object-contain">
                <div class="font-serif text-xl tracking-wide text-[#4a3a35]">{{ $hotel['name'] }}</div>
            </div>
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors relative after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-full after:h-px after:bg-[#a67c52] after:opacity-0 hover:after:opacity-100 italic">Accueil</a>
                <a href="#chambres" class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Chambres & Suites</a>
                <a href="#services" class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Restaurant & Bars</a>
                <a href="#" class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Activités</a>
                <a href="#" class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Événements</a>
                <a href="{{ route('galerie') }}" class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Galerie</a>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-[9px] font-bold text-[#b08d57] uppercase tracking-widest border-r border-[#e8dedc] pr-4 flex items-center gap-1">
                    FR <span class="material-symbols-outlined text-[12px]">expand_more</span>
                </div>
                <button class="md:hidden">
                    <span class="material-symbols-outlined text-[#4a3a35]">menu</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-[85vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $hotel['hero_image'] }}" class="w-full h-full object-cover scale-105 animate-slow-zoom brightness-90">
            <div class="absolute inset-0 bg-black/20"></div>
        </div>
        <div class="relative z-10 h-full flex flex-col justify-center items-start max-w-7xl mx-auto px-6">
            <h1 class="font-serif text-5xl md:text-7xl text-white mb-2 leading-tight drop-shadow-lg">{{ $hotel['name'] }}</h1>
            <p class="text-xl md:text-3xl text-white/90 font-light mb-10 drop-shadow-md">{{ $hotel['tagline'] }}</p>
            <a href="{{ route('booking.form') }}?hotel={{ $slug }}" class="px-12 py-4 bg-[#a67c52] text-white text-xs font-bold uppercase tracking-[0.3em] rounded-md shadow-2xl hover:bg-[#8c6542] hover:scale-105 transition-all">
                Réserver
            </a>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="py-24 px-6 bg-[#f7f1f0] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-stretch">
                <!-- Text Area -->
                <div class="lg:w-[40%] flex flex-col justify-center">
                    <h2 class="font-serif text-4xl text-[#4a3a35] mb-8">Bienvenue au {{ $hotel['city'] }}</h2>
                    <p class="text-[#8c7a76] leading-relaxed mb-6 font-light">
                        {{ $hotel['description'] }}
                    </p>
                    <div class="relative w-full h-12">
                        <svg class="absolute bottom-0 right-0 w-24 h-12 text-[#a67c52] opacity-50" viewBox="0 0 100 40">
                             <path d="M10 20 Q 30 5, 50 20 T 90 20" fill="transparent" stroke="currentColor" stroke-width="0.5" />
                             <path d="M5 25 Q 25 10, 45 25 T 85 25" fill="transparent" stroke="currentColor" stroke-width="0.5" />
                        </svg>
                    </div>
                </div>

                <!-- Image Collage — height constrained to match text column -->
                <div class="lg:w-[30%] flex flex-col gap-3 self-stretch max-h-[260px]">
                    <img src="{{ $hotel['welcome_images']['main'] }}" class="w-full h-32 object-cover rounded-md shadow-lg border-2 border-white/50">
                    <div class="grid grid-cols-2 gap-3">
                        <img src="{{ $hotel['welcome_images']['small1'] }}" class="w-full h-16 object-cover rounded-md shadow-md">
                        <img src="{{ $hotel['welcome_images']['small2'] }}" class="w-full h-16 object-cover rounded-md shadow-md">
                    </div>
                </div>

                <!-- Features List -->
                <div class="lg:w-[30%] space-y-6 flex flex-col justify-center">
                    @foreach($hotel['features'] as $feature)
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-[1px] bg-[#a67c52] group-hover:w-16 transition-all duration-500"></div>
                            <span class="text-[#4a3a35] font-light italic tracking-wide group-hover:translate-x-2 transition-all duration-500">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <!-- Rooms Section -->
    <section id="chambres" class="py-24 px-6 bg-[#f2e9e7]">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-serif text-4xl text-center text-[#4a3a35] mb-16">Nos Chambres & Suites</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($hotel['rooms'] as $room)
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-[#e8dedc] group">
                        <div class="aspect-[16/10] overflow-hidden">
                            <img src="{{ $room['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="p-8 text-center bg-[#fffbf9]">
                            <h3 class="font-serif text-2xl text-[#4a3a35] mb-4">{{ $room['name'] }}</h3>
                            <p class="text-[#8c7a76] text-sm leading-relaxed mb-6 font-light">
                                {{ $room['description'] }}
                            </p>
                            <a href="{{ route('booking.form') }}?hotel={{ $slug }}&room={{ Str::slug($room['name']) }}" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[10px] font-bold uppercase tracking-widest rounded shadow-md hover:bg-[#8c6542] transition-all">
                                Découvrir <span class="ml-1 opacity-70">›</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services & Activities Grid -->
    <section id="services" class="py-24 px-6 bg-[#f7f1f0]">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-serif text-4xl text-center text-[#4a3a35] mb-12">Services et Activités</h2>
            <div class="w-24 h-px bg-[#a67c52] mx-auto mb-16 opacity-50"></div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($hotel['services'] as $service)
                    <div class="relative aspect-square rounded-xl overflow-hidden group shadow-lg">
                        <img src="{{ $service['image'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all duration-500"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-white/20 backdrop-blur-md border-t border-white/30 text-center">
                            <span class="text-sm font-serif text-white tracking-widest drop-shadow-md">{{ $service['name'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Horizontal Branding Footer -->
    <section class="py-16 px-6 bg-[#f7f1f0] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-stretch bg-white/40 backdrop-blur-sm border border-[#e8dedc] rounded-lg overflow-hidden shadow-sm">
                
                <!-- Left: Branding with BG -->
                <div class="lg:w-1/3 relative min-h-[160px] flex items-center p-10 overflow-hidden group">
                    <img src="{{ $hotel['hero_image'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 brightness-[0.7]">
                    <div class="absolute inset-0 bg-black/20"></div>
                    <div class="relative z-10 flex items-center gap-5">
                        <div class="w-16 h-16 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center border border-white/20">
                            <img src="{{ asset('assets/img/logo.png') }}" class="w-10 h-10 object-contain invert">
                        </div>
                        <div class="text-white">
                            <div class="text-[8px] font-bold uppercase tracking-[0.5em] mb-1 opacity-70">Les Hôtels du Sénégal</div>
                            <div class="text-3xl font-serif leading-tight drop-shadow-lg">{{ $hotel['name'] }}</div>
                        </div>
                    </div>
                </div>

                <!-- Middle: Assets/Services -->
                <div class="lg:flex-1 grid grid-cols-2 md:grid-cols-4 items-center py-8 lg:py-0">
                    @foreach($hotel['stats'] as $index => $stat)
                        <div class="flex flex-col items-center text-center px-4 {{ !$loop->last ? 'md:border-r border-[#e8dedc]' : '' }} group cursor-pointer">
                            <div class="text-3xl mb-3 transition-transform duration-500 group-hover:scale-110 opacity-60">{{ $stat['icon'] }}</div>
                            <div class="text-[9px] font-bold uppercase tracking-widest text-[#8c7a76] leading-[1.4]">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <!-- Right: Contact & Partners -->
                <div class="lg:w-[30%] p-8 flex flex-col justify-center border-l border-[#e8dedc] bg-[#fffbf9]/50">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="material-symbols-outlined text-[#a67c52] text-xl">location_on</span>
                        <span class="text-sm font-bold uppercase tracking-[0.2em] text-[#4a3a35]">Teranguest</span>
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

            <div class="mt-12 text-center text-[9px] text-[#8c7a76] uppercase tracking-[0.3em] opacity-40">
                © {{ date('Y') }}. Les Hôtels du Sénégal . Tous droits réservés. Designed with 🧡 by LabelDigital
            </div>
        </div>
    </section>

</x-hotel-layout>