<x-hotel-layout>
    @section('title', 'Accueil - Les Hôtels du Sénégal Group')

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/img/hero.png') }}" alt="Luxurious Senegal Resort"
                class="w-full h-full object-cover scale-105 animate-slow-zoom">
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-transparent h-1/3"></div>
        </div>

        <div class="relative z-10 text-center text-white px-6 max-w-4xl">
            <h1 class="font-serif text-5xl md:text-7xl mb-6 leading-tight drop-shadow-lg">
                Découvrez les Hôtels du <span class="text-accent-gold italic">Sénégal Group</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 font-light tracking-wide drop-shadow-md">
                Signature : Trois destinations d’exception au Sénégal
            </p>
        </div>

        <!-- Booking Engine Overlay -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-full max-w-5xl px-6 z-20">
            <div class="glass p-8 rounded-2xl shadow-2xl">
                <form action="/reservations" class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                    <div class="space-y-2">
                        <label
                            class="block text-xs uppercase tracking-widest font-bold text-primary-blue">Destination</label>
                        <select name="hotel"
                            class="w-full bg-white/50 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary-ochre transition-all">
                            <option value="">Choisir un hôtel</option>
                            <option value="pelican">Pélican du Saloum</option>
                            <option value="nema">Néma Kadior</option>
                            <option value="royal">Royal Saly</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase tracking-widest font-bold text-primary-blue">Arrivée -
                            Départ</label>
                        <input type="text" placeholder="Dates"
                            class="w-full bg-white/50 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary-ochre transition-all">
                    </div>
                    <div class="space-y-2">
                        <label
                            class="block text-xs uppercase tracking-widest font-bold text-primary-blue">Personnes</label>
                        <select
                            class="w-full bg-white/50 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary-ochre transition-all">
                            <option>1 Adulte</option>
                            <option selected>2 Adultes</option>
                            <option>3 Adultes</option>
                            <option>Famille</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="w-full btn-premium py-4">RECHERCHER</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="py-24 px-6 bg-sand-light" id="destinations">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div>
                    <h4 class="text-primary-ochre font-bold uppercase tracking-widest text-sm mb-2">Nos Destinations
                    </h4>
                    <h2 class="font-serif text-4xl md:text-5xl text-primary-blue section-title">Explorez le Sénégal</h2>
                </div>
                <a href="/hotels"
                    class="text-primary-ochre font-bold hover:text-accent-gold transition-colors underline decoration-2 underline-offset-8">Voir
                    tout</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Pelican -->
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl aspect-[4/5] mb-6 shadow-lg">
                        <img src="{{ asset('assets/img/pelican.png') }}" alt="Pélican du Saloum"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-60 transition-opacity group-hover:opacity-80">
                        </div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="font-serif text-2xl mb-1">Pélican du Saloum</h3>
                            <p class="text-sm opacity-90">Nature & évasion</p>
                        </div>
                    </div>
                    <a href="/hotel/pelican-du-saloum" class="btn-premium w-full text-center">Découvrir</a>
                </div>

                <!-- Nema Kadior -->
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl aspect-[4/5] mb-6 shadow-lg">
                        <img src="{{ asset('assets/img/nema.png') }}" alt="Néma Kadior"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-60 transition-opacity group-hover:opacity-80">
                        </div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="font-serif text-2xl mb-1">Néma Kadior</h3>
                            <p class="text-sm opacity-90">Authenticité de la Casamance</p>
                        </div>
                    </div>
                    <a href="/hotel/nema-kadior" class="btn-premium w-full text-center">Découvrir</a>
                </div>

                <!-- Royal Saly -->
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl aspect-[4/5] mb-6 shadow-lg">
                        <img src="{{ asset('assets/img/royal.png') }}" alt="Royal Saly"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-60 transition-opacity group-hover:opacity-80">
                        </div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="font-serif text-2xl mb-1">Royal Saly</h3>
                            <p class="text-sm opacity-90">Plage & resort</p>
                        </div>
                    </div>
                    <a href="/hotel/royal-saly" class="btn-premium w-full text-center">Découvrir</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 px-6 bg-primary-blue text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 w-64 h-64 bg-accent-gold/5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary-ochre/5 rounded-full -ml-48 -mb-48 blur-3xl"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-16">
                <h4 class="text-accent-gold font-bold uppercase tracking-widest text-sm mb-2">Art de vivre</h4>
                <h2 class="font-serif text-4xl md:text-5xl mb-6">Nos Services d'Exception</h2>
                <div class="w-20 h-1 bg-accent-gold mx-auto"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                @php
                    $services = [
                        ['icon' => '🌊', 'label' => 'Piscines'],
                        ['icon' => '🍽️', 'label' => 'Restaurants'],
                        ['icon' => '🛶', 'label' => 'Excursions'],
                        ['icon' => '🤝', 'label' => 'Séminaires'],
                        ['icon' => '📶', 'label' => 'Wi-Fi'],
                        ['icon' => '🌴', 'label' => 'Activités'],
                    ];
                @endphp
                @foreach($services as $service)
                    <div
                        class="flex flex-col items-center p-6 glass border-white/5 rounded-xl hover:bg-white/10 transition-all cursor-default">
                        <span class="text-4xl mb-4">{{ $service['icon'] }}</span>
                        <span class="font-semibold uppercase tracking-tighter text-xs">{{ $service['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Offres Section -->
    <section class="py-24 px-6 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-16 items-center">
            <div class="lg:w-1/2">
                <h4 class="text-primary-ochre font-bold uppercase tracking-widest text-sm mb-2">Exclusivités</h4>
                <h2 class="font-serif text-4xl md:text-5xl text-primary-blue mb-8">Offres Spéciales</h2>

                <div class="space-y-6 mb-10">
                    <div
                        class="flex items-start space-x-4 p-4 rounded-xl hover:bg-sand-light transition-colors border-l-4 border-accent-gold">
                        <div class="flex-shrink-0 text-2xl">🥂</div>
                        <div>
                            <h4 class="font-bold text-primary-blue text-lg">Weekend détente</h4>
                            <p class="text-gray-500 text-sm">Profitez d'une évasion relaxante avec spa et dîner
                                gastronomique.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-sand-light transition-colors">
                        <div class="flex-shrink-0 text-2xl">👨‍👩-👧‍👦</div>
                        <div>
                            <h4 class="font-bold text-primary-blue text-lg">Séjour famille</h4>
                            <p class="text-gray-500 text-sm">Des activités pour tous les âges et des chambres
                                communicantes.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-sand-light transition-colors">
                        <div class="flex-shrink-0 text-2xl">💍</div>
                        <div>
                            <h4 class="font-bold text-primary-blue text-lg">Lune de miel</h4>
                            <p class="text-gray-500 text-sm">Un cadre romantique inoubliable pour célébrer votre union.
                            </p>
                        </div>
                    </div>
                </div>

                <a href="#" class="btn-premium">VOIR TOUTES LES OFFRES</a>
            </div>

            <div class="lg:w-1/2 relative">
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('assets/img/hero.png') }}" alt="Special Offers"
                        class="w-full grayscale-[0.3] hover:grayscale-0 transition-all duration-700">
                </div>
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-accent-gold rounded-2xl -z-0 opacity-20"></div>
                <div class="absolute -top-6 -left-6 w-48 h-48 bg-primary-blue rounded-2xl -z-0 opacity-10"></div>
            </div>
        </div>
    </section>

    <!-- Avis Clients -->
    <section class="py-24 px-6 bg-sand-light overflow-hidden">
        <div class="max-w-4xl mx-auto text-center">
            <h4 class="text-primary-ochre font-bold uppercase tracking-widest text-sm mb-12">Ce que nos clients disent
            </h4>
            <div class="mb-8">
                <span class="text-accent-gold text-4xl">★★★★★</span>
            </div>
            <blockquote class="font-serif text-3xl md:text-4xl text-primary-blue italic mb-10 leading-relaxed">
                "Une expérience absolument magnifique au Sénégal. Le service est impeccable, les paysages sont à couper
                le souffle et l'authenticité est au rendez-vous. Nous reviendrons sans hésiter."
            </blockquote>
            <cite class="not-italic font-bold text-primary-blue uppercase tracking-widest text-sm">— Jean & Marie,
                Voyageurs Passionnés</cite>
        </div>
    </section>

    <!-- Call to action -->
    <section class="py-24 px-6 bg-primary-ochre relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-black/20"></div>
        </div>
        <div class="max-w-4xl mx-auto text-center relative z-10 text-white">
            <h2 class="font-serif text-4xl md:text-6xl mb-10 leading-tight">Prêt pour votre prochaine aventure ?</h2>
            <p class="text-xl mb-12 opacity-90">Réservez votre séjour dès maintenant et vivez une expérience
                d'exception.</p>
            <a href="/reservations"
                class="inline-block bg-white text-primary-ochre px-12 py-5 rounded-lg font-bold text-lg hover:bg-accent-gold hover:text-white transition-all shadow-xl hover:-translate-y-1">
                RÉSERVER MAINTENANT
            </a>
        </div>
    </section>

</x-hotel-layout>