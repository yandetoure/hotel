{{-- Composant formulaire type de chambre, inclus par create et edit --}}
<div x-data="{
    category: '{{ old('category', $roomType->category ?? 'Chambre') }}',
    imagePreview: null,
    categories: [
        { value: 'Chambre',               icon: 'bed',          label: 'Chambre' },
        { value: 'Suite',                 icon: 'king_bed',     label: 'Suite' },
        { value: 'Suite Présidentielle',  icon: 'diamond',      label: 'Suite Présidentielle' },
        { value: 'Salle de Séminaire',    icon: 'meeting_room', label: 'Salle de Séminaire' },
        { value: 'Appartement',           icon: 'apartment',    label: 'Appartement' },
        { value: 'Bungalow',              icon: 'cottage',      label: 'Bungalow' },
        { value: 'Villa',                 icon: 'villa',        label: 'Villa' },
    ],
    handleImageChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => { this.imagePreview = e.target.result; };
            reader.readAsDataURL(file);
        }
    }
}" class="space-y-6">

    {{-- Catégorie --}}
    <div class="space-y-3">
        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Catégorie</label>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
            <template x-for="cat in categories" :key="cat.value">
                <button type="button"
                    @click="category = cat.value"
                    :class="category === cat.value
                        ? 'border-amber-500/60 bg-amber-500/10 text-amber-400 shadow-lg shadow-amber-500/10'
                        : 'border-white/10 bg-slate-900 text-slate-500 hover:border-white/20 hover:text-slate-300'"
                    class="flex flex-col items-center gap-2 p-4 rounded-2xl border text-xs font-bold transition-all">
                    <span class="material-symbols-outlined text-2xl" x-text="cat.icon"></span>
                    <span x-text="cat.label" class="text-center leading-tight"></span>
                </button>
            </template>
        </div>
        <input type="hidden" name="category" :value="category">
    </div>

    {{-- Nom --}}
    <div class="space-y-2">
        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Nom du type <span class="text-red-500">*</span></label>
        <input type="text" name="name"
               value="{{ old('name', $roomType->name ?? '') }}"
               placeholder="Ex: Suite Deluxe, Chambre Standard, Salle Conférence..."
               class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
    </div>

    {{-- Description --}}
    <div class="space-y-2">
        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Description</label>
        <textarea name="description" rows="4"
                  placeholder="Décrivez les caractéristiques, équipements, vue, services inclus..."
                  class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all resize-none">{{ old('description', $roomType->description ?? '') }}</textarea>
    </div>

    {{-- Prix & Capacité --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-2">
            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Prix / Nuit (FCFA) <span class="text-red-500">*</span></label>
            <div class="relative">
                <input type="number" name="price_per_night"
                       value="{{ old('price_per_night', $roomType->price_per_night ?? '') }}"
                       placeholder="75000"
                       min="0" step="500"
                       class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 pl-6 pr-20 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs font-bold">FCFA</span>
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Capacité <span class="text-red-500">*</span></label>
            <div class="relative">
                <input type="number" name="capacity"
                       value="{{ old('capacity', $roomType->capacity ?? 1) }}"
                       placeholder="2"
                       min="1" max="500"
                       class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 pl-6 pr-24 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs font-bold">pers.</span>
            </div>
        </div>
    </div>

    {{-- Image --}}
    <div class="space-y-3">
        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Photo principale</label>

        {{-- Image actuelle si édition --}}
        @if(isset($roomType) && $roomType->image)
            <div class="relative w-full h-56 rounded-2xl overflow-hidden border border-white/10" x-show="!imagePreview">
                <img src="{{ asset('storage/' . $roomType->image) }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <span class="absolute bottom-3 left-4 text-[10px] font-bold text-white/60 uppercase tracking-widest">Image actuelle</span>
            </div>
        @endif

        {{-- Prévisualisation nouvelle image --}}
        <div x-show="imagePreview" class="relative w-full h-56 rounded-2xl overflow-hidden border border-amber-500/30">
            <img :src="imagePreview" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <span class="absolute bottom-3 left-4 text-[10px] font-bold text-amber-400 uppercase tracking-widest">Nouvelle image</span>
        </div>

        {{-- Upload zone --}}
        <label class="flex flex-col items-center justify-center w-full h-36 rounded-2xl border border-dashed border-white/20 bg-slate-900 hover:border-amber-500/50 hover:bg-amber-500/5 transition-all cursor-pointer group">
            <input type="file" name="image" accept="image/*" class="hidden" @change="handleImageChange($event)">
            <span class="material-symbols-outlined text-4xl text-slate-600 group-hover:text-amber-500/60 mb-2 transition-colors">add_photo_alternate</span>
            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Cliquer pour choisir</span>
            <span class="text-[9px] text-slate-600 mt-1">JPEG, PNG, WEBP — max 4 Mo</span>
        </label>
    </div>

</div>
