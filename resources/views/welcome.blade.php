<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Hotel Royale') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-slate-950 text-white overflow-x-hidden">
    <!-- Navigation -->
    <nav
        class="fixed w-full z-50 px-6 py-4 flex justify-between items-center glass-dark mt-4 mx-auto max-w-7xl rounded-2xl left-1/2 -translate-x-1/2">
        <div class="text-2xl font-bold tracking-tighter">
            <span class="text-gradient">HOTEL</span> ROYALE
        </div>
        <div class="hidden md:flex space-x-8 text-sm font-medium">
            <a href="#" class="hover:text-amber-400 transition-colors tracking-widest uppercase text-[10px]">Accueil</a>
            <a href="#"
                class="hover:text-amber-400 transition-colors tracking-widest uppercase text-[10px]">Chambres</a>
            <a href="#"
                class="hover:text-amber-400 transition-colors tracking-widest uppercase text-[10px]">Services</a>
            <a href="#" class="hover:text-amber-400 transition-colors tracking-widest uppercase text-[10px]">A
                Propos</a>
        </div>
        <div class="flex items-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-2 rounded-full border border-amber-500/50 hover:bg-amber-500/10 transition-all text-xs font-bold uppercase tracking-widest">Tableau
                        de bord</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-[10px] font-bold uppercase tracking-widest hover:text-amber-400 transition-colors">Connexion</a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2.5 rounded-full bg-gradient-to-r from-amber-500 to-orange-600 text-black text-xs font-black uppercase tracking-widest hover:scale-105 transition-all shadow-lg shadow-amber-500/20">Réserver</a>
                @endauth
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Using the generated image path correctly -->
            <img src="/hotel_hero_background_1772394369903.png" alt="Hero Background"
                class="w-full h-full object-cover opacity-60 scale-105 animate-float">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-slate-950/60 to-slate-950"></div>
        </div>

        <div class="relative z-10 text-center px-4 max-w-4xl animate-fade-in">
            <div
                class="inline-block px-4 py-1.5 rounded-full glass border-white/10 text-amber-500 text-[10px] font-black uppercase tracking-[0.3em] mb-8">
                Bienvenue au Sommet du Luxe
            </div>
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-black mb-8 leading-tight tracking-tighter">
                L'Élégance <br> <span class="text-gradient">Absolue</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-300 mb-12 max-w-2xl mx-auto font-light leading-relaxed">
                Vivez une expérience sensorielle inoubliable au cœur d'un écrin de raffinement et de sérénité.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <button
                    class="w-full sm:w-auto px-10 py-5 bg-white text-black font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-amber-400 transition-all transform hover:-translate-y-1 shadow-2xl">
                    Découvrir nos suites
                </button>
                <button
                    class="w-full sm:w-auto px-10 py-5 glass text-white font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-white/10 transition-all border-white/20">
                    Visite virtuelle
                </button>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce opacity-50 flex flex-col items-center">
            <span class="text-[8px] uppercase tracking-[0.5em] mb-2 font-bold">Scroll</span>
            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 px-6 max-w-7xl mx-auto -mt-32 relative z-20">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([['icon' => '🏨', 'label' => 'Suites Luxe', 'value' => '45+'], ['icon' => '🌟', 'label' => 'Note Clients', 'value' => '4.9/5'], ['icon' => '🌊', 'label' => 'Piscines', 'value' => '3'], ['icon' => '👨‍🍳', 'label' => 'Chefs Étoilés', 'value' => '5']] as $stat)
                <div
                    class="glass p-10 rounded-[2rem] text-center group hover:bg-white/5 transition-all hover:border-amber-500/30">
                    <div class="text-4xl mb-6 transform group-hover:scale-125 transition-transform duration-500">
                        {{ $stat['icon'] }}</div>
                    <div class="text-4xl font-black mb-2 text-gradient tracking-tight">{{ $stat['value'] }}</div>
                    <div class="text-slate-400 text-[9px] uppercase tracking-[0.2em] font-bold">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Rooms Section -->
    <section class="py-32 px-6 max-w-7xl mx-auto">
        <div class="text-center mb-20 animate-fade-in">
            <h2 class="text-amber-500 font-black tracking-[0.4em] mb-4 text-[10px] uppercase">Hébergements d'Exception
            </h2>
            <h3 class="text-4xl md:text-6xl font-black tracking-tight mb-6">Nos Chambres & <span
                    class="text-gradient">Suites</span></h3>
            <p class="text-slate-400 max-w-2xl mx-auto font-light">Chaque espace est une invitation au voyage, mêlant
                authenticité et modernité pour un séjour inoubliable.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
                $rooms = [
                    [
                        'name' => 'Suite Royale',
                        'price' => '850',
                        'image' => '/suite_royale.png',
                        'tag' => 'Le Sommet du Luxe',
                        'size' => '120m²',
                        'view' => 'Vue Océan'
                    ],
                    [
                        'name' => 'Chambre Deluxe',
                        'price' => '450',
                        'image' => '/chambre_deluxe.png',
                        'tag' => 'Élégance Moderne',
                        'size' => '45m²',
                        'view' => 'Vue Panoramique'
                    ],
                    [
                        'name' => 'Suite Junior',
                        'price' => '600',
                        'image' => '/suite_junior.png',
                        'tag' => 'Confort & Sérénité',
                        'size' => '75m²',
                        'view' => 'Côté Jardin'
                    ]
                ];
            @endphp

            @foreach($rooms as $room)
                <div
                    class="group relative bg-slate-900 rounded-[2.5rem] overflow-hidden border border-white/5 hover:border-amber-500/30 transition-all duration-500 shadow-2xl">
                    <!-- Image Container -->
                    <div class="relative h-80 overflow-hidden">
                        <img src="{{ $room['image'] }}" alt="{{ $room['name'] }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-60">
                        </div>
                        <div class="absolute top-6 left-6">
                            <span
                                class="px-4 py-1.5 rounded-full glass border-white/10 text-[9px] font-black uppercase tracking-widest text-amber-400">
                                {{ $room['tag'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-2xl font-black tracking-tight mb-1">{{ $room['name'] }}</h4>
                                <div class="flex space-x-3 text-[10px] text-slate-500 font-bold uppercase tracking-wider">
                                    <span>{{ $room['size'] }}</span>
                                    <span class="text-amber-500/30">•</span>
                                    <span>{{ $room['view'] }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm text-slate-500 block">À partir de</span>
                                <span class="text-2xl font-black text-gradient">{{ $room['price'] }}€</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-2 mb-8">
                            @foreach(['📶 Wifi', '❄️ Clim', '☕ Safe'] as $amenity)
                                <div
                                    class="text-[9px] font-bold py-2 px-1 rounded-xl bg-white/5 text-center text-slate-400 uppercase tracking-tighter">
                                    {{ $amenity }}
                                </div>
                            @endforeach
                        </div>

                        <button
                            class="w-full py-4 bg-white/5 hover:bg-white text-white hover:text-black font-black uppercase tracking-widest text-[10px] rounded-2xl transition-all duration-300 transform group-hover:-translate-y-1">
                            Réserver cette Suite
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-32 px-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row items-end justify-between mb-20 gap-8">
            <div class="max-w-xl">
                <h2 class="text-amber-500 font-black tracking-[0.4em] mb-4 text-[10px] uppercase">Services Exclusifs
                </h2>
                <h3 class="text-4xl md:text-6xl font-black tracking-tight leading-none">Un séjour conçu pour votre <span
                        class="italic text-slate-600">confort absolu</span></h3>
            </div>
            <div class="h-px bg-slate-800 flex-grow mx-8 hidden lg:block"></div>
            <p class="text-slate-400 max-w-xs text-sm font-light leading-relaxed">
                Chaque détail de notre établissement est méticuleusement pensé pour vous offrir une parenthèse enchantée
                et mémorable.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <!-- Service 1 -->
            <div
                class="group relative rounded-[3rem] overflow-hidden aspect-[4/5] glass border-white/5 hover:border-amber-500/20 transition-all duration-700">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80 group-hover:opacity-60 transition-opacity">
                </div>
                <div class="relative p-10 h-full flex flex-col justify-end">
                    <div class="w-12 h-px bg-amber-500 mb-6 group-hover:w-full transition-all duration-700"></div>
                    <h4 class="text-3xl font-black mb-4 tracking-tight">Spa & Bien-être</h4>
                    <p
                        class="text-slate-400 text-sm opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                        Relâchez toutes vos tensions dans notre centre de relaxation haut de gamme.
                    </p>
                </div>
            </div>
            <!-- Service 2 -->
            <div
                class="group relative rounded-[3rem] overflow-hidden aspect-[4/5] bg-gradient-to-br from-amber-500 to-orange-600 text-black transform lg:-translate-y-8 shadow-2xl shadow-amber-500/10">
                <div class="p-10 h-full flex flex-col justify-end">
                    <div class="w-12 h-px bg-black/30 mb-6 group-hover:w-full transition-all duration-700"></div>
                    <h4 class="text-3xl font-black mb-4 tracking-tight">Gastronomie</h4>
                    <p class="text-black/80 text-sm font-bold uppercase tracking-wider">
                        Une fusion de saveurs locales et internationales préparée par nos chefs étoilés.
                    </p>
                </div>
            </div>
            <!-- Service 3 -->
            <div
                class="group relative rounded-[3rem] overflow-hidden aspect-[4/5] glass border-white/5 hover:border-amber-500/20 transition-all duration-700">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80 group-hover:opacity-60 transition-opacity">
                </div>
                <div class="relative p-10 h-full flex flex-col justify-end">
                    <div class="w-12 h-px bg-amber-500 mb-6 group-hover:w-full transition-all duration-700"></div>
                    <h4 class="text-3xl font-black mb-4 tracking-tight">Conciergerie</h4>
                    <p
                        class="text-slate-400 text-sm opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                        Notre service premium est à votre disposition 24h/24 pour satisfaire tous vos désirs.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-40 relative overflow-hidden">
        <div class="absolute inset-0 bg-amber-500 opacity-[0.02] transform -skew-y-6 scale-150"></div>
        <div class="max-w-5xl mx-auto px-6 text-center animate-fade-in relative z-10">
            <h2 class="text-4xl md:text-6xl font-black mb-10 tracking-tight text-gradient">Évadez-vous Vers l'Excellence
            </h2>
            <p class="text-slate-400 text-lg mb-12 max-w-2xl mx-auto font-light">
                Réservez dès maintenant et profitez de tarifs exclusifs pour votre prochain séjour inoubliable.
            </p>
            <div class="flex justify-center">
                <a href="{{ route('register') }}"
                    class="px-12 py-6 bg-gradient-to-r from-amber-500 to-orange-600 text-black font-black uppercase tracking-widest text-sm rounded-2xl hover:scale-110 hover:-rotate-1 transition-all shadow-2xl shadow-amber-500/20">
                    Commencer ma réservation
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-24 border-t border-white/5 bg-slate-950">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-12">
            <div class="text-3xl font-black tracking-tighter">
                <span class="text-gradient">HOTEL</span> ROYALE
            </div>
            <div class="flex space-x-12 text-xs font-bold uppercase tracking-widest text-slate-500">
                <a href="#" class="hover:text-amber-500 transition-colors">Instagram</a>
                <a href="#" class="hover:text-amber-500 transition-colors">Facebook</a>
                <a href="#" class="hover:text-amber-500 transition-colors">Concierge</a>
            </div>
            <p class="text-slate-600 text-[10px] uppercase font-bold tracking-[0.2em]">© 2026 Hotel Royale — Innovebox
            </p>
        </div>
    </footer>
</body>

</html>