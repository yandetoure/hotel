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
            <div class="absolute inset-0 bg-black/40 xl:bg-gradient-to-r from-black/70 to-transparent"></div>
        </div>
        <div class="relative z-10 h-full flex flex-col justify-center items-start max-w-7xl mx-auto px-6 w-full">
            <h1 class="font-serif text-5xl md:text-[5.5rem] text-white mb-4 leading-tight drop-shadow-lg">Salons & Salles de Séminaire</h1>
            <p class="text-xl md:text-3xl text-white/90 font-light mb-12 drop-shadow-md">Organisez vos événements professionnels à {{ $seminarData['location'] }}</p>
            <a href="#devis"
                class="px-10 py-3 bg-[#9c7b54]/90 text-white text-xl font-light rounded-sm border border-[#ceb096] shadow-xl hover:bg-[#866644] hover:scale-[1.02] transition-all">
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
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-start mb-16">
                <div class="lg:w-3/5">
                    <h2 class="font-serif text-4xl lg:text-5xl text-[#3b2f2f] mb-8 leading-tight">Organisez votre Séminaire au {{ $seminarData['hotel_name'] }}</h2>
                    <div class="text-[#4a3a35] text-[18px] leading-relaxed font-light mt-4">
                        Découvrez un hôtel balnéaire de charme à {{ $seminarData['location'] }}, alliant luxe et détente au bord de l'océan, Le {{ $seminarData['hotel_name'] }} vous propose un cadre idyllique avec ses chambres confortables, ses restaurants et bars en bord de mer, plusieurs piscines, son spa de qualité et un large choix d'activités sénégalaise:
                        <span class="inline-block align-middle ml-2 opacity-60">
                            <svg class="w-8 h-8 text-[#a67c52]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 4C12 4 9 10 5 12C9 14 12 20 12 20C12 20 15 14 19 12C15 10 12 4 12 4Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18 18C18 18 16 20 14 21" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="lg:w-2/5 space-y-6 lg:pt-16">
                    @foreach($seminarData['features'] as $feature)
                    <div class="flex items-center gap-4 group">
                        <svg class="w-4 h-4 text-[#a67c52]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 2L22 12L12 22L2 12L12 2Z" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                        <span class="text-[#3b2f2f] font-light tracking-wide text-[18px]">{{ $feature }}</span>
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

            @if($salles->isEmpty())
                <div class="text-center py-20">
                    <p class="text-[#8c7a76] text-lg font-light italic">Aucune salle de séminaire disponible pour le moment.</p>
                </div>
            @else
                <h2 class="font-serif text-4xl text-center text-[#4a3a35] mb-16 italic">Nos Salles de Séminaire</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    @foreach($salles as $salle)
                    <div class="group bg-white/40 backdrop-blur-sm rounded border border-white/50 shadow-sm overflow-hidden flex flex-col">
                        <div class="aspect-[16/10] overflow-hidden bg-[#e8dedc]">
                            @if($salle->image)
                                <img src="{{ asset('storage/' . $salle->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-[#c4a882] opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5z" stroke-width="1.5"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-10 text-center flex-1 flex flex-col">
                            <h3 class="font-serif text-2xl text-[#4a3a35] mb-3 italic">{{ $salle->name }}</h3>
                            <p class="text-[#b08d57] text-[10px] font-bold uppercase tracking-[0.4em] mb-3 italic">
                                Jusqu'à {{ $salle->capacity }} personnes
                            </p>
                            @if($salle->description)
                                <p class="text-[#8c7a76] text-sm leading-relaxed mb-6 font-light italic opacity-80 line-clamp-3">
                                    {{ $salle->description }}
                                </p>
                            @endif
                            <p class="text-[#4a3a35] font-bold text-lg mb-6">
                                {{ number_format($salle->price_per_night, 0, ',', ' ') }} FCFA <span class="text-[11px] font-normal text-[#8c7a76]">/ jour</span>
                            </p>
                            <div class="mt-auto">
                                <a href="{{ route('contact') }}"
                                    class="inline-block w-full py-4 bg-[#a67c52] text-white text-[11px] font-bold uppercase tracking-widest rounded shadow-md hover:bg-[#8c6542] transition-all italic">
                                    Demande de Devis
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>


</x-hotel-layout>