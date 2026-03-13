<nav x-data="{ mobileMenuOpen: false }"
    class="sticky top-0 z-[100] bg-white border-b border-[#e8dedc] shadow-sm py-4 px-6 transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-4 group">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"
                class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-110">
            <span class="font-serif text-xl tracking-wide text-[#4a3a35] whitespace-nowrap">
                LES HÔTELS <span class="text-[#a67c52] italic">DU SÉNÉGAL</span>
            </span>
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex items-center gap-8">
            <a href="{{ route('home') }}"
                class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Accueil</a>
            <a href="{{ route('hotels.index') }}"
                class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Chambres & Suites</a>
            <a href="#"
                class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Restaurant & Bars</a>
            <a href="#"
                class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Activités</a>
            <a href="{{ route('seminaires') }}"
                class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Événements</a>
            <a href="{{ route('galerie') }}"
                class="text-[11px] font-bold uppercase tracking-widest text-[#8c7a76] hover:text-[#a67c52] transition-colors italic">Galerie</a>
        </div>

        <!-- Right Actions -->
        <div class="flex items-center gap-4">
            <div class="hidden lg:flex items-center gap-4">
                <div class="text-[9px] font-bold text-[#b08d57] uppercase tracking-widest border-r border-[#e8dedc] pr-4 flex items-center gap-1">
                    FR <span class="material-symbols-outlined text-[12px]">expand_more</span>
                </div>
                <a href="/reservations"
                    class="px-7 py-2.5 bg-[#a67c52] text-white text-[10px] font-bold uppercase tracking-widest rounded hover:bg-[#8c6542] transition-all shadow">
                    Réserver
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden text-[#4a3a35] focus:outline-none">
                <span class="material-symbols-outlined" x-text="mobileMenuOpen ? 'close' : 'menu'">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden absolute top-full left-0 right-0 bg-white border-t border-[#e8dedc] p-6 flex flex-col space-y-4 shadow-lg">
        <a href="{{ route('home') }}"
            class="font-bold uppercase text-xs tracking-widest text-[#8c7a76] hover:text-[#a67c52] py-2 italic">Accueil</a>
        <a href="{{ route('hotels.index') }}"
            class="font-bold uppercase text-xs tracking-widest text-[#8c7a76] hover:text-[#a67c52] py-2 italic">Chambres & Suites</a>
        <a href="#"
            class="font-bold uppercase text-xs tracking-widest text-[#8c7a76] hover:text-[#a67c52] py-2 italic">Restaurant & Bars</a>
        <a href="#"
            class="font-bold uppercase text-xs tracking-widest text-[#8c7a76] hover:text-[#a67c52] py-2 italic">Activités</a>
        <a href="{{ route('seminaires') }}"
            class="font-bold uppercase text-xs tracking-widest text-[#8c7a76] hover:text-[#a67c52] py-2 italic">Événements</a>
        <a href="{{ route('galerie') }}"
            class="font-bold uppercase text-xs tracking-widest text-[#8c7a76] hover:text-[#a67c52] py-2 italic">Galerie</a>
        <a href="/reservations"
            class="bg-[#a67c52] text-white text-center py-4 rounded font-bold uppercase text-xs tracking-widest shadow">Réserver</a>
    </div>
</nav>