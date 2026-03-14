<footer>
    <!-- Top Info Bar: Hotel name + services + contacts -->
    <div class="bg-[#f7f1f0] border-t border-[#e8dedc] py-6 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <!-- Hotel Name -->
                <div class="flex items-center gap-3 shrink-0">
                    <img src="{{ asset('assets/img/logo.png') }}" class="h-10 w-auto opacity-80">
                    <div class="leading-tight">
                        <div class="text-[9px] font-bold uppercase tracking-[0.2em] text-[#8c7a76]">Les Hôtels du Sénégal</div>
                        <div class="font-serif text-[#4a3a35] text-sm italic">Le Royal Saly</div>
                    </div>
                </div>

                <!-- Services Strip -->
                <div class="flex flex-wrap justify-center gap-x-8 gap-y-2 text-[11px] text-[#4a3a35] font-light tracking-wide">
                    <span class="flex items-center gap-1.5">✈️ <span>Navette Aéroport</span></span>
                    <span class="flex items-center gap-1.5">🥐 <span>Petit Déjeuner Buffet</span></span>
                    <span class="flex items-center gap-1.5">🏄 <span>Activités Nautiques</span></span>
                    <span class="flex items-center gap-1.5">💆 <span>Spa & Bien-être</span></span>
                </div>

                <!-- Contacts -->
                <div class="flex flex-wrap gap-6 text-[11px] text-[#4a3a35] shrink-0">
                    <div class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[#a67c52] text-sm">location_on</span>
                        <span class="italic font-medium">Teranguest</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[#a67c52] text-sm">call</span>
                        <span>+221 78 600 77 88</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[#a67c52] text-sm">mail</span>
                        <span>info@leshotelsdusenegal.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright stripe -->
    <div class="bg-[#ede6e2] border-t border-[#e8dedc] py-2 px-6 text-center text-[9px] text-[#8c7a76] tracking-widest uppercase">
        © {{ date('Y') }}. Les Hôtels du Sénégal . Tous droits réservés. Designed with 🧡 by LabelDigital
    </div>

    <!-- Main Footer Body -->
    <div class="bg-primary-blue text-white pt-16 pb-10 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 mb-16 border-b border-white/10 pb-16">
            <!-- Brand -->
            <div class="col-span-1 md:col-span-1">
                <a href="/" class="flex items-center space-x-3 mb-8 group">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"
                        class="h-12 w-auto brightness-110 object-contain">
                    <span class="font-serif text-lg font-bold tracking-tighter whitespace-nowrap">
                        LES HÔTELS <span class="text-primary-ochre italic">DU SÉNÉGAL</span>
                    </span>
                </a>
                <p class="text-white/70 text-sm leading-relaxed mb-6">
                    Trois destinations d'exception au Sénégal pour une expérience authentique et luxueuse.
                </p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-accent-gold hover:border-accent-gold transition-all">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3V2z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-accent-gold hover:border-accent-gold transition-all">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M7 2h10a5 5 0 015 5v10a5 5 0 01-5 5H7a5 5 0 01-5-5V7a5 5 0 015-5zm0 2a3 3 0 00-3 3v10a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H7zm10.35 2.65a.65.65 0 11.001 1.3.65.65 0 01-.001-1.3zM12 7a5 5 0 110 10 5 5 0 010-10zm0 2a3 3 0 100 6 3 3 0 000-6z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Destinations -->
            <div>
                <h4 class="font-serif text-xl mb-6">Nos Destinations</h4>
                <ul class="space-y-4 text-sm text-white/70">
                    <li><a href="/hotel/pelican-du-saloum" class="hover:text-accent-gold transition-colors">Pélican du Saloum</a></li>
                    <li><a href="/hotel/nema-kadior" class="hover:text-accent-gold transition-colors">Néma Kadior</a></li>
                    <li><a href="/hotel/royal-saly" class="hover:text-accent-gold transition-colors">Royal Saly</a></li>
                </ul>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-serif text-xl mb-6">Liens Rapides</h4>
                <ul class="space-y-4 text-sm text-white/70">
                    <li><a href="/hotels" class="hover:text-accent-gold transition-colors">Nos Hôtels</a></li>
                    <li><a href="/offres" class="hover:text-accent-gold transition-colors">Offres Spéciales</a></li>
                    <li><a href="/seminaires" class="hover:text-accent-gold transition-colors">Séminaires</a></li>
                    <li><a href="/contact" class="hover:text-accent-gold transition-colors">Contact</a></li>
                    <li><a href="/reservations" class="hover:text-accent-gold transition-colors">Réserver</a></li>
                </ul>
            </div>

            <!-- Contact & Payment -->
            <div>
                <h4 class="font-serif text-xl mb-6">Contact</h4>
                <p class="text-sm text-white/70 mb-2">Contact@hotels-senegal.sn</p>
                <p class="text-sm text-white/70 mb-8">+221 33 000 00 00</p>

                <h4 class="font-serif text-sm uppercase tracking-widest mb-4 border-t border-white/10 pt-6 text-accent-gold">
                    Paiement sécurisé</h4>
                <div class="flex items-center gap-4 opacity-60 hover:opacity-100 transition-all">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-3 invert">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-4 invert">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto text-center text-white/40 text-xs">
            &copy; {{ date('Y') }} Les Hôtels du Sénégal Group. Tous droits réservés.
        </div>
    </div>
</footer>