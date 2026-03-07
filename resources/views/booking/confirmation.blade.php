<x-hotel-layout>
    @section('title', 'Confirmation de votre séjour - Les Hôtels du Sénégal Group')

    <section class="pt-40 pb-32 px-6 bg-[#F9F5F0] min-h-screen flex items-center relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-primary-blue/5 to-transparent"></div>

        <div class="max-w-4xl mx-auto text-center relative z-10 animate-fade-in">
            <!-- Icon of prestige -->
            <div
                class="inline-flex items-center justify-center w-24 h-24 rounded-full border border-accent-gold mb-12 relative">
                <div class="absolute inset-2 rounded-full border border-accent-gold/30 animate-pulse"></div>
                <svg class="w-10 h-10 text-accent-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="font-serif text-5xl md:text-7xl text-primary-blue mb-6 leading-tight">Votre séjour d'exception
                est confirmé</h1>
            <p class="text-gray-500 uppercase tracking-[0.3em] text-xs font-bold mb-16">Nous sommes honorés de vous
                accueillir prochainement</p>

            <div
                class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 flex flex-col md:flex-row text-left mb-16">
                <!-- Recap Details -->
                <div class="flex-1 p-10 md:p-12 border-b md:border-b-0 md:border-r border-gray-100">
                    <h3 class="font-serif text-2xl text-primary-blue mb-10 pb-4 border-b border-gray-50">Détails de la
                        réservation</h3>

                    <div class="space-y-8">
                        <div>
                            <span
                                class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-2">Établissement</span>
                            <span class="text-lg text-primary-blue font-serif">Royal Saly — Plage & Resort</span>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <span
                                    class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-2">Arrivée</span>
                                <span class="text-sm text-primary-blue font-semibold">15 Mai 2026</span>
                            </div>
                            <div>
                                <span
                                    class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-2">Départ</span>
                                <span class="text-sm text-primary-blue font-semibold">22 Mai 2026</span>
                            </div>
                        </div>
                        <div>
                            <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-2">Suite
                                Sélectionnée</span>
                            <span class="text-sm text-primary-blue font-semibold">Suite Impériale Vue Mer (2
                                Adultes)</span>
                        </div>
                    </div>
                </div>

                <!-- Status & Reference -->
                <div class="w-full md:w-80 bg-primary-blue/5 p-10 md:p-12 flex flex-col justify-between">
                    <div>
                        <span
                            class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-2">Référence</span>
                        <span class="text-xl font-bold text-primary-blue tracking-tighter">#SEN-8293-2026</span>
                    </div>

                    <div class="mt-10 pt-10 border-t border-primary-blue/10">
                        <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-2">Statut du
                            règlement</span>
                        <div
                            class="inline-flex items-center px-3 py-1 bg-primary-green/10 text-primary-green rounded-full text-[10px] uppercase font-bold tracking-widest">
                            Acompte Validé
                        </div>
                    </div>

                    <div class="mt-auto pt-10">
                        <p class="text-[10px] text-gray-400 leading-relaxed italic">
                            Un récapitulatif détaillé a été envoyé à votre adresse email.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-center items-center gap-8">
                <a href="/"
                    class="text-[11px] uppercase tracking-[0.3em] font-bold text-primary-blue hover:text-primary-ochre transition-all flex items-center group">
                    <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour à l'accueil
                </a>
                <button onclick="window.print()"
                    class="bg-primary-blue text-white px-12 py-5 rounded-full font-bold uppercase tracking-[0.2em] text-xs hover:bg-primary-ochre transition-all shadow-xl">
                    Imprimer le bon de séjour
                </button>
            </div>
        </div>
    </section>
</x-hotel-layout>