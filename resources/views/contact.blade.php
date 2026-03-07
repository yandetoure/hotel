<x-hotel-layout>
    @section('title', 'Contact & Localisation - Les Hôtels du Sénégal Group')

    <!-- Header Section -->
    <section class="pt-40 pb-20 px-6 bg-primary-blue text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <h1 class="font-serif text-5xl md:text-6xl mb-6">Contact</h1>
            <p class="text-xl opacity-80 max-w-2xl">
                Notre équipe est à votre écoute pour préparer votre prochain séjour ou répondre à toutes vos questions.
            </p>
        </div>
        <div class="absolute bottom-0 right-0 w-1/4 h-full bg-accent-gold/10 skew-x-12 transform -translate-x-10"></div>
    </section>

    <!-- Details Section -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-16">

            <!-- Contact Info -->
            <div class="lg:col-span-1 space-y-12">
                <div>
                    <h3 class="font-serif text-3xl text-primary-blue mb-8 section-title">Nos Coordonnées</h3>
                    <div class="space-y-8">
                        <div class="flex items-start space-x-4">
                            <span class="text-3xl">📞</span>
                            <div>
                                <h4 class="font-bold text-primary-blue">Téléphone</h4>
                                <p class="text-gray-500">+221 33 000 00 00</p>
                                <p class="text-xs text-gray-400 mt-1 uppercase tracking-widest">Disponible 24h/24</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <span class="text-3xl">📧</span>
                            <div>
                                <h4 class="font-bold text-primary-blue">Email</h4>
                                <p class="text-gray-500">contact@hotels-senegal.sn</p>
                                <p class="text-gray-500">reservations@hotels-senegal.sn</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <span class="text-3xl">📍</span>
                            <div>
                                <h4 class="font-bold text-primary-blue">Siège Social</h4>
                                <p class="text-gray-500">Saly Portudal, B.P. 518</p>
                                <p class="text-gray-500">Mbour, Sénégal</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Highlight -->
                <div class="bg-primary-green/5 p-8 rounded-3xl border border-primary-green/10">
                    <div class="flex items-center space-x-4 mb-4">
                        <div
                            class="w-12 h-12 bg-primary-green text-white rounded-full flex items-center justify-center text-2xl">
                            💬
                        </div>
                        <h4 class="font-bold text-primary-green text-xl">Service WhatsApp</h4>
                    </div>
                    <p class="text-gray-600 mb-6">Besoin d'une réponse instantanée ? Discutez avec nos conseillers
                        voyage via WhatsApp.</p>
                    <a href="https://wa.me/221330000000"
                        class="inline-block bg-primary-green text-white px-8 py-3 rounded-lg font-bold hover:shadow-lg transition-all">
                        LANCER LA CONVERSATION
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-sand-light p-10 md:p-12 rounded-3xl shadow-xl">
                    <h3 class="font-serif text-3xl text-primary-blue mb-10">Envoyez-nous un message</h3>
                    <form action="#" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-500">Prénom & Nom</label>
                                <input type="text"
                                    class="w-full bg-white border-transparent rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none shadow-sm">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs uppercase font-bold text-gray-500">Email</label>
                                <input type="email"
                                    class="w-full bg-white border-transparent rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none shadow-sm">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs uppercase font-bold text-gray-500">Sujet</label>
                            <select
                                class="w-full bg-white border-transparent rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none shadow-sm font-semibold">
                                <option>Information Générale</option>
                                <option>Réservation de groupe</option>
                                <option>Recrutement</option>
                                <option>Partenariat</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs uppercase font-bold text-gray-500">Votre message</label>
                            <textarea rows="6"
                                class="w-full bg-white border-transparent rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary-ochre outline-none shadow-sm"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn-premium !py-5 !px-16 text-lg">ENVOYER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="h-[500px] w-full relative">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            class="grayscale opacity-60 hover:grayscale-0 transition-all duration-700"
            src="https://maps.google.com/maps?q=Saly%20Portudal%20Senegal&t=&z=14&ie=UTF8&iwloc=&output=embed">
        </iframe>
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
            <div class="glass p-10 rounded-2xl text-center max-w-md mx-6 border-none pointer-events-auto">
                <span class="text-4xl block mb-4">📍</span>
                <!-- <h3 class="font-serif text-2xl text-primary-blue mb-2">Nos bureaux à Saly</h3> -->
                <!-- <p class="text-gray-600">Situés à l'entrée de la zone touristique de Saly Portudal.</p> -->
                <div class="mt-6 w-16 h-1 bg-accent-gold mx-auto"></div>
            </div>
        </div>
    </section>

</x-hotel-layout>