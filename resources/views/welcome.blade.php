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
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-full max-w-[1240px] px-6 z-20">
            <div class="glass p-6 md:p-8 rounded-2xl shadow-2xl">
                <form action="/reservations" class="grid grid-cols-1 md:grid-cols-12 gap-x-4 gap-y-6 items-end">
                    <div class="md:col-span-3 space-y-2">
                        <label class="block text-xs uppercase tracking-widest font-bold text-primary-blue">Destination</label>
                        <select name="hotel" class="w-full bg-white/50 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary-ochre transition-all">
                            <option value="">Choisir un hôtel</option>
                            <option value="pelican">Pélican du Saloum</option>
                            <option value="nema">Néma Kadior</option>
                            <option value="royal">Royal Saly</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="block text-xs uppercase tracking-widest font-bold text-primary-blue">Arrivée</label>
                        <input type="date" class="w-full bg-white/50 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary-ochre transition-all">
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="block text-xs uppercase tracking-widest font-bold text-primary-blue">Départ</label>
                        <input type="date" class="w-full bg-white/50 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary-ochre transition-all">
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="block text-xs uppercase tracking-widest font-bold text-primary-blue">Adultes</label>
                        <select class="w-full bg-white/50 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary-ochre transition-all">
                            <option>1 Adulte</option>
                            <option selected>2 Adultes</option>
                            <option>3 Adultes</option>
                        </select>
                    </div>
                    <div class="md:col-span-1 space-y-2">
                        <label class="block text-xs uppercase tracking-widest font-bold text-primary-blue">Enfants</label>
                        <select class="w-full bg-white/50 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary-ochre transition-all">
                            <option>0 Enfant</option>
                            <option>1 Enfant</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" class="w-full btn-premium py-4">RECHERCHER</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="py-24 px-6 bg-[#f7f1f0] relative" id="destinations">
        <!-- Background Texture Overlay -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl md:text-5xl text-[#4a3a35] mb-4">Trois destinations de rêve au Sénégal</h2>
                <p class="text-[#8c7a76] text-lg md:text-xl font-light">Trois hôtels d'exception pour des séjours mémorables sous le soleil africain.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Royal Saly -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-[#e8dedc] group">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('assets/img/royal.png') }}" alt="Le Royal Saly" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="p-8 text-center bg-[#fffbf9]">
                        <h3 class="font-serif text-2xl text-[#4a3a35] uppercase tracking-wider mb-1">Le Royal Saly</h3>
                        <div class="text-[#b08d57] text-[10px] font-bold uppercase tracking-[0.3em] mb-6">Saly</div>
                        <p class="text-[#8c7a76] text-sm leading-relaxed mb-8 px-4">Un hôtel balnéaire de charme à Saly, avec piscines, plage privée et nombreuses activités nautiques.</p>
                        <a href="/hotel/royal-saly" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[11px] font-bold uppercase tracking-widest rounded shadow-md hover:bg-[#8c6542] transition-all">
                            Découvrir <span class="ml-1 opacity-70">›</span>
                        </a>
                    </div>
                </div>

                <!-- Pelican -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-[#e8dedc] group">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('assets/img/pelican.png') }}" alt="Le Pélican du Saloum" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="p-8 text-center bg-[#fffbf9]">
                        <h3 class="font-serif text-2xl text-[#4a3a35] tracking-wider mb-1">Le Pélican du Saloum</h3>
                        <div class="text-[#b08d57] text-[10px] font-bold uppercase tracking-[0.3em] mb-6">Toubacouta</div>
                        <p class="text-[#8c7a76] text-sm leading-relaxed mb-8 px-4">Un lodge au cœur du delta du Saloum, idéal pour les amateurs d'écotourisme et de nature.</p>
                        <a href="/hotel/pelican-du-saloum" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[11px] font-bold uppercase tracking-widest rounded shadow-md hover:bg-[#8c6542] transition-all">
                            Découvrir <span class="ml-1 opacity-70">›</span>
                        </a>
                    </div>
                </div>

                <!-- Nema Kadior -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-[#e8dedc] group">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('assets/img/nema.png') }}" alt="Le Nema Kadior" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="p-8 text-center bg-[#fffbf9]">
                        <h3 class="font-serif text-2xl text-[#4a3a35] tracking-wider mb-1">Le Nema Kadior</h3>
                        <div class="text-[#b08d57] text-[10px] font-bold uppercase tracking-[0.3em] mb-6">Casamance</div>
                        <p class="text-[#8c7a76] text-sm leading-relaxed mb-8 px-4">Un hôtel au bord du fleuve dans un écrin de verdure, offrant détente et immersion culturelle en Casamance.</p>
                        <a href="/hotel/nema-kadior" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[11px] font-bold uppercase tracking-widest rounded shadow-md hover:bg-[#8c6542] transition-all">
                            Découvrir <span class="ml-1 opacity-70">›</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 px-6 bg-[#f2e9e7] relative">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-[#e0d0cc] to-transparent"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="text-center mb-16 flex flex-col items-center">
                <div class="w-16 h-px bg-[#a67c52] mb-4 opacity-50"></div>
                <h2 class="font-serif text-4xl text-[#4a3a35]">Nos Services</h2>
                <div class="w-12 h-px bg-[#a67c52] mt-4 opacity-50"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white/60 backdrop-blur-sm rounded-xl overflow-hidden shadow-sm hover:shadow-md border border-white/50 transition-all">
                    <div class="p-6 pb-0 flex items-center gap-3">
                        <span class="text-[#a67c52] text-2xl">🚐</span>
                        <h3 class="font-serif text-xl text-[#4a3a35]">Navette Aéroport</h3>
                    </div>
                    <div class="aspect-video mt-4 overflow-hidden mx-6 rounded-lg">
                        <img src="{{ asset('assets/img/hero.png') }}" class="w-full h-full object-cover opacity-80 brightness-90">
                    </div>
                    <div class="p-8 text-center">
                        <p class="text-[#8c7a76] text-sm leading-relaxed mb-8">Profitez d'une remise de 20% sur votre séjour hors vacances scolaires. Offre valable du 1er mai au 30 juin.</p>
                        <a href="#" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[10px] font-black uppercase tracking-[0.2em] rounded hover:bg-[#8c6542] transition-all">
                            Voir l'Offre
                        </a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white/60 backdrop-blur-sm rounded-xl overflow-hidden shadow-sm hover:shadow-md border border-white/50 transition-all">
                    <div class="p-6 pb-0 flex items-center gap-3">
                        <span class="text-[#a67c52] text-2xl">🥐</span>
                        <h3 class="font-serif text-xl text-[#4a3a35]">Petit Déjeuner Buffet</h3>
                    </div>
                    <div class="aspect-video mt-4 overflow-hidden mx-6 rounded-lg">
                        <img src="{{ asset('assets/img/hero.png') }}" class="w-full h-full object-cover opacity-80 brightness-90">
                    </div>
                    <div class="p-8 text-center">
                        <p class="text-[#8c7a76] text-sm leading-relaxed mb-8">Un accueil romantique avec champagne, dîner aux chandelles et soins au spa pour une lune de miel inoubliable.</p>
                        <a href="#" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[10px] font-black uppercase tracking-[0.2em] rounded hover:bg-[#8c6542] transition-all">
                            Voir l'Offre
                        </a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white/60 backdrop-blur-sm rounded-xl overflow-hidden shadow-sm hover:shadow-md border border-white/50 transition-all">
                    <div class="p-6 pb-0 flex items-center gap-3">
                        <span class="text-[#a67c52] text-2xl">🌴</span>
                        <h3 class="font-serif text-xl text-[#4a3a35]">Activités & Excursions</h3>
                    </div>
                    <div class="aspect-video mt-4 overflow-hidden mx-6 rounded-lg">
                        <img src="{{ asset('assets/img/hero.png') }}" class="w-full h-full object-cover opacity-80 brightness-90">
                    </div>
                    <div class="p-8 text-center">
                        <p class="text-[#8c7a76] text-sm leading-relaxed mb-8">Restez 7 nuits ou plus et bénéficiez de 1 nuit offerte, idéal pour profiter pleinement de nos paradis tropicaux.</p>
                        <a href="#" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[10px] font-black uppercase tracking-[0.2em] rounded hover:bg-[#8c6542] transition-all">
                            Voir l'Offre
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Branding & Partner Section -->
    <section class="py-12 px-6 bg-[#f7f1f0] border-t border-[#e8dedc]">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-center">
                <!-- Branding -->
                <div class="flex items-center gap-6 group cursor-pointer">
                    <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center border border-[#e8dedc] group-hover:bg-[#a67c52] transition-all duration-500">
                        <img src="{{ asset('assets/img/logo.png') }}" class="w-12 h-12 object-contain group-hover:invert transition-all">
                    </div>
                    <div>
                        <div class="text-[9px] font-bold text-[#b08d57] uppercase tracking-[0.4em] mb-1">Les Hôtels</div>
                        <div class="text-xl font-serif text-[#4a3a35] group-hover:text-[#a67c52] transition-colors">Le Royal Saly</div>
                    </div>
                </div>

                <!-- Hotel Badge -->
                <div class="relative h-24 overflow-hidden rounded-xl group">
                    <img src="{{ asset('assets/img/pelican.png') }}" class="w-full h-full object-cover brightness-75 group-hover:brightness-90 transition-all">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
                        <img src="{{ asset('assets/img/logo.png') }}" class="w-8 h-8 invert mb-2">
                        <div class="text-lg font-serif">Le Pélican du Saloum</div>
                        <div class="text-[8px] uppercase tracking-widest opacity-80">Toubacouta</div>
                    </div>
                </div>

                <!-- Partners/Payment -->
                <div class="bg-white/50 rounded-xl p-6 border border-[#e8dedc]">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-[#a67c52] text-sm">location_on</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#4a3a35]">Teranguest</span>
                    </div>
                    <div class="flex flex-wrap gap-3 items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-3">
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <p class="text-[9px] font-bold uppercase tracking-[0.3em] text-[#8c7a76] opacity-50">WIEFC . CREA 77227-BRULAN</p>
            </div>
        </div>
    </section>

</x-hotel-layout>