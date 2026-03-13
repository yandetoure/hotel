<nav x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="{ 'bg-[#1A3C5A] shadow-lg py-3': scrolled, 'bg-transparent py-6': !scrolled }"
    class="fixed top-0 left-0 right-0 z-[100] transition-all duration-300 px-6">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-4 group">
            <!-- Icon/Illustration -->
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"
                class="h-12 md:h-16 w-auto transition-all duration-300 transform group-hover:scale-110 object-contain"
                style="filter: drop-shadow(0 0 10px rgba(212, 175, 55, 0.2));">

            <!-- Single Line Text -->
            <span
                class="font-serif text-xl md:text-2xl font-bold tracking-tighter transition-colors duration-300 whitespace-nowrap"
                :class="scrolled ? 'text-white' : 'text-white drop-shadow-md'">
                LES HÔTELS <span class="text-accent-gold italic">DU SÉNÉGAL</span>
            </span>
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="/"
                class="text-xs uppercase tracking-widest font-bold transition-all duration-300 hover:text-accent-gold text-white drop-shadow-md">Accueil</a>
            <a href="/hotels"
                class="text-xs uppercase tracking-widest font-bold transition-all duration-300 hover:text-accent-gold text-white drop-shadow-md">Chambres & Suites</a>
            <a href="#"
                class="text-xs uppercase tracking-widest font-bold transition-all duration-300 hover:text-accent-gold text-white drop-shadow-md">Restaurant & Bars</a>
            <a href="#"
                class="text-xs uppercase tracking-widest font-bold transition-all duration-300 hover:text-accent-gold text-white drop-shadow-md">Activités</a>
            <a href="/seminaires"
                class="text-xs uppercase tracking-widest font-bold transition-all duration-300 hover:text-accent-gold text-white drop-shadow-md">Événements</a>
            <a href="/galerie"
                class="text-xs uppercase tracking-widest font-bold transition-all duration-300 hover:text-accent-gold text-white drop-shadow-md">Galerie</a>

            <a href="/reservations"
                class="bg-primary-ochre text-white px-8 py-3 rounded-md text-xs uppercase tracking-widest font-bold hover:bg-accent-gold transition-all shadow-lg active:scale-95">
                Réserver
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="lg:hidden flex items-center">
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="text-white focus:outline-none bg-black/20 p-2 rounded-lg backdrop-blur-sm">
                <svg x-show="!mobileMenuOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg x-show="mobileMenuOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden absolute top-full left-0 right-0 bg-[#1A3C5A] p-6 flex flex-col space-y-4 shadow-xl border-t border-white/10">
        <a href="/"
            class="font-bold uppercase text-xs tracking-widest text-white hover:text-accent-gold py-2">Accueil</a>
        <a href="/hotels"
            class="font-bold uppercase text-xs tracking-widest text-white hover:text-accent-gold py-2">Chambres & Suites</a>
        <a href="#"
            class="font-bold uppercase text-xs tracking-widest text-white hover:text-accent-gold py-2">Restaurant & Bars</a>
        <a href="#"
            class="font-bold uppercase text-xs tracking-widest text-white hover:text-accent-gold py-2">Activités</a>
        <a href="/seminaires"
            class="font-bold uppercase text-xs tracking-widest text-white hover:text-accent-gold py-2">Événements</a>
        <a href="/galerie"
            class="font-bold uppercase text-xs tracking-widest text-white hover:text-accent-gold py-2">Galerie</a>
        <a href="/reservations"
            class="bg-primary-ochre text-white text-center py-4 rounded-md font-bold uppercase text-xs tracking-widest shadow-lg">Réserver
            maintenant</a>
    </div>
</nav>