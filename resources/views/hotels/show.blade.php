@php
    $hotels = [
        'royal-saly' => [
            'name' => 'Royal Saly',
            'location' => 'Saly Portudal',
            'image' => asset('assets/img/royal.png'),
            'description' => 'Resort balnéaire situé à Saly Portudal, offrant une expérience de vacances complète.',
            'chambres' => [
                ['name' => 'Chambre Standard', 'price' => '75 000 FCFA', 'image' => asset('assets/img/royal.png')],
                ['name' => 'Chambre Supérieure', 'price' => '110 000 FCFA', 'image' => asset('assets/img/hero.png')],
                ['name' => 'Suite', 'price' => '180 000 FCFA', 'image' => asset('assets/img/royal.png')],
            ],
            'services' => ['Piscine', 'Restaurant', 'Bar', 'Activités nautiques', 'Séminaires']
        ],
        'pelican-du-saloum' => [
            'name' => 'Pélican du Saloum',
            'location' => 'Sine-Saloum',
            'image' => asset('assets/img/pelican.png'),
            'description' => 'Eco-resort au cœur du Delta du Saloum.',
            'chambres' => [
                ['name' => 'Lodge Standard', 'price' => '60 000 FCFA', 'image' => asset('assets/img/pelican.png')],
                ['name' => 'Lodge Premium', 'price' => '95 000 FCFA', 'image' => asset('assets/img/pelican.png')],
            ],
            'services' => ['Excursions', 'Restaurant Bio', 'Observation oiseaux', 'Pirogue']
        ],
        'nema-kadior' => [
            'name' => 'Néma Kadior',
            'location' => 'Ziguinchor',
            'image' => asset('assets/img/nema.png'),
            'description' => 'Hôtel de charme au cœur de la Casamance.',
            'chambres' => [
                ['name' => 'Case Africaine', 'price' => '50 000 FCFA', 'image' => asset('assets/img/nema.png')],
                ['name' => 'Chambre Prestige', 'price' => '80 000 FCFA', 'image' => asset('assets/img/nema.png')],
            ],
            'services' => ['Jardin tropical', 'Piscine', 'Cuisine locale', 'Culture']
        ]
    ];
    $hotel = $hotels[$slug] ?? $hotels['royal-saly'];
@endphp

<x-hotel-layout>
    @section('title', $hotel['name'] . ' - Les Hôtels du Sénégal Group')

    <!-- Hero Slider Placeholder -->
    <section class="relative h-[70vh] flex items-end">
        <div class="absolute inset-0 z-0">
            <img src="{{ $hotel['image'] }}" alt="{{ $hotel['name'] }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-6 pb-20 text-white w-full">
            <div class="flex items-center space-x-2 text-accent-gold mb-4">
                <span class="text-sm font-bold uppercase tracking-widest">{{ $hotel['location'] }}</span>
                <span class="w-10 h-[1px] bg-accent-gold"></span>
                <span class="text-xs uppercase">Sénégal</span>
            </div>
            <h1 class="font-serif text-6xl md:text-8xl mb-6">{{ $hotel['name'] }}</h1>
            <p class="text-xl opacity-90 max-w-2xl">{{ $hotel['description'] }}</p>
        </div>
    </section>

    <!-- Description -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-16">
            <div class="md:w-2/3">
                <h2 class="font-serif text-4xl text-primary-blue mb-8">Un séjour inoubliable</h2>
                <div class="prose prose-lg text-gray-600">
                    <p class="mb-6">
                        Le {{ $hotel['name'] }} vous accueille dans un cadre d'exception où luxe et authenticité se
                        rencontrent. Chaque détail a été pensé pour votre confort et votre bien-être.
                    </p>
                    <p>
                        Que vous soyez à la recherche de détente sur la plage, de découvertes culturelles ou d'aventures
                        naturelles, notre établissement est le point de départ idéal pour explorer les richesses du
                        Sénégal.
                    </p>
                </div>

                <!-- Services Cards -->
                <div class="mt-16 grid grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($hotel['services'] as $service)
                        <div class="flex items-center space-x-3 p-4 bg-sand-light rounded-lg">
                            <svg class="h-6 w-6 text-primary-ochre" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="font-semibold text-primary-blue">{{ $service }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="md:w-1/3">
                <div class="glass p-8 rounded-2xl sticky top-32">
                    <h3 class="font-serif text-2xl text-primary-blue mb-6">Réserver maintenant</h3>
                    <form action="/reservations">
                        <input type="hidden" name="hotel" value="{{ $slug }}">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs uppercase font-bold text-gray-500 mb-2">Arrivée</label>
                                <input type="date" class="w-full border-gray-200 rounded-lg py-3 px-4">
                            </div>
                            <div>
                                <label class="block text-xs uppercase font-bold text-gray-500 mb-2">Départ</label>
                                <input type="date" class="w-full border-gray-200 rounded-lg py-3 px-4">
                            </div>
                            <div>
                                <label class="block text-xs uppercase font-bold text-gray-500 mb-2">Personnes</label>
                                <select class="w-full border-gray-200 rounded-lg py-3 px-4">
                                    <option>2 Adultes</option>
                                    <option>1 Adulte</option>
                                    <option>Famille</option>
                                </select>
                            </div>
                            <button class="w-full btn-premium py-4 mt-4">VÉRIFIER LA DISPONIBILITÉ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Chambres Section -->
    <section class="py-24 px-6 bg-sand-light">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-serif text-4xl text-primary-blue mb-16 section-title">Nos Chambres & Suites</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($hotel['chambres'] as $chambre)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg group hover:shadow-2xl transition-all duration-500">
                        <div class="h-64 overflow-hidden relative">
                            <img src="{{ $chambre['image'] }}" alt="{{ $chambre['name'] }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div
                                class="absolute top-4 right-4 bg-white/90 px-4 py-2 rounded-full font-bold text-primary-ochre shadow">
                                À partir de {{ $chambre['price'] }}
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="font-serif text-2xl mb-4">{{ $chambre['name'] }}</h3>
                            <p class="text-gray-500 text-sm mb-6 leading-relaxed">Confort, élégance et vue imprenable pour
                                un séjour de rêve.</p>
                            <ul class="space-y-2 mb-8 text-xs font-semibold text-gray-400 uppercase tracking-widest">
                                <li>✓ Vue Océan</li>
                                <li>✓ Climatisation</li>
                                <li>✓ Wi-Fi Gratuit</li>
                            </ul>
                            <a href="/reservations?hotel={{ $slug }}&room={{ Str::slug($chambre['name']) }}"
                                class="btn-premium w-full text-center">RÉSERVER CETTE CHAMBRE</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Galerie Section Placeholder -->
    <section class="py-24 px-6 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-serif text-4xl text-primary-blue mb-16 text-center">Galerie Photos</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-md">
                    <img src="{{ asset('assets/img/hero.png') }}" class="w-full h-full object-cover">
                </div>
                <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-md">
                    <img src="{{ asset('assets/img/pelican.png') }}" class="w-full h-full object-cover">
                </div>
                <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-md">
                    <img src="{{ asset('assets/img/nema.png') }}" class="w-full h-full object-cover">
                </div>
                <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-md">
                    <img src="{{ asset('assets/img/royal.png') }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Localisation Section -->
    <section class="py-24 px-6 bg-sand-light">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-16 items-center">
            <div class="md:w-1/2">
                <h2 class="font-serif text-4xl text-primary-blue mb-8">Localisation</h2>
                <p class="text-gray-600 mb-8">
                    Notre hôtel est idéalement situé pour vous offrir le calme et la beauté des paysages sénégalais tout
                    en restant accessible.
                </p>
                <div class="space-y-4">
                    <p class="flex items-center space-x-3 text-primary-blue font-semibold">
                        <span>📍</span>
                        <span>{{ $hotel['location'] }}, Sénégal</span>
                    </p>
                    <p class="flex items-center space-x-3 text-primary-blue font-semibold">
                        <span>📞</span>
                        <span>+221 33 000 00 00</span>
                    </p>
                </div>
            </div>
            <div class="md:w-1/2 rounded-2xl overflow-hidden shadow-2xl h-[400px] relative group">
                @php
                    $mapQuery = match ($slug) {
                        'pelican-du-saloum' => 'Boutique Hôtel le Pélican du Saloum, Toubacouta, Senegal',
                        'nema-kadior' => 'Hôtel Néma Kadior, Ziguinchor, Senegal',
                        default => 'Royal Saly, Saly, Senegal',
                    };
                @endphp
                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    class="grayscale opacity-60 group-hover:grayscale-0 transition-all duration-700"
                    src="https://maps.google.com/maps?q={{ urlencode($mapQuery) }}&t=&z=14&ie=UTF8&iwloc=&output=embed">
                </iframe>
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div
                        class="relative z-10 text-primary-blue text-center p-8 glass mx-6 border-none pointer-events-auto">
                        <span class="text-4xl block mb-2">🗺️</span>
                        <h4 class="font-serif text-xl border-none">Localisation</h4>
                        <p class="text-sm opacity-60">Retrouvez-nous au cœur du
                            {{ $slug == 'pelican-du-saloum' ? 'Sine Saloum' : ($slug == 'nema-kadior' ? 'Casamance' : 'Saly') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</x-hotel-layout>