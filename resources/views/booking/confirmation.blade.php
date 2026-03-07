<x-hotel-layout>
    @section('title', 'Merci - Les Hôtels du Sénégal Group')

    <section class="pt-40 pb-24 px-6 bg-sand-light min-h-[80vh] flex items-center">
        <div class="max-w-3xl mx-auto text-center">
            <div
                class="w-24 h-24 bg-primary-green text-white rounded-full flex items-center justify-center text-4xl mx-auto mb-10 shadow-xl shadow-primary-green/20 animate-bounce">
                ✓
            </div>

            <h1 class="font-serif text-5xl md:text-6xl text-primary-blue mb-6">Merci pour votre réservation !</h1>
            <p class="text-xl text-gray-500 mb-12">Votre séjour au <span class="font-bold text-primary-blue">Royal
                    Saly</span> est maintenant confirmé.</p>

            <div class="glass p-8 rounded-2xl mb-12 text-left">
                <div class="flex justify-between items-center mb-6 pb-6 border-b border-gray-100">
                    <span class="text-xs uppercase font-bold text-gray-400">Numéro de réservation</span>
                    <span class="font-bold text-primary-blue">#SEN-8293-2026</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-400 mb-2">Hôtel</p>
                        <p class="font-semibold text-primary-blue">Royal Saly, Saly Portudal</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-400 mb-2">Dates</p>
                        <p class="font-semibold text-primary-blue">15 Mai - 22 Mai 2026</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-400 mb-2">Chambre</p>
                        <p class="font-semibold text-primary-blue">Chambre Supérieure (2 Adultes)</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-400 mb-2">Statut</p>
                        <p class="font-bold text-primary-green uppercase tracking-widest text-xs">Paiement Partiel
                            (Acompte) Validé ✓</p>
                    </div>
                </div>
            </div>

            <p class="text-gray-500 mb-12">
                Un email de confirmation contenant tous les détails et votre reçu vient d'être envoyé à votre adresse
                email.
            </p>

            <div class="flex flex-col md:flex-row justify-center gap-6">
                <a href="/" class="btn-premium">RETOUR À L'ACCUEIL</a>
                <a href="#"
                    class="inline-block py-4 px-10 border-2 border-primary-blue text-primary-blue font-bold rounded-lg hover:bg-primary-blue hover:text-white transition-all">IMPRIMER
                    LE RÉCAPITULATIF</a>
            </div>
        </div>
    </section>
</x-hotel-layout>