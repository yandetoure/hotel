@php
$seminarData = [
'hotel_name' => 'Le Royal Saly',
'location' => 'Saly',
'hero_image' => asset('assets/img/hero.png'),
'welcome_images' => [
'main' => asset('assets/img/royal.png'),
'small1' => asset('assets/img/hero.png'),
'small2' => asset('assets/img/pelican.png'),
],
'features' => [
'150 chambres confortables',
'Plage privée et & piscines',
'Restaurants & Bars en bord de mer',
'Activités pour toute la famille'
],
'main_offers' => [
[
'title' => 'Salles Modernes',
'description' => 'Une chambré confortablés avec temerer privés, ldbale pour es détendre apiés une joumée au soiell.',
'image' => asset('assets/img/nema.png')
],
[
'title' => 'Service Sur-Mesure',
'description' => 'Une chambre spacieuse avec baicon pricellt afirant une tve superbe sur le jarain tropical au es mer.',
'image' => asset('assets/img/hero.png')
],
[
'title' => 'Cadre Tropical',
'description' => 'Une suite élégants et spacieuse incluant un saiem, ldbale pour un sépour lur\xadquà et romantique.',
'image' => asset('assets/img/royal.png')
]
],
'prestations' => [
['label' => 'Capacité jusqu’à 100 personnes', 'icon' => '👥'],
['label' => 'Équipement de conférence moderne', 'icon' => '💻'],
['label' => 'Pauses café et restauration', 'icon' => '☕'],
['label' => 'Assistance personnalisée', 'icon' => '🤝']
],
'specific_rooms' => [
['name' => 'Salle Modigliani', 'capacity' => '100 personnes maximum', 'image' => asset('assets/img/hero.png')],
['name' => 'Salle Pagnol', 'capacity' => '60 personnes maximum', 'image' => asset('assets/img/royal.png')],
['name' => 'Salle Gauguin', 'capacity' => '30 personnes maximum', 'image' => asset('assets/img/nema.png')],
]
];
@endphp

<x-hotel-layout>
    @section('title', 'Salons & Salles de Séminaire - ' . $seminarData['hotel_name'])

    <!-- Hero Section -->
    <section class="relative h-[85vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $seminarData['hero_image'] }}"
                class="w-full h-full object-cover scale-105 animate-slow-zoom brightness-75">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="relative z-10 h-full flex flex-col justify-center items-start max-w-7xl mx-auto px-6 w-full">
            <h1 class="font-serif text-5xl md:text-7xl text-white mb-2 leading-tight drop-shadow-lg italic">Salons &
                Salles de Séminaire</h1>
            <p class="text-xl md:text-3xl text-white/90 font-light mb-10 drop-shadow-md">Organisez vos événements
                professionnels à {{ $seminarData['location'] }}</p>
            <a href="#devis"
                class="px-12 py-4 bg-[#a67c52] text-white text-xs font-bold uppercase tracking-[0.3em] rounded border border-[#b08d57]/30 shadow-2xl hover:bg-[#8c6542] hover:scale-105 transition-all">
                Réserver
            </a>
        </div>
    </section>

    <!-- Unified Welcome & Offers Section -->
    <section class="py-24 px-6 bg-[#f7f1f0] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
            style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Welcome Part -->
            <div class="flex flex-col lg:flex-row gap-16 items-start mb-24">
                <div class="lg:w-[40%]">
                    <h2 class="font-serif text-4xl text-[#4a3a35] mb-8 leading-tight italic">Organisez votre Séminaire
                        au {{ $seminarData['hotel_name'] }}</h2>
                    <p class="text-[#8c7a76] leading-relaxed mb-6 font-light">
                        Découvrez un hôtel balnéaire de charme à {{ $seminarData['location'] }}, alliant luxe et détente
                        au bord de l'océan. {{ $seminarData['hotel_name'] }} vous propose un cadre idyllique avec ses
                        chambres confortables, ses restaurants et bars en bord de mer, plusieurs piscines, son spa de
                        qualité et un large choix d'activités sénégalaise :
                    </p>
                    <div class="relative w-full h-16 pointer-events-none">
                        <svg class="absolute top-0 left-0 w-32 h-16 text-[#a67c52] opacity-40 rotate-12"
                            viewBox="0 0 120 40" fill="none" stroke="currentColor">
                            <path d="M10 30 C 40 10, 80 50, 110 10" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M105 15 L 110 10 L 105 5" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>

                <div class="lg:w-[30%] flex flex-col gap-4">
                    <img src="{{ $seminarData['welcome_images']['main'] }}"
                        class="w-full aspect-[4/5] object-cover rounded shadow-lg border-2 border-white/50">
                    <div class="grid grid-cols-2 gap-4">
                        <img src="{{ $seminarData['welcome_images']['small1'] }}"
                            class="w-full aspect-square object-cover rounded shadow-md">
                        <img src="{{ $seminarData['welcome_images']['small2'] }}"
                            class="w-full aspect-square object-cover rounded shadow-md">
                    </div>
                </div>

                <div class="lg:w-[30%] space-y-7 lg:pt-14">
                    @foreach($seminarData['features'] as $feature)
                    <div class="flex items-center gap-5 group">
                        <div
                            class="w-2.5 h-2.5 bg-[#a67c52] rotate-45 group-hover:scale-125 transition-transform duration-500 opacity-60">
                        </div>
                        <span
                            class="text-[#4a3a35] font-light tracking-wide group-hover:translate-x-2 transition-all duration-500 text-[17px] leading-tight italic">{{
                            $feature }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Offers Cards Part - Background adjustment -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($seminarData['main_offers'] as $offer)
                <div class="group bg-transparent">
                    <div class="aspect-[16/10] overflow-hidden rounded shadow-sm border border-white/50 mb-8">
                        <img src="{{ $offer['image'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="text-center px-4">
                        <h3 class="font-serif text-2xl text-[#4a3a35] mb-5 italic">{{ $offer['title'] }}</h3>
                        <p class="text-[#8c7a76] text-[15px] leading-relaxed mb-8 font-light italic opacity-80">
                            {{ $offer['description'] }}
                        </p>
                        <a href="#"
                            class="inline-block px-10 py-2.5 bg-[#a67c52] text-white text-[11px] font-bold uppercase tracking-widest rounded shadow hover:bg-[#8c6542] transition-all italic">
                            Decouvrir <span class="ml-1 opacity-70">›</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Technical Prestations -->
    <section class="py-24 px-6 bg-white relative">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-[#e8dedc] to-transparent"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <h2 class="font-serif text-4xl text-center text-[#4a3a35] mb-20 italic">Salles Équipées et Prestations de
                Qualité</h2>

            <div class="flex flex-col md:flex-row items-center justify-between gap-12 h-full">
                @foreach($seminarData['prestations'] as $index => $prestation)
                <div
                    class="flex-1 flex flex-col items-center text-center px-10 {{ !$loop->last ? 'md:border-r border-[#e8dedc]' : '' }} group">
                    <div class="text-4xl mb-8 group-hover:scale-110 transition-transform duration-500 opacity-60">{{
                        $prestation['icon'] }}</div>
                    <span
                        class="text-[11px] font-bold uppercase tracking-widest text-[#4a3a35] max-w-[150px] leading-relaxed italic">{{
                        $prestation['label'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Specific Rooms Catalog -->
    <section id="devis" class="py-24 px-6 bg-[#f7f1f0] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
            style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($seminarData['specific_rooms'] as $room)
                <div
                    class="group bg-white/40 backdrop-blur-sm rounded border border-white/50 shadow-sm overflow-hidden flex flex-col">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ $room['image'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="p-10 text-center flex-1 flex flex-col">
                        <h3 class="font-serif text-2xl text-[#4a3a35] mb-3 italic">{{ $room['name'] }}</h3>
                        <p class="text-[#b08d57] text-[10px] font-bold uppercase tracking-[0.4em] mb-8 italic">{{
                            $room['capacity'] }}</p>
                        <div class="mt-auto">
                            <a href="#"
                                class="inline-block w-full py-4 bg-[#a67c52] text-white text-[11px] font-bold uppercase tracking-widest rounded shadow-md hover:bg-[#8c6542] transition-all italic">
                                Demande de Devis
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Horizontal Branding Footer -->
    <section class="py-12 border-t border-[#e8dedc] bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="flex items-center gap-6">
                    <img src="{{ asset('assets/img/logo.png') }}" class="h-14 opacity-90">
                    <div class="h-10 w-px bg-gray-200 hidden md:block"></div>
                    <div class="font-serif text-2xl text-[#4a3a35] italic">{{ $seminarData['hotel_name'] }}</div>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-x-12 gap-y-6">
                    <div class="flex items-center gap-3 text-sm text-[#4a3a35]">
                        <span class="material-symbols-outlined text-[#a67c52] text-sm">call</span>
                        <span class="font-light">+221 78 600 77 88</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-[#4a3a35]">
                        <span class="material-symbols-outlined text-[#a67c52] text-sm">mail</span>
                        <span class="font-light">info@leshotelsdusenegal.com</span>
                    </div>
                </div>

                <div class="flex items-center gap-4 opacity-50 grayscale hover:grayscale-0 transition-all">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-5">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-3">
                </div>
            </div>

            <div class="mt-12 text-center text-[10px] text-[#8c7a76] uppercase tracking-widest opacity-40 italic">
                © {{ date('Y') }}. Les Hôtels du Sénégal . Tous droits réservés. . Designed with 🧡 by LabelDigital
            </div>
        </div>
    </section>

</x-hotel-layout>