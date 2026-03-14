<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="animate-fade-in font-sans">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-black tracking-tight mb-3 text-white drop-shadow-sm">Bienvenue</h2>
        <p class="text-[#516374] text-[10px] uppercase font-bold tracking-[0.15em]">Connectez-vous à votre espace privé</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-5">
        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-bold uppercase tracking-widest text-[#819ab0] mb-2">{{ __('Email') }}</label>
            <input wire:model="form.email" id="email" class="block w-full bg-[#e8eef4] border-none text-[#1e293b] focus:ring-2 focus:ring-[#f97316] rounded-xl px-5 py-3.5 placeholder-[#94a3b8] transition-all" type="email" name="email" required autofocus autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="pt-2">
            <div class="flex justify-between items-center mb-2">
                <label for="password" class="block text-[10px] font-bold uppercase tracking-widest text-[#819ab0] mb-0">{{ __('Mot de passe') }}</label>
                @if (Route::has('password.request'))
                    <a class="text-[9px] font-bold uppercase tracking-widest text-[#ea580c] hover:text-[#c2410c] transition-colors" href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Oublié ?') }}
                    </a>
                @endif
            </div>

            <input wire:model="form.password" id="password" class="block w-full bg-black/5 border border-[#ea580c] text-white focus:ring-2 focus:ring-[#ea580c] rounded-xl px-5 py-3.5 placeholder-white/50 transition-all font-mono" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center pt-2">
            <label for="remember" class="inline-flex items-center cursor-pointer group">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded-full w-4 h-4 bg-white/40 border-none text-[#ea580c] focus:ring-[#ea580c] focus:ring-offset-0 transition-all cursor-pointer shadow-inner" name="remember">
                <span class="ms-3 text-[10px] font-bold uppercase tracking-widest text-[#516374] group-hover:text-[#334155] transition-colors">{{ __('Rester connecté') }}</span>
            </label>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full justify-center bg-[#ea580c] hover:bg-[#c2410c] text-black font-black uppercase tracking-[0.2em] text-[11px] py-4 rounded-xl transition-all shadow-lg active:scale-95 text-center">
                {{ __('Se Connecter') }}
            </button>
        </div>

        <div class="text-center pt-8 border-t border-black/5 mt-4">
            <p class="text-[9px] font-bold uppercase tracking-widest text-[#516374]">
                Pas encore de compte ? 
                <a href="{{ route('register') }}" wire:navigate class="text-[#ea580c] hover:text-[#c2410c] transition-colors ml-1">
                    Créer un compte
                </a>
            </p>
        </div>
    </form>
</div>