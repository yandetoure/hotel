<?php

use function Livewire\Volt\{state, layout, computed, rules, mount};
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

layout('layouts.guest');

state([
    'step' => 1,
    'check_in' => '',
    'check_out' => '',
    'room_type_id' => null,
    'first_name' => auth()->user()?->name ? explode(' ', auth()->user()->name)[0] : '',
    'last_name' => auth()->user()?->name ? (explode(' ', auth()->user()->name)[1] ?? '') : '',
    'email' => auth()->user()?->email ?? '',
    'phone' => '',
    'selected_room_type' => null,
]);

mount(function () {
    $roomName = request()->query('room');
    if ($roomName) {
        $type = RoomType::where('name', $roomName)->first();
        if ($type) {
            $this->room_type_id = $type->id;
            $this->selected_room_type = $type;
            $this->step = 1; // Start at step 1 to pick dates
        }
    }
});

$availableRooms = computed(function () {
    if (!$this->check_in || !$this->check_out)
        return collect();

    return RoomType::with([
        'rooms' => function ($query) {
            $query->whereDoesntHave('bookings', function ($b) {
                $b->whereBetween('check_in', [$this->check_in, $this->check_out])
                    ->orWhereBetween('check_out', [$this->check_in, $this->check_out]);
            });
        }
    ])->get();
});

$nextStep = function () {
    if ($this->step == 1) {
        $this->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);
        $this->step = 2;
    } elseif ($this->step == 2) {
        $this->validate(['room_type_id' => 'required']);
        $this->selected_room_type = RoomType::find($this->room_type_id);
        $this->step = 3;
    }
};

$prevStep = function () {
    $this->step--;
};

$submit = function () {
    $this->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ]);

    DB::transaction(function () {
        $guest = Guest::firstOrCreate(
            ['email' => $this->email],
            ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'phone' => $this->phone]
        );

        $room = Room::where('room_type_id', $this->room_type_id)
            ->where('status', 'available')
            ->first();

        if (!$room) {
            throw new \Exception('Plus de chambres disponibles pour ce type.');
        }

        $days = Carbon::parse($this->check_in)->diffInDays(Carbon::parse($this->check_out));
        $total = $days * $this->selected_room_type->price_per_night;

        Booking::create([
            'guest_id' => $guest->id,
            'room_id' => $room->id,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'total_price' => $total,
            'status' => 'confirmed'
        ]);
    });

    $this->step = 4;
};

?>

<div class="animate-fade-in">
    @if($step < 4)
        <div class="flex justify-between items-center mb-12">
            @foreach([1, 2, 3] as $i)
                <div class="flex flex-col items-center">
                    <div
                        class="w-10 h-10 rounded-full flex items-center justify-center font-black text-xs {{ $step >= $i ? 'bg-amber-500 text-black shadow-lg shadow-amber-500/20' : 'bg-white/5 text-slate-500' }} transition-all duration-500">
                        {{ $i }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if($step == 1)
        <div class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-black mb-2 uppercase tracking-tighter">Dates de séjour</h2>
                <p class="text-[10px] uppercase font-bold tracking-widest text-slate-500">Quand souhaitez-vous nous
                    rejoindre ?</p>
            </div>

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <x-input-label for="check_in" value="Arrivée" />
                    <x-text-input wire:model="check_in" id="check_in" type="date" class="block mt-1 w-full" required />
                    <x-input-error :messages="$errors->get('check_in')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="check_out" value="Départ" />
                    <x-text-input wire:model="check_out" id="check_out" type="date" class="block mt-1 w-full" required />
                    <x-input-error :messages="$errors->get('check_out')" class="mt-2" />
                </div>
            </div>

            <x-primary-button wire:click="nextStep" class="w-full justify-center">
                Voir Disponibilités
            </x-primary-button>
        </div>
    @elseif($step == 2)
        <div class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-black mb-2 uppercase tracking-tighter">Choisir une Suite</h2>
                <p class="text-[10px] uppercase font-bold tracking-widest text-slate-500">Sélectionnez votre écrin de luxe
                </p>
            </div>

            <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                @foreach(App\Models\RoomType::all() as $type)
                    <div wire:click="$set('room_type_id', {{ $type->id }})"
                        class="glass p-4 rounded-2xl border-white/5 cursor-pointer transition-all hover:border-amber-500/30 flex items-center {{ $room_type_id == $type->id ? 'bg-amber-500/10 border-amber-500/50' : '' }}">
                        <img src="{{ $type->image }}" class="w-16 h-16 rounded-xl object-cover me-4">
                        <div class="flex-1">
                            <h4 class="font-black text-sm uppercase tracking-tight">{{ $type->name }}</h4>
                            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">
                                {{ $type->price_per_night }}€ / nuit
                            </p>
                        </div>
                        @if($room_type_id == $type->id)
                            <div class="text-amber-500">✨</div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="flex gap-4">
                <x-secondary-button wire:click="prevStep"
                    class="flex-1 justify-center rounded-2xl border-white/10 text-white bg-white/5 py-4">Retour</x-secondary-button>
                <x-primary-button wire:click="nextStep" class="flex-1 justify-center py-4">Suivant</x-primary-button>
            </div>
        </div>
    @elseif($step == 3)
        <div class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-black mb-2 uppercase tracking-tighter">Vos Informations</h2>
                <p class="text-[10px] uppercase font-bold tracking-widest text-slate-500">Dernière étape avant le paradis
                </p>
            </div>

            <div class="glass p-6 rounded-2xl border-amber-500/20 mb-6">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-[10px] font-bold uppercase text-slate-500 tracking-widest">Récapitulatif</span>
                    <span
                        class="text-[10px] font-black uppercase text-amber-500 tracking-widest">{{ $selected_room_type->name }}</span>
                </div>
                <div class="text-sm font-light text-slate-300">
                    Du {{ \Carbon\Carbon::parse($check_in)->format('d/m/Y') }} au
                    {{ \Carbon\Carbon::parse($check_out)->format('d/m/Y') }}
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <x-input-label for="first_name" value="Prénom" />
                    <x-text-input wire:model="first_name" id="first_name" class="block mt-1 w-full" required />
                </div>
                <div class="col-span-1">
                    <x-input-label for="last_name" value="Nom" />
                    <x-text-input wire:model="last_name" id="last_name" class="block mt-1 w-full" required />
                </div>
                <div class="col-span-2">
                    <x-input-label for="email" value="Email" />
                    <x-text-input wire:model="email" id="email" type="email" class="block mt-1 w-full" required />
                </div>
                <div class="col-span-2">
                    <x-input-label for="phone" value="Téléphone" />
                    <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" required placeholder="+33 ..." />
                </div>
            </div>

            <div class="flex gap-4">
                <x-secondary-button wire:click="prevStep"
                    class="flex-1 justify-center rounded-2xl border-white/10 text-white bg-white/5 py-4">Retour</x-secondary-button>
                <x-primary-button wire:click="submit" class="flex-1 justify-center py-4">Confirmer</x-primary-button>
            </div>
        </div>
    @elseif($step == 4)
        <div class="text-center space-y-8 py-10">
            <div
                class="w-24 h-24 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center mx-auto shadow-2xl animate-bounce">
                <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <div>
                <h2 class="text-4xl font-black mb-4 tracking-tighter uppercase">Réservation Confirmée</h2>
                <p class="text-slate-400 font-light max-w-xs mx-auto leading-relaxed">Merci pour votre confiance. Un email
                    de confirmation a été envoyé à votre adresse.</p>
            </div>

            <div class="pt-10">
                <a href="/"
                    class="text-[10px] font-black uppercase tracking-[0.3em] text-amber-500 hover:text-white transition-colors border-b border-amber-500/30 pb-2">
                    Retour à l'accueil
                </a>
            </div>
        </div>
    @endif

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(245, 158, 11, 0.3);
            border-radius: 10px;
        }
    </style>
</div>