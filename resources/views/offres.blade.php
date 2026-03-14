<x-hotel-layout>
    @section('title', 'Offres & Packages - Les Hôtels du Sénégal Group')

    <!-- Header Section -->
    <section class="pt-40 pb-20 px-6 bg-primary-blue text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <h1 class="font-serif text-5xl md:text-6xl mb-6">Offres & Packages</h1>
            <p class="text-xl opacity-80 max-w-2xl">
                Profitez de nos offres exclusives pour des séjours inoubliables au Sénégal. Détente, aventure ou
                romantisme, trouvez le package qui vous ressemble.
            </p>
        </div>
        <div class="absolute top-0 right-0 w-1/3 h-full bg-accent-gold/10 -skew-x-12 transform translate-x-20"></div>
    </section>

    <!-- Offers Grid -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">

            @forelse($roomTypes as $categorie => $types)
                <div class="mb-20">
                    <h2 class="font-serif text-3xl text-primary-blue mb-10 pb-4 border-b border-gray-100">{{ $categorie }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                        @foreach($types as $type)
                        <div class="group bg-sand-light rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                            <div class="h-64 overflow-hidden relative bg-gray-100">
                                @if($type->image)
                                    <img src="{{ asset('storage/' . $type->image) }}" alt="{{ $type->name }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-50">
                                        <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke-width="1.5"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-6 left-6 bg-accent-gold text-white px-4 py-2 rounded-full font-bold text-sm tracking-widest uppercase">
                                    {{ $type->capacity }} pers.
                                </div>
                            </div>
                            <div class="p-8">
                                <h3 class="font-serif text-2xl text-primary-blue mb-3">{{ $type->name }}</h3>
                                @if($type->description)
                                    <p class="text-gray-600 mb-6 leading-relaxed text-sm line-clamp-3">{{ $type->description }}</p>
                                @endif
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-xs uppercase tracking-widest font-bold text-gray-400 block mb-1">À partir de</span>
                                        <span class="text-xl font-bold text-primary-blue">{{ number_format($type->price_per_night, 0, ',', ' ') }} FCFA <span class="text-sm font-normal">/ nuit</span></span>
                                    </div>
                                    <a href="{{ route('booking.form') }}?type={{ $type->id }}" class="btn-premium">RÉSERVER</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center py-24">
                    <p class="text-gray-400 text-lg font-light">Aucune offre disponible pour le moment.</p>
                </div>
            @endforelse

        </div>
    </section>

    <!-- Promo Code Section -->
    <section class="py-20 px-6 bg-primary-ochre text-white text-center rounded-t-[4rem]">
        <div class="max-w-4xl mx-auto">
            <h2 class="font-serif text-4xl mb-6">Vous avez un code promo ?</h2>
            <p class="text-xl opacity-90 mb-10">Utilisez-le lors de votre réservation pour bénéficier de réductions supplémentaires.</p>
            <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                <input type="text" placeholder="Entrez votre code"
                    class="bg-white/20 border border-white/30 rounded-lg py-4 px-8 text-white placeholder-white/60 focus:bg-white/30 outline-none w-full md:w-80">
                <button class="bg-white text-primary-ochre px-10 py-4 rounded-lg font-bold hover:bg-accent-gold hover:text-white transition-all">APPLIQUER</button>
            </div>
        </div>
    </section>
</x-hotel-layout>