@php
    $data = [
        'hotel_name' => 'Le Royal Saly',
        'hero_image' => asset('assets/img/hero.png'),
        'welcome_images' => [
            asset('assets/img/pelican.png'),
            asset('assets/img/nema.png'),
        ],
        'pool_images' => [
            asset('assets/img/royal.png'),
            asset('assets/img/hero.png'),
        ],
        'excursion_photos' => [
            asset('assets/img/hero.png'),
            asset('assets/img/pelican.png'),
            asset('assets/img/royal.png'),
            asset('assets/img/nema.png'),
        ],
        'activity_icons' => [
            ['label' => 'Sports Nautiques', 'icon' => '🏄'],
            ['label' => 'Excursions & Spa', 'icon' => '🌿'],
            ['label' => 'Yoga & Bien-être', 'icon' => '🍷'],
            ['label' => 'Escapade Magique', 'icon' => '⛵'],
        ],
        'bottom_icons' => [
            ['label' => 'Sports Nautiques', 'icon' => '📩'],
            ['label' => 'Petit Déjeuner Buffét', 'icon' => '🥐'],
            ['label' => 'Activités Nautiques', 'icon' => '🏖️'],
            ['label' => 'Spa & Bien-ète', 'icon' => '💆'],
        ],
        'footer_stats' => [
            ['label' => 'Navetté Aeroport', 'icon' => '✈️'],
            ['label' => 'Petit Déjeuner Buffét', 'icon' => '🥐'],
            ['label' => 'Activités Nautiques', 'icon' => '🏄'],
            ['label' => 'Spa & Bien-etre', 'icon' => '💆'],
        ],
        'welcome_stats' => [
            ['label' => '3 Piscines', 'icon' => '🏊'],
            ['label' => 'Plage Privée', 'icon' => '🌴'],
            ['label' => 'Activités Nautiques', 'icon' => '🏄'],
        ],
    ];
@endphp

<x-hotel-layout>
    @section('title', 'Activités & Découvertes - ' . $data['hotel_name'])

    <!-- Hero Section -->
    <section class="relative h-[70vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $data['hero_image'] }}" class="w-full h-full object-cover scale-105 brightness-75">
            <div class="absolute inset-0 bg-black/25"></div>
        </div>
        <div class="relative z-10 h-full flex flex-col justify-center items-start max-w-7xl mx-auto px-6 w-full">
            <h1 class="font-serif text-5xl md:text-7xl text-white mb-2 leading-tight drop-shadow-lg italic">Activités & Découvertes</h1>
            <p class="text-xl md:text-2xl text-white/90 font-light mb-10 drop-shadow-md tracking-widest">Sports • Spa • Excursions</p>
            <a href="#activites" class="px-12 py-4 bg-[#a67c52] text-white text-xs font-bold uppercase tracking-[0.3em] rounded border border-[#b08d57]/30 shadow-2xl hover:bg-[#8c6542] hover:scale-105 transition-all">
                Réserver
            </a>
        </div>
    </section>

    <!-- Welcome / Explore Section -->
    <section class="py-24 px-6 bg-[#f7f1f0] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-start">
                <!-- Left: Text + mini stats + CTA -->
                <div class="lg:w-[55%] flex flex-col justify-center">
                    <h2 class="font-serif text-4xl text-[#4a3a35] mb-8 leading-tight italic">Détendez-vous et Explorez le Sénégal</h2>
                    <p class="text-[#8c7a76] leading-relaxed mb-8 font-light">
                        Au {{ $data['hotel_name'] }}, nous offrons une large gamme d'activités pour combiner détente et découvertés. Que vous sayez en quête d'adventure, de relaxation ou d'expériences culturelles uniques, nos offres sauront satisfaier toutes vos envies. Profitez de notre spa, partez en safari, pratiquez des sports nautiques passionnants et explorez les beautés naturelles du Sénégal
                    </p>
                    <!-- Mini feature stats -->
                    <div class="flex items-center gap-0 mb-8 divide-x divide-[#e8dedc]">
                        @foreach($data['welcome_stats'] as $stat)
                            <div class="flex items-center gap-2 px-5 first:pl-0 text-[#4a3a35]">
                                <span class="text-lg">{{ $stat['icon'] }}</span>
                                <span class="text-[11px] font-bold uppercase tracking-widest italic">{{ $stat['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                    <a href="#activites" class="self-end px-10 py-3 bg-[#a67c52] text-white text-[10px] font-bold uppercase tracking-widest rounded shadow hover:bg-[#8c6542] transition-all italic">
                        Vers Activités Nautiques <span class="ml-1 opacity-70">›</span>
                    </a>
                </div>

                <!-- Right: Two stacked images -->
                <div class="lg:w-[45%] flex flex-col gap-4">
                    @foreach($data['welcome_images'] as $img)
                        <img src="{{ $img }}" class="w-full h-40 object-cover rounded shadow-md">
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Nos Piscines Section -->
    <section class="py-24 px-6 bg-[#f2e9e7] relative">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-10 items-start">
                <!-- Left: Text + left image -->
                <div class="lg:w-[45%]">
                    <h2 class="font-serif text-4xl text-[#4a3a35] mb-6 leading-tight italic">Nos Piscines</h2>
                    <p class="text-[#8c7a76] leading-relaxed mb-8 font-light">
                        Profitez de notre plage privée et essayez nos sports nautiques, tennis et activités en plein air.
                    </p>
                    <img src="{{ $data['pool_images'][0] }}" class="w-full aspect-[4/3] object-cover rounded shadow-md">
                </div>
                <!-- Right: Taller beach image -->
                <div class="lg:w-[55%] lg:mt-20">
                    <img src="{{ $data['pool_images'][1] }}" class="w-full aspect-[16/10] object-cover rounded shadow-md">
                </div>
            </div>
        </div>
    </section>

    <!-- Activity Icons Strip -->
    <section class="py-20 px-6 bg-white border-t border-[#e8dedc]">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between">
                @foreach($data['activity_icons'] as $index => $activity)
                    <div class="flex-1 flex flex-col items-center text-center px-8 py-6 {{ !$loop->last ? 'md:border-r border-[#e8dedc]' : '' }} group">
                        <div class="text-4xl mb-4 group-hover:scale-110 transition-transform duration-500 opacity-60">{{ $activity['icon'] }}</div>
                        <span class="text-[11px] font-bold uppercase tracking-widest text-[#4a3a35] max-w-[130px] leading-relaxed italic">{{ $activity['label'] }}</span>
                    </div>
                @endforeach
            </div>

            <!-- Ornamental divider -->
            <div class="flex items-center gap-4 mt-12 opacity-30">
                <div class="h-px flex-1 bg-[#a67c52]"></div>
                <span class="text-[#a67c52] text-xl">✦</span>
                <div class="h-px flex-1 bg-[#a67c52]"></div>
            </div>
        </div>
    </section>

    <!-- Réservez vos Activités Section -->
    <section id="activites" class="py-20 px-6 bg-[#f7f1f0] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <h2 class="font-serif text-4xl text-center text-[#4a3a35] mb-12 italic">Réservez vos Activités & Excursions</h2>
            <!-- 4 horizontal photos strip -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-16">
                @foreach($data['excursion_photos'] as $photo)
                    <div class="aspect-[4/3] overflow-hidden rounded shadow group">
                        <img src="{{ $photo }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                @endforeach
            </div>

            <!-- Bottom Icons Row -->
            <div class="flex flex-col md:flex-row items-center justify-between border-t border-[#e8dedc] pt-12">
                @foreach($data['bottom_icons'] as $index => $icon)
                    <div class="flex-1 flex items-center gap-3 px-6 py-4 {{ !$loop->last ? 'md:border-r border-[#e8dedc]' : '' }}">
                        <span class="text-2xl opacity-50">{{ $icon['icon'] }}</span>
                        <span class="text-[11px] font-bold uppercase tracking-widest text-[#4a3a35] italic">{{ $icon['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Branding Footer Bar -->
    <section class="py-16 px-6 bg-[#f7f1f0] relative overflow-hidden border-t border-[#e8dedc]">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');"></div>
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-stretch bg-white/40 backdrop-blur-sm border border-[#e8dedc] rounded-lg overflow-hidden shadow-sm">
                
                <!-- Left: Hotel Branding with BG -->
                <div class="lg:w-[25%] relative min-h-[160px] flex items-center p-10 overflow-hidden group">
                    <img src="{{ $data['hero_image'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 brightness-[0.7]">
                    <div class="absolute inset-0 bg-black/20"></div>
                    <div class="relative z-10 flex items-center gap-4">
                        <img src="{{ asset('assets/img/logo.png') }}" class="w-12 h-12 object-contain invert">
                        <div class="text-white">
                            <div class="text-[8px] font-bold uppercase tracking-[0.4em] mb-1 opacity-70">Les Hôtels du Sénégal</div>
                            <div class="text-2xl font-serif leading-tight drop-shadow-lg italic">{{ $data['hotel_name'] }}</div>
                        </div>
                    </div>
                </div>

                <!-- Middle: Stats Grid -->
                <div class="lg:flex-1 grid grid-cols-2 md:grid-cols-4 items-center py-8 lg:py-0">
                    @foreach($data['footer_stats'] as $stat)
                        <div class="flex flex-col items-center text-center px-4 {{ !$loop->last ? 'md:border-r border-[#e8dedc]' : '' }} group cursor-pointer">
                            <div class="text-3xl mb-3 transition-transform duration-500 group-hover:scale-110 opacity-60">{{ $stat['icon'] }}</div>
                            <div class="text-[9px] font-bold uppercase tracking-widest text-[#8c7a76] leading-[1.4] italic">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <!-- Right: Contact -->
                <div class="lg:w-[28%] p-8 flex flex-col justify-center border-l border-[#e8dedc] bg-[#fffbf9]/50">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="material-symbols-outlined text-[#a67c52] text-xl">location_on</span>
                        <span class="text-sm font-bold uppercase tracking-[0.2em] text-[#4a3a35] italic">Teranguest</span>
                    </div>
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center gap-3 text-[13px] text-[#4a3a35]">
                            <span class="material-symbols-outlined text-[#a67c52] text-sm">call</span>
                            <span class="font-light">+221 78 600 77 88</span>
                        </div>
                        <div class="flex items-center gap-3 text-[13px] text-[#4a3a35]">
                            <span class="material-symbols-outlined text-[#a67c52] text-sm">mail</span>
                            <span class="font-light truncate">info@leshotelsdusenegal.com</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 opacity-70 border-t border-[#e8dedc] pt-5">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-5">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-3">
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center text-[9px] text-[#8c7a76] uppercase tracking-[0.3em] opacity-40 italic">
                © {{ date('Y') }}. Les Hôtels du Sénégal . Tous droits réservés. Designed with 🧡 by LabelDigital
            </div>
        </div>
    </section>

</x-hotel-layout>
