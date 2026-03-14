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
    <section class="py-24 px-6 bg-[#f7f1f0] relative">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <h2 class="font-serif text-5xl text-center text-[#4a3a35] mb-16 italic">Nos Services</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Service 1 -->
                <div class="bg-white/70 backdrop-blur-sm rounded-xl overflow-hidden shadow-sm border border-[#e8dedc] transition-all hover:-translate-y-1 hover:shadow-md">
                    <div class="p-6 text-center border-b border-[#e8dedc] relative">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 text-[#a67c52] opacity-40">❧</div>
                        <div class="flex items-center justify-center gap-3">
                            <span class="text-[#a67c52] text-xl opacity-80">🚐</span>
                            <h3 class="font-serif text-lg text-[#4a3a35]">Navette Aéroport</h3>
                        </div>
                    </div>
                    <div class="aspect-[2/1] overflow-hidden">
                        <img src="{{ asset('assets/img/hero.png') }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8 text-center bg-white/40">
                        <p class="text-[#8c7a76] text-[13px] leading-relaxed mb-6 font-light">Profitez d'une remise de 20% sur votre séjour hors vacances scolaires. Offre valable du 1er mai au 30 juin.</p>
                        <a href="#" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[10px] font-bold uppercase tracking-widest rounded shadow hover:bg-[#8c6542] transition-all">
                            Voir l'Offre
                        </a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white/70 backdrop-blur-sm rounded-xl overflow-hidden shadow-sm border border-[#e8dedc] transition-all hover:-translate-y-1 hover:shadow-md">
                    <div class="p-6 text-center border-b border-[#e8dedc] relative">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 text-[#a67c52] opacity-40">❧</div>
                        <div class="flex items-center justify-center gap-3">
                            <span class="text-[#a67c52] text-xl opacity-80">🥐</span>
                            <h3 class="font-serif text-lg text-[#4a3a35]">Petit Déjeuner Buffet</h3>
                        </div>
                    </div>
                    <div class="aspect-[2/1] overflow-hidden">
                        <img src="{{ asset('assets/img/royal.png') }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8 text-center bg-white/40">
                        <p class="text-[#8c7a76] text-[13px] leading-relaxed mb-6 font-light">Un accueil romantique avec champagne, dîner aux chandelles et soins au spa pour une lune de miel inoubliable.</p>
                        <a href="#" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[10px] font-bold uppercase tracking-widest rounded shadow hover:bg-[#8c6542] transition-all">
                            Voir l'Offre
                        </a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white/70 backdrop-blur-sm rounded-xl overflow-hidden shadow-sm border border-[#e8dedc] transition-all hover:-translate-y-1 hover:shadow-md">
                    <div class="p-6 text-center border-b border-[#e8dedc] relative">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 text-[#a67c52] opacity-40">❧</div>
                        <div class="flex items-center justify-center gap-3">
                            <span class="text-[#a67c52] text-xl opacity-80">🌴</span>
                            <h3 class="font-serif text-lg text-[#4a3a35]">Activités & Excursions</h3>
                        </div>
                    </div>
                    <div class="aspect-[2/1] overflow-hidden">
                        <img src="{{ asset('assets/img/pelican.png') }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8 text-center bg-white/40">
                        <p class="text-[#8c7a76] text-[13px] leading-relaxed mb-6 font-light">Restez 7 nuits ou plus et bénéficiez de 1 nuit offerte, idéal pour profiter pleinement de nos paradis tropicaux.</p>
                        <a href="#" class="inline-block px-10 py-3 bg-[#a67c52] text-white text-[10px] font-bold uppercase tracking-widest rounded shadow hover:bg-[#8c6542] transition-all">
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
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-stretch">
                
                <!-- Royal Saly Card -->
                <a href="/hotel/royal-saly" class="relative overflow-hidden group border border-[#e8dedc] hover:shadow-lg transition-all md:col-span-1 min-h-[140px]">
                    <img src="{{ asset('assets/img/royal.png') }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 brightness-75">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/img/logo.png') }}" class="w-8 h-8 object-contain invert">
                            <div>
                                <div class="text-[7px] text-white font-bold uppercase tracking-[0.3em] opacity-80 mb-0.5">Les Hôtels <br> Du Sénégal</div>
                            </div>
                        </div>
                        <div class="text-xl font-serif text-white mt-2">Le Royal Saly</div>
                    </div>
                </a>

                <!-- Pelican Card -->
                <a href="/hotel/pelican-du-saloum" class="relative overflow-hidden group border border-[#e8dedc] hover:shadow-lg transition-all md:col-span-2 min-h-[140px]">
                    <img src="{{ asset('assets/img/pelican.png') }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 brightness-75">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-4">
                        <img src="{{ asset('assets/img/logo.png') }}" class="w-8 h-8 object-contain invert mb-2">
                        <div class="text-2xl font-serif text-white drop-shadow-md">Le Pélican du Saloum</div>
                        <div class="text-[9px] text-white font-bold uppercase tracking-[0.4em] opacity-80 mt-1">Toubacouta</div>
                    </div>
                </a>

                <!-- Teranguest / Partners -->
                <div class="bg-white/50 border border-[#e8dedc] p-6 flex flex-col justify-center items-center text-center md:col-span-1 min-h-[140px]">
                    <div class="flex items-center gap-2 mb-4 text-[#a67c52]">
                        <span class="material-symbols-outlined text-lg">location_on</span>
                        <span class="text-[12px] font-bold uppercase tracking-widest italic text-[#4a3a35]">Teranguest</span>
                    </div>
                    <div class="flex flex-wrapjustify-center gap-3 items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-3.5">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-3.5">
                    </div>
                    <div class="mt-4 pt-4 border-t border-[#e8dedc]/50 w-full">
                        <p class="text-[8px] font-bold uppercase tracking-[0.2em] text-[#8c7a76] opacity-50">WIEFC . CREA 77227 . BRULAN</p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

</x-hotel-layout>