<x-hotel-layout>
    @section('title', 'Réserver votre séjour - Les Hôtels du Sénégal Group')

    <section class="pt-40 pb-32 px-6 bg-[#F9F5F0] min-h-screen relative overflow-hidden">
        <!-- Background decorative elements -->
        <div
            class="absolute top-0 right-0 w-1/3 h-1/3 bg-primary-ochre/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-1/3 h-1/3 bg-primary-blue/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2">
        </div>

        <div class="max-w-5xl mx-auto relative z-10">
            <div class="text-center mb-20 animate-fade-in">
                <span class="text-accent-gold uppercase tracking-[0.4em] text-xs font-bold mb-4 block">Expérience
                    d'exception</span>
                <h1 class="font-serif text-5xl md:text-7xl text-primary-blue mb-6 leading-tight">Votre séjour débute ici
                </h1>
                <div class="w-24 h-[1px] bg-accent-gold mx-auto"></div>
            </div>

            <div
                class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-[0_30px_60px_-15px_rgba(26,60,90,0.1)] border border-white/40 p-8 md:p-16">
                <form action="/confirmation" class="space-y-20">
                    <!-- Step 1: Destination -->
                    <div class="animate-fade-in" style="animation-delay: 0.1s">
                        <div class="flex items-center space-x-4 mb-10">
                            <span
                                class="w-10 h-10 rounded-full bg-primary-blue text-white flex items-center justify-center font-serif text-lg">1</span>
                            <h3 class="font-serif text-3xl text-primary-blue">Destination & Type de séjour</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label
                                    class="block text-[11px] uppercase tracking-[0.2em] font-bold text-gray-400">Choisir
                                    l'établissement</label>
                                <select
                                    class="w-full bg-transparent border-b-2 border-gray-100 py-4 px-0 focus:border-primary-ochre outline-none text-primary-blue font-serif text-xl transition-all cursor-pointer">
                                    <option value="royal-saly">Royal Saly — Plage & Resort</option>
                                    <option value="pelican">Pélican du Saloum — Nature & Évasion</option>
                                    <option value="nema">Néma Kadior — Authenticité Casamance</option>
                                </select>
                            </div>
                            <div class="space-y-3">
                                <label class="block text-[11px] uppercase tracking-[0.2em] font-bold text-gray-400">Type
                                    de Suite / Chambre</label>
                                <select
                                    class="w-full bg-transparent border-b-2 border-gray-100 py-4 px-0 focus:border-primary-ochre outline-none text-primary-blue font-serif text-xl transition-all cursor-pointer">
                                    <option>Suite Impériale Vue Mer</option>
                                    <option>Chambre Deluxe Jardin</option>
                                    <option>Villa Privée avec Piscine</option>
                                </select>
                            </div>
                            <div class="space-y-3 md:col-span-2">
                                <label
                                    class="block text-[11px] uppercase tracking-[0.2em] font-bold text-gray-400">Période
                                    de séjour</label>
                                <div class="grid grid-cols-2 gap-8">
                                    <div class="relative">
                                        <input type="date"
                                            class="w-full bg-transparent border-b-2 border-gray-100 py-4 outline-none text-primary-blue font-semibold focus:border-primary-ochre transition-all">
                                        <span
                                            class="absolute right-0 top-1/2 -translate-y-1/2 text-xs text-gray-300 uppercase">Arrivée</span>
                                    </div>
                                    <div class="relative">
                                        <input type="date"
                                            class="w-full bg-transparent border-b-2 border-gray-100 py-4 outline-none text-primary-blue font-semibold focus:border-primary-ochre transition-all">
                                        <span
                                            class="absolute right-0 top-1/2 -translate-y-1/2 text-xs text-gray-300 uppercase">Départ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Options -->
                    <div class="animate-fade-in" style="animation-delay: 0.2s">
                        <div class="flex items-center space-x-4 mb-10">
                            <span
                                class="w-10 h-10 rounded-full bg-primary-blue text-white flex items-center justify-center font-serif text-lg">2</span>
                            <h3 class="font-serif text-3xl text-primary-blue">Services & Raffinements</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @php
                                $options = [
                                    ['title' => 'Transfert Privé VIP', 'desc' => 'Accueil aéroport personnalisé'],
                                    ['title' => 'Pension Complète', 'desc' => 'Gastronomie locale & internationale'],
                                    ['title' => 'Forfait Bien-être', 'desc' => 'Soins au Spa quotidien'],
                                ];
                            @endphp
                            @foreach($options as $opt)
                                <label
                                    class="relative flex flex-col p-6 border border-gray-100 rounded-2xl cursor-pointer hover:border-primary-ochre/30 transition-all group has-[:checked]:border-primary-ochre has-[:checked]:bg-primary-ochre/[0.02]">
                                    <input type="checkbox"
                                        class="absolute top-4 right-4 w-5 h-5 rounded-full text-primary-ochre focus:ring-primary-ochre accent-primary-ochre">
                                    <span class="font-serif text-xl text-primary-blue mb-1">{{ $opt['title'] }}</span>
                                    <span class="text-xs text-gray-400 leading-relaxed">{{ $opt['desc'] }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Step 3: Information -->
                    <div class="animate-fade-in" style="animation-delay: 0.3s">
                        <div class="flex items-center space-x-4 mb-10">
                            <span
                                class="w-10 h-10 rounded-full bg-primary-blue text-white flex items-center justify-center font-serif text-lg">3</span>
                            <h3 class="font-serif text-3xl text-primary-blue">Informations Personnelles</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-2">
                                <label class="block text-[11px] uppercase tracking-[0.2em] font-bold text-gray-400">Nom
                                    Complet</label>
                                <input type="text" placeholder="Michel Dupont"
                                    class="w-full bg-transparent border-b border-gray-100 py-3 outline-none text-primary-blue focus:border-primary-ochre transition-all">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] uppercase tracking-[0.2em] font-bold text-gray-400">Email
                                    de contact</label>
                                <input type="email" placeholder="contact@prestige.com"
                                    class="w-full bg-transparent border-b border-gray-100 py-3 outline-none text-primary-blue focus:border-primary-ochre transition-all">
                            </div>
                        </div>
                    </div>

                    <!-- Final Action -->
                    <div class="pt-10 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-10 animate-fade-in"
                        style="animation-delay: 0.4s">
                        <div>
                            <p class="text-[11px] uppercase tracking-[0.3em] font-bold text-gray-400 mb-2">Estimation
                                Totale</p>
                            <p class="font-serif text-5xl text-primary-blue font-bold">245 000 <span
                                    class="text-lg">FCFA</span></p>
                        </div>
                        <button type="submit"
                            class="w-full md:w-auto bg-primary-blue text-white px-16 py-6 rounded-full font-bold uppercase tracking-[0.2em] text-sm hover:bg-primary-ochre transition-all shadow-2xl shadow-primary-blue/20">
                            Finaliser ma réservation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-hotel-layout>