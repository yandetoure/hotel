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

<div class="animate-fade-in">
    <div class="text-center mb-10">
        <h2 class="text-2xl font-black tracking-tight mb-2">Bienvenue</h2>
        <p class="text-slate-500 text-[10px] uppercase font-bold tracking-widest">Connectez-vous à votre espace privé
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-6">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autofocus autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <x-input-label for="password" :value="__('Mot de passe')" class="mb-0" />
                @if (Route::has('password.request'))
                    <a class="text-[9px] font-bold uppercase tracking-widest text-amber-500/80 hover:text-amber-500 transition-colors"
                        href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Oublié ?') }}
                    </a>
                @endif
            </div>

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember" class="inline-flex items-center cursor-pointer group">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded-lg bg-white/5 border-white/10 text-amber-500 shadow-sm focus:ring-amber-500 focus:ring-offset-0 transition-all cursor-pointer"
                    name="remember">
                <span
                    class="ms-3 text-[10px] font-bold uppercase tracking-widest text-slate-500 group-hover:text-slate-300 transition-colors">{{ __('Rester connecté') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center">
                {{ __('Se Connecter') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-6 border-t border-white/5">
            <p class="text-[10px] font-bold uppercase tracking-widest text-slate-500">
                Pas encore de compte ?
                <a href="{{ route('register') }}" wire:navigate
                    class="text-amber-500 hover:text-amber-400 transition-colors ml-1">
                    Créer un compte
                </a>
            </p>
        </div>
    </form>
</div>