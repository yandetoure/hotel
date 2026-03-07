<x-hotel-layout>
    @section('title', 'Réserver - Les Hôtels du Sénégal Group')

    <section class="pt-40 pb-24 px-6 bg-sand-light min-h-[80vh]">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h1 class="font-serif text-5xl text-primary-blue mb-4">Réservez votre séjour</h1>
                <p class="text-gray-500 uppercase tracking-widest text-sm font-bold">Vivez l'exception au Sénégal</p>
                <div class="w-16 h-1 bg-accent-gold mx-auto mt-6"></div>
            </div>

            <div class="glass p-10 rounded-3xl shadow-2xl">
                <form action="/confirmation" class="space-y-12">
                    <!-- Step 1: Destination & Dates -->
                    <div>
                        <h3 class="font-serif text-2xl text-primary-blue mb-8 border-b border-gray-100 pb-4">1. Choix du
                            séjour</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-400">Hôtel</label>
                                <select
                                    class="w-full bg-white border-gray-200 rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none text-primary-blue font-semibold">
                                    <option value="royal-saly">Royal Saly</option>
                                    <option value="pelican">Pélican du Saloum</option>
                                    <option value="nema">Néma Kadior</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-400">Type de chambre</label>
                                <select
                                    class="w-full bg-white border-gray-200 rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none text-primary-blue font-semibold">
                                    <option>Standard</option>
                                    <option>Supérieure / Suite</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-400">Dates de séjour</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="date"
                                        class="w-full bg-white border-gray-200 rounded-xl py-4 px-4 focus:ring-2 focus:ring-primary-ochre outline-none">
                                    <input type="date"
                                        class="w-full bg-white border-gray-200 rounded-xl py-4 px-4 focus:ring-2 focus:ring-primary-ochre outline-none">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-400">Personnes</label>
                                <select
                                    class="w-full bg-white border-gray-200 rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none font-semibold">
                                    <option>2 Adultes</option>
                                    <option>1 Adulte</option>
                                    <option>Famille</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Options -->
                    <div>
                        <h3 class="font-serif text-2xl text-primary-blue mb-8 border-b border-gray-100 pb-4">2. Options
                            & Services</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <label
                                class="flex items-center p-4 bg-white border border-gray-100 rounded-xl cursor-pointer hover:bg-primary-ochre/5 transition-colors group">
                                <input type="checkbox"
                                    class="w-5 h-5 rounded text-primary-ochre focus:ring-primary-ochre accent-primary-ochre mr-4">
                                <span
                                    class="text-sm font-semibold text-primary-blue group-hover:text-primary-ochre">Transfert
                                    Aéroport</span>
                            </label>
                            <label
                                class="flex items-center p-4 bg-white border border-gray-100 rounded-xl cursor-pointer hover:bg-primary-ochre/5 transition-colors group">
                                <input type="checkbox" checked
                                    class="w-5 h-5 rounded text-primary-ochre focus:ring-primary-ochre accent-primary-ochre mr-4">
                                <span
                                    class="text-sm font-semibold text-primary-blue group-hover:text-primary-ochre">Petit
                                    déjeuner</span>
                            </label>
                            <label
                                class="flex items-center p-4 bg-white border border-gray-100 rounded-xl cursor-pointer hover:bg-primary-ochre/5 transition-colors group">
                                <input type="checkbox"
                                    class="w-5 h-5 rounded text-primary-ochre focus:ring-primary-ochre accent-primary-ochre mr-4">
                                <span
                                    class="text-sm font-semibold text-primary-blue group-hover:text-primary-ochre">Excursion
                                    Guidée</span>
                            </label>
                        </div>
                    </div>

                    <!-- Step 3: Coordonnées -->
                    <div>
                        <h3 class="font-serif text-2xl text-primary-blue mb-8 border-b border-gray-100 pb-4">3.
                            Coordonnées</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-400">Nom complet</label>
                                <input type="text" placeholder="M/Mme ..."
                                    class="w-full bg-white border-gray-200 rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-400">Email</label>
                                <input type="email" placeholder="votre@email.com"
                                    class="w-full bg-white border-gray-200 rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-400">Téléphone</label>
                                <input type="tel" placeholder="+221 ..."
                                    class="w-full bg-white border-gray-200 rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-400">Pays</label>
                                <input type="text" placeholder="Sénégal"
                                    class="w-full bg-white border-gray-200 rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none">
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Paiement -->
                    <div class="bg-primary-blue/5 p-8 rounded-2xl border border-primary-blue/10">
                        <h3 class="font-serif text-2xl text-primary-blue mb-6">4. Règlement</h3>
                        <p class="text-sm text-gray-500 mb-8">Choisissez votre mode de paiement sécurisé pour valider
                            votre réservation.</p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                            <label
                                class="relative flex flex-col items-center p-6 bg-white border-2 border-transparent rounded-2xl cursor-pointer hover:border-accent-gold transition-all group has-[:checked]:border-accent-gold has-[:checked]:bg-accent-gold/5">
                                <input type="radio" name="payment" class="sr-only" checked>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Orange_Money_logo.png"
                                    alt="Orange Money" class="h-10 object-contain mb-4">
                                <span class="font-bold text-xs uppercase tracking-widest text-primary-blue">Orange
                                    Money</span>
                            </label>
                            <label
                                class="relative flex flex-col items-center p-6 bg-white border-2 border-transparent rounded-2xl cursor-pointer hover:border-accent-gold transition-all group has-[:checked]:border-accent-gold has-[:checked]:bg-accent-gold/5">
                                <input type="radio" name="payment" class="sr-only">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Visual_of_Wave_Digital_Assets.svg/1024px-Visual_of_Wave_Digital_Assets.svg.png"
                                    alt="Wave" class="h-10 object-contain mb-4">
                                <span class="font-bold text-xs uppercase tracking-widest text-primary-blue">Wave</span>
                            </label>
                            <label
                                class="relative flex flex-col items-center p-6 bg-white border-2 border-transparent rounded-2xl cursor-pointer hover:border-accent-gold transition-all group has-[:checked]:border-accent-gold has-[:checked]:bg-accent-gold/5">
                                <input type="radio" name="payment" class="sr-only">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png"
                                    alt="Carte" class="h-10 object-contain mb-4">
                                <span class="font-bold text-xs uppercase tracking-widest text-primary-blue">Carte
                                    Bancaire</span>
                            </label>
                        </div>

                        <div
                            class="flex flex-col md:flex-row justify-between items-center gap-8 border-t border-primary-blue/10 pt-8">
                            <div>
                                <p class="text-xs uppercase tracking-widest font-bold text-gray-400 mb-1">Total estimé
                                </p>
                                <p class="text-4xl font-serif text-primary-blue font-bold">150 000 <span
                                        class="text-lg">FCFA</span></p>
                                <p class="text-xs text-primary-ochre font-bold mt-1">Acompte de 30% possible à l'étape
                                    suivante</p>
                            </div>
                            <button class="btn-premium !py-5 !px-16 text-lg shadow-xl shadow-primary-ochre/20">CONFIRMER
                                ET PAYER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-hotel-layout>