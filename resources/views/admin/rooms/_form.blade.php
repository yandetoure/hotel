{{-- Composant formulaire partagé pour les chambres --}}
<div class="space-y-6">

    {{-- Numéro de chambre --}}
    <div class="space-y-2">
        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Numéro de Chambre <span class="text-red-500">*</span></label>
        <input type="text" name="room_number"
               value="{{ old('room_number', $room->room_number ?? '') }}"
               placeholder="Ex: 101, 202, Penthouse..."
               class="w-full bg-slate-900 border-white/10 rounded-2xl py-4 px-6 text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
    </div>

    {{-- Type de chambre --}}
    <div class="space-y-2">
        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Type de Chambre <span class="text-red-500">*</span></label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            @foreach($roomTypes as $type)
                <label class="relative cursor-pointer group">
                    <input type="radio" name="room_type_id" value="{{ $type->id }}"
                           class="peer hidden"
                           {{ old('room_type_id', $room->room_type_id ?? '') == $type->id ? 'checked' : '' }}>
                    <div class="flex items-center gap-4 p-4 rounded-2xl border border-white/10 bg-slate-900
                                peer-checked:border-amber-500/60 peer-checked:bg-amber-500/10
                                hover:border-white/20 transition-all">
                        @if($type->image)
                            <img src="{{ asset('storage/' . $type->image) }}" class="w-14 h-12 rounded-xl object-cover border border-white/10 flex-shrink-0">
                        @else
                            <div class="w-14 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-slate-600 text-xl">bed</span>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <div class="font-bold text-sm text-white truncate">{{ $type->name }}</div>
                            <div class="text-[9px] text-slate-500 uppercase tracking-widest">{{ $type->category }} · {{ $type->capacity }} pers.</div>
                            <div class="text-amber-500 font-black text-xs mt-0.5">{{ number_format($type->price_per_night, 0, ',', ' ') }} FCFA/nuit</div>
                        </div>
                        <span class="material-symbols-outlined text-amber-500 opacity-0 peer-checked:opacity-100 transition-opacity flex-shrink-0">check_circle</span>
                    </div>
                </label>
            @endforeach
        </div>
    </div>

    {{-- Status --}}
    <div class="space-y-3">
        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Statut <span class="text-red-500">*</span></label>
        <div class="grid grid-cols-3 gap-3">
            @php
                $statuses = [
                    'available'   => ['label' => 'Disponible',  'icon' => 'check_circle',  'color' => 'emerald'],
                    'occupied'    => ['label' => 'Occupée',     'icon' => 'person',         'color' => 'orange'],
                    'maintenance' => ['label' => 'Maintenance', 'icon' => 'build',          'color' => 'red'],
                ];
                $currentStatus = old('status', $room->status ?? 'available');
            @endphp
            @foreach($statuses as $val => $s)
                <label class="cursor-pointer">
                    <input type="radio" name="status" value="{{ $val }}" class="peer hidden"
                           {{ $currentStatus === $val ? 'checked' : '' }}>
                    <div class="flex flex-col items-center gap-2 py-4 px-3 rounded-2xl border border-white/10 bg-slate-900
                                peer-checked:border-{{ $s['color'] }}-500/50 peer-checked:bg-{{ $s['color'] }}-500/10
                                hover:border-white/20 transition-all text-center">
                        <span class="material-symbols-outlined text-2xl text-{{ $s['color'] }}-400">{{ $s['icon'] }}</span>
                        <span class="text-xs font-bold text-white">{{ $s['label'] }}</span>
                    </div>
                </label>
            @endforeach
        </div>
    </div>

    {{-- Image --}}
    <div x-data="{
        imagePreview: null,
        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => { this.imagePreview = e.target.result; };
                reader.readAsDataURL(file);
            }
        }
    }" class="space-y-3">
        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Photo de la chambre</label>

        @if(isset($room) && $room->image)
            <div class="relative w-full h-48 rounded-2xl overflow-hidden border border-white/10" x-show="!imagePreview">
                <img src="{{ asset('storage/' . $room->image) }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <span class="absolute bottom-3 left-4 text-[10px] font-bold text-white/60 uppercase tracking-widest">Image actuelle</span>
            </div>
        @endif

        <div x-show="imagePreview" class="relative w-full h-48 rounded-2xl overflow-hidden border border-amber-500/30">
            <img :src="imagePreview" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <span class="absolute bottom-3 left-4 text-[10px] font-bold text-amber-400 uppercase tracking-widest">Nouvelle image</span>
        </div>

        <label class="flex flex-col items-center justify-center w-full h-32 rounded-2xl border border-dashed border-white/20 bg-slate-900 hover:border-amber-500/50 hover:bg-amber-500/5 transition-all cursor-pointer group">
            <input type="file" name="image" accept="image/*" class="hidden" @change="handleImageChange($event)">
            <span class="material-symbols-outlined text-3xl text-slate-600 group-hover:text-amber-500/60 mb-2 transition-colors">add_photo_alternate</span>
            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Cliquer pour choisir une image</span>
            <span class="text-[9px] text-slate-600 mt-1">JPEG, PNG, WEBP — max 4 Mo</span>
        </label>
    </div>

</div>
