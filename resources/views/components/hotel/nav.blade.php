<nav x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="{ 'glass shadow-md py-3': scrolled, 'bg-transparent py-6': !scrolled }"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 px-6">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
            <span class="font-serif text-2xl font-bold tracking-tighter transition-colors duration-300"
                :class="scrolled ? 'text-primary-blue' : 'text-white'">
                LES HÔTELS <span class="text-primary-ochre" :class="scrolled ? '' : 'text-accent-gold'">DU
                    SÉNÉGAL</span>
            </span>
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="nav-link font-semibold uppercase text-xs tracking-widest transition-colors duration-300"
                :class="scrolled ? 'text-primary-blue' : 'text-white'">Accueil</a>
            <a href="/hotels"
                class="nav-link font-semibold uppercase text-xs tracking-widest transition-colors duration-300"
                :class="scrolled ? 'text-primary-blue' : 'text-white'">Hôtels</a>
            <a href="/offres"
                class="nav-link font-semibold uppercase text-xs tracking-widest transition-colors duration-300"
                :class="scrolled ? 'text-primary-blue' : 'text-white'">Offres</a>
            <a href="/seminaires"
                class="nav-link font-semibold uppercase text-xs tracking-widest transition-colors duration-300"
                :class="scrolled ? 'text-primary-blue' : 'text-white'">Séminaires</a>
            <a href="/contact"
                class="nav-link font-semibold uppercase text-xs tracking-widest transition-colors duration-300"
                :class="scrolled ? 'text-primary-blue' : 'text-white'">Contact</a>

            <a href="/reservations" class="btn-premium !py-2 !px-6 text-sm">Réserver</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="focus:outline-none transition-colors duration-300"
                :class="scrolled ? 'text-primary-blue' : 'text-white'">
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
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="md:hidden glass absolute top-full left-0 right-0 p-6 flex flex-col space-y-4 shadow-xl" x-cloak>
        <a href="/" class="font-semibold uppercase text-sm tracking-widest text-primary-blue">Accueil</a>
        <a href="/hotels" class="font-semibold uppercase text-sm tracking-widest text-primary-blue">Hôtels</a>
        <a href="/offres" class="font-semibold uppercase text-sm tracking-widest text-primary-blue">Offres</a>
        <a href="/seminaires" class="font-semibold uppercase text-sm tracking-widest text-primary-blue">Séminaires</a>
        <a href="/contact" class="font-semibold uppercase text-sm tracking-widest text-primary-blue">Contact</a>
        <a href="/reservations" class="btn-premium text-center">Réserver</a>
    </div>
</nav>