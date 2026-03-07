<x-hotel-layout>
    @section('title', 'Séminaires & Événements - Les Hôtels du Sénégal Group')

    <!-- Hero Section -->
    <section class="pt-40 pb-20 px-6 bg-primary-blue text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <h1 class="font-serif text-5xl md:text-6xl mb-6">Séminaires & Événements</h1>
            <p class="text-xl opacity-80 max-w-2xl">
                Donnez une autre dimension à vos événements professionnels au cœur des plus beaux paysages du Sénégal.
            </p>
        </div>
        <div class="absolute top-0 right-0 w-1/2 h-full bg-accent-gold/5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
    </section>

    <!-- Content Section -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-20">
            <div class="md:w-1/2">
                <h2 class="font-serif text-4xl text-primary-blue mb-8">Vos événements sur-mesure</h2>
                <div class="prose prose-lg text-gray-600 mb-12">
                    <p class="mb-4">
                        Nos établissements disposent de salles de réunion polyvalentes et d'espaces extérieurs
                        d'exception pour accueillir tous vos événements : séminaires, lancements de produits, team
                        building ou mariages.
                    </p>
                    <ul class="space-y-4 list-none pl-0">
                        <li class="flex items-start space-x-3">
                            <span class="text-accent-gold text-2xl">✓</span>
                            <span>Capacité d'accueil jusqu'à 150 personnes</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="text-accent-gold text-2xl">✓</span>
                            <span>Équipements audiovisuels de pointe (projection, sonorisation)</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="text-accent-gold text-2xl">✓</span>
                            <span>Service traiteur gastronomique (pauses, cocktails, dîners)</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="text-accent-gold text-2xl">✓</span>
                            <span>Activités de team building personnalisées</span>
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="rounded-2xl overflow-hidden shadow-lg h-64">
                        <img src="{{ asset('assets/img/nema.png') }}" alt="Meeting Room"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-lg h-64">
                        <img src="{{ asset('assets/img/royal.png') }}" alt="Event Space"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Request Form Card -->
            <div class="md:w-1/2">
                <div class="glass p-10 rounded-3xl shadow-2xl sticky top-32">
                    <h3 class="font-serif text-3xl text-primary-blue mb-6">Demande de devis</h3>
                    <p class="text-sm text-gray-400 uppercase tracking-widest font-bold mb-8">Réponse rapide sous 24h
                    </p>

                    <form action="#" class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-500">Nom</label>
                                <input type="text"
                                    class="w-full border-gray-100 rounded-xl py-4 px-6 bg-sand-light focus:bg-white focus:ring-2 focus:ring-primary-ochre outline-none">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-500">Entreprise</label>
                                <input type="text"
                                    class="w-full border-gray-100 rounded-xl py-4 px-6 bg-sand-light focus:bg-white focus:ring-2 focus:ring-primary-ochre outline-none">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs uppercase font-bold text-gray-500">Email professionnel</label>
                            <input type="email"
                                class="w-full border-gray-100 rounded-xl py-4 px-6 bg-sand-light focus:bg-white focus:ring-2 focus:ring-primary-ochre outline-none">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-500">Hôtel souhaité</label>
                                <select
                                    class="w-full border-gray-100 rounded-xl py-4 px-6 bg-sand-light focus:bg-white focus:ring-2 focus:ring-primary-ochre outline-none">
                                    <option>Royal Saly</option>
                                    <option>Pélican du Saloum</option>
                                    <option>Néma Kadior</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-500">Nb de
                                    participants</label>
                                <input type="number"
                                    class="w-full border-gray-100 rounded-xl py-4 px-6 bg-sand-light focus:bg-white focus:ring-2 focus:ring-primary-ochre outline-none">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs uppercase font-bold text-gray-500">Détails de
                                l'événement</label>
                            <textarea rows="4" placeholder="Objectifs, dates souhaitées, besoins spécifiques..."
                                class="w-full border-gray-100 rounded-xl py-4 px-6 bg-sand-light focus:bg-white focus:ring-2 focus:ring-primary-ochre outline-none"></textarea>
                        </div>
                        <button type="submit" class="w-full btn-premium !py-5">ENVOYER MA DEMANDE</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-hotel-layout>