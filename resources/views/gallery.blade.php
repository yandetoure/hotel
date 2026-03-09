<x-hotel-layout>
    <div class="pt-32 pb-20 px-6 bg-[#0F2A43]">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-6xl font-serif font-bold text-white mb-4">Notre <span
                        class="text-accent-gold italic">Galerie</span></h1>
                <p class="text-gray-300 max-w-2xl mx-auto uppercase tracking-widest text-sm">Découvrez l'élégance et le
                    confort de nos établissements à travers nos plus beaux clichés.</p>
                <div class="w-24 h-1 bg-accent-gold mx-auto mt-6"></div>
            </div>

            @foreach($gallery as $hotelName => $images)
                <div class="mb-20">
                    <div class="flex items-center gap-4 mb-8">
                        <h2 class="text-2xl md:text-3xl font-serif font-bold text-white whitespace-nowrap">{{ $hotelName }}
                        </h2>
                        <div class="h-px bg-white/20 w-full"></div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($images as $image)
                            <div class="group relative aspect-square overflow-hidden rounded-lg cursor-pointer"
                                onclick="openLightbox('{{ asset($image) }}', '{{ $hotelName }}')">
                                <img src="{{ asset($image) }}" alt="{{ $hotelName }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div
                                    class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-white transform scale-50 group-hover:scale-100 transition-transform duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Lightbox -->
    <div id="lightbox" class="fixed inset-0 z-[1000] bg-black/95 hidden flex-col items-center justify-center p-4">
        <button onclick="closeLightbox()"
            class="absolute top-8 right-8 text-white/70 hover:text-white transition-colors">
            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="relative w-full max-w-5xl flex items-center justify-center">
            <!-- Navigation Arrows -->
            <button onclick="prevImage()"
                class="absolute left-0 -ml-4 md:-ml-12 text-white/50 hover:text-white transition-colors p-4 group">
                <svg class="w-12 h-12 transform group-hover:-translate-x-1 transition-transform" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[85vh] object-contain shadow-2xl rounded">

            <button onclick="nextImage()"
                class="absolute right-0 -mr-4 md:-mr-12 text-white/50 hover:text-white transition-colors p-4 group">
                <svg class="w-12 h-12 transform group-hover:translate-x-1 transition-transform" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <div id="lightbox-caption" class="mt-6 text-white text-lg font-serif italic text-accent-gold"></div>
    </div>

    <script>
        let currentImages = [];
        let currentIndex = 0;

        function openLightbox(src, hotel) {
            const lightbox = document.getElementById('lightbox');
            const img = document.getElementById('lightbox-img');
            const caption = document.getElementById('lightbox-caption');

            // Collect all images in all sections
            const allImages = Array.from(document.querySelectorAll('img[alt]')).filter(i => i.id !== 'lightbox-img');
            currentImages = allImages.map(i => ({ src: i.src, hotel: i.alt }));
            currentIndex = currentImages.findIndex(i => i.src === src);

            img.src = src;
            caption.innerText = hotel;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % currentImages.length;
            updateLightbox();
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
            updateLightbox();
        }

        function updateLightbox() {
            const img = document.getElementById('lightbox-img');
            const caption = document.getElementById('lightbox-caption');
            img.src = currentImages[currentIndex].src;
            caption.innerText = currentImages[currentIndex].hotel;
        }

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
        });

        // Close on background click
        document.getElementById('lightbox').addEventListener('click', (e) => {
            if (e.target.id === 'lightbox' || e.target.tagName === 'DIV') {
                // Check if it's the wrapper or the background
                if (e.target === document.getElementById('lightbox')) {
                    closeLightbox();
                }
            }
        });
    </script>

    <style>
        .text-accent-gold {
            color: #C5A059;
        }

        .bg-accent-gold {
            background-color: #C5A059;
        }
    </style>
</x-hotel-layout>