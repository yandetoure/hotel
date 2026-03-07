<x-hotel-layout>
    @section('title', 'Offres & Packages - Les Hôtels du Sénégal Group')

    <!-- Header Section -->
    <section class="pt-40 pb-20 px-6 bg-primary-blue text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <h1 class="font-serif text-5xl md:text-6xl mb-6">Offres & Packages</h1>
            <p class="text-xl opacity-80 max-w-2xl">
                Profitez de nos offres exclusives pour des séjours inoubliables au Sénégal. Détente, aventure ou
                romantisme, trouvez le package qui vous ressemble.
            </p>
        </div>
        <div class="absolute top-0 right-0 w-1/3 h-full bg-accent-gold/10 -skew-x-12 transform translate-x-20"></div>
    </section>

    <!-- Offers Grid -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">

            <!-- Weekend Détente -->
            <div
                class="group bg-sand-light rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="h-80 overflow-hidden relative">
                    <img src="{{ asset('assets/img/hero.png') }}" alt="Weekend Détente"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute top-6 left-6 bg-accent-gold text-white px-4 py-2 rounded-full font-bold text-sm tracking-widest uppercase">
                        -20%
                    </div>
                </div>
                <div class="p-10">
                    <h3 class="font-serif text-3xl text-primary-blue mb-4">Weekend Détente</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Évadez-vous le temps d'un weekend. Inclut petit-déjeuner buffet, un massage relaxant de 30
                        minutes et un départ tardif à 16h.
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs uppercase tracking-widest font-bold text-gray-400 block mb-1">À partir
                                de</span>
                            <span class="text-2xl font-bold text-primary-blue">85 000 FCFA <span
                                    class="text-sm font-normal">/ nuit</span></span>
                        </div>
                        <a href="/reservations?offer=weekend" class="btn-premium">PROFITER</a>
                    </div>
                </div>
            </div>

            <!-- Lune de Miel -->
            <div
                class="group bg-sand-light rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="h-80 overflow-hidden relative">
                    <img src="{{ asset('assets/img/pelican.png') }}" alt="Lune de Miel"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute top-6 left-6 bg-primary-ochre text-white px-4 py-2 rounded-full font-bold text-sm tracking-widest uppercase">
                        Romantique
                    </div>
                </div>
                <div class="p-10">
                    <h3 class="font-serif text-3xl text-primary-blue mb-4">Lune de Miel</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Un cadre idyllique pour débuter votre vie à deux. Décoration florale, dîner aux chandelles sur
                        la plage et bouteille de champagne offerte.
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs uppercase tracking-widest font-bold text-gray-400 block mb-1">Package
                                complet</span>
                            <span class="text-2xl font-bold text-primary-blue">450 000 FCFA <span
                                    class="text-sm font-normal">/ 3 nuits</span></span>
                        </div>
                        <a href="/reservations?offer=honeymoon" class="btn-premium">DÉCOUVRIR</a>
                    </div>
                </div>
            </div>

            <!-- Séjour Famille -->
            <div
                class="group bg-sand-light rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="h-80 overflow-hidden relative">
                    <img src="{{ asset('assets/img/royal.png') }}" alt="Séjour Famille"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute top-6 left-6 bg-primary-green text-white px-4 py-2 rounded-full font-bold text-sm tracking-widest uppercase">
                        Famille
                    </div>
                </div>
                <div class="p-10">
                    <h3 class="font-serif text-3xl text-primary-blue mb-4">Séjour Famille</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Le bonheur pour petits et grands. Chambres communicantes, kids club inclus et une excursion en
                        famille offerte dans la mangrove.
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs uppercase tracking-widest font-bold text-gray-400 block mb-1">Pour 4
                                personnes</span>
                            <span class="text-2xl font-bold text-primary-blue">120 000 FCFA <span
                                    class="text-sm font-normal">/ nuit</span></span>
                        </div>
                        <a href="/reservations?offer=family" class="btn-premium">RÉSERVER</a>
                    </div>
                </div>
            </div>

            <!-- Séminaire Entreprise -->
            <div
                class="group bg-sand-light rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="h-80 overflow-hidden relative">
                    <img src="{{ asset('assets/img/nema.png') }}" alt="Séminaire Entreprise"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute top-6 left-6 bg-primary-blue text-white px-4 py-2 rounded-full font-bold text-sm tracking-widest uppercase">
                        Business
                    </div>
                </div>
                <div class="p-10">
                    <h3 class="font-serif text-3xl text-primary-blue mb-4">Séminaire Entreprise</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Alliez travail et détente. Salles de réunion équipées, pauses café gourmandes et team building
                        sur mesure au bord de l'eau.
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs uppercase tracking-widest font-bold text-gray-400 block mb-1">Sur
                                devis</span>
                            <span class="text-2xl font-bold text-primary-blue">Tarifs Groupe</span>
                        </div>
                        <a href="/seminaires" class="btn-premium">DEMANDER UN DEVIS</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Promo Code Section -->
    <section class="py-20 px-6 bg-primary-ochre text-white text-center rounded-t-[4rem]">
        <div class="max-w-4xl mx-auto">
            <h2 class="font-serif text-4xl mb-6">Vous avez un code promo ?</h2>
            <p class="text-xl opacity-90 mb-10">Utilisez-le lors de votre réservation pour bénéficier de réductions
                supplémentaires.</p>
            <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                <input type="text" placeholder="Entrez votre code"
                    class="bg-white/20 border border-white/30 rounded-lg py-4 px-8 text-white placeholder-white/60 focus:bg-white/30 outline-none w-full md:w-80">
                <button
                    class="bg-white text-primary-ochre px-10 py-4 rounded-lg font-bold hover:bg-accent-gold hover:text-white transition-all">APPLIQUER</button>
            </div>
        </div>
    </section>
</x-hotel-layout>