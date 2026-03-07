<x-hotel-layout>
    @section('title', 'Nos Hôtels - Les Hôtels du Sénégal Group')

    <!-- Header Section -->
    <section class="pt-40 pb-20 px-6 bg-primary-blue text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <h1 class="font-serif text-5xl md:text-6xl mb-6">Nos Hôtels</h1>
            <p class="text-xl opacity-80 max-w-2xl">
                Découvrez nos trois établissements uniques, conçus pour vous offrir le meilleur de l'accueil sénégalais
                dans des cadres idylliques.
            </p>
        </div>
        <div class="absolute top-0 right-0 w-1/3 h-full bg-accent-gold/10 -skew-x-12 transform translate-x-20"></div>
    </section>

    <!-- Hotel List -->
    <section class="py-24 px-6">
        <div class="max-w-7xl mx-auto space-y-32">

            <!-- Pelican du Saloum -->
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2 aspect-[16/10] overflow-hidden rounded-2xl shadow-xl">
                    <img src="{{ asset('assets/img/pelican.png') }}" alt="Pélican du Saloum"
                        class="w-full h-full object-cover">
                </div>
                <div class="lg:w-1/2">
                    <h4 class="text-primary-ochre font-bold uppercase tracking-widest text-sm mb-4">Sine-Saloum</h4>
                    <h2 class="font-serif text-4xl md:text-5xl text-primary-blue mb-6">Pélican du Saloum</h2>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Niché au cœur du Delta du Saloum, notre boutique-hôtel écologique vous propose une immersion
                        totale dans une nature préservée. Entre mangroves et lagunes, vivez une expérience d'évasion
                        pure.
                    </p>
                    <a href="/hotel/pelican-du-saloum" class="btn-premium">VOIR L'HÔTEL</a>
                </div>
            </div>

            <!-- Nema Kadior -->
            <div class="flex flex-col lg:flex-row-reverse gap-16 items-center">
                <div class="lg:w-1/2 aspect-[16/10] overflow-hidden rounded-2xl shadow-xl">
                    <img src="{{ asset('assets/img/nema.png') }}" alt="Néma Kadior" class="w-full h-full object-cover">
                </div>
                <div class="lg:w-1/2 text-right lg:text-left">
                    <div class="flex flex-col lg:items-start items-end">
                        <h4 class="text-primary-ochre font-bold uppercase tracking-widest text-sm mb-4">Casamance</h4>
                        <h2 class="font-serif text-4xl md:text-5xl text-primary-blue mb-6">Néma Kadior</h2>
                    </div>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Retrouvez toute l'authenticité de la Casamance dans ce havre de paix à Ziguinchor. Architecture
                        traditionnelle et jardins luxuriants se mêlent pour un séjour placé sous le signe de la
                        sérénité.
                    </p>
                    <a href="/hotel/nema-kadior" class="btn-premium">VOIR L'HÔTEL</a>
                </div>
            </div>

            <!-- Royal Saly -->
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2 aspect-[16/10] overflow-hidden rounded-2xl shadow-xl">
                    <img src="{{ asset('assets/img/royal.png') }}" alt="Royal Saly" class="w-full h-full object-cover">
                </div>
                <div class="lg:w-1/2">
                    <h4 class="text-primary-ochre font-bold uppercase tracking-widest text-sm mb-4">Saly Portudal</h4>
                    <h2 class="font-serif text-4xl md:text-5xl text-primary-blue mb-6">Royal Saly</h2>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Situé sur la plus belle plage de Saly, le Royal Saly est la destination idéale pour combiner
                        détente balnéaire, activités nautiques et confort moderne dans un esprit resort.
                    </p>
                    <a href="/hotel/royal-saly" class="btn-premium">VOIR L'HÔTEL</a>
                </div>
            </div>

        </div>
    </section>

    <!-- Services Banner -->
    <section class="py-20 px-6 bg-sand-light">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
            <div>
                <span class="text-4xl mb-4 block">⭐</span>
                <h4 class="font-bold text-primary-blue">Excellence</h4>
                <p class="text-xs text-gray-500 uppercase tracking-widest">Service 5 Étoiles</p>
            </div>
            <div>
                <span class="text-4xl mb-4 block">🌍</span>
                <h4 class="font-bold text-primary-blue">Authenticité</h4>
                <p class="text-xs text-gray-500 uppercase tracking-widest">Culture Locale</p>
            </div>
            <div>
                <span class="text-4xl mb-4 block">🛡️</span>
                <h4 class="font-bold text-primary-blue">Sécurité</h4>
                <p class="text-xs text-gray-500 uppercase tracking-widest">Tranquillité Totale</p>
            </div>
            <div>
                <span class="text-4xl mb-4 block">🌱</span>
                <h4 class="font-bold text-primary-blue">Écologie</h4>
                <p class="text-xs text-gray-500 uppercase tracking-widest">Tourisme Durable</p>
            </div>
        </div>
    </section>

</x-hotel-layout>