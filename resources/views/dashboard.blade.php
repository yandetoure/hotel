<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-white leading-tight tracking-tight animate-fade-in">
            {{ __('Tableau de Bord') }}
        </h2>
        <p class="text-[10px] font-bold uppercase tracking-[0.3em] text-amber-500 mt-2">Bienvenue dans votre espace privilégié</p>
    </x-slot>

    <div class="space-y-12">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-fade-in">
            @foreach([
                ['label' => 'Réservations Actives', 'value' => '0', 'icon' => '📅', 'color' => 'from-amber-500 to-orange-600'],
                ['label' => 'Points Fidélité', 'value' => '150', 'icon' => '✨', 'color' => 'from-blue-500 to-indigo-600'],
                ['label' => 'Messages Concierge', 'value' => '2', 'icon' => '🔔', 'color' => 'from-emerald-500 to-teal-600']
            ] as $stat)
                <div class="glass p-8 rounded-[2.5rem] border-white/5 group hover:bg-white/5 transition-all duration-500">
                    <div class="flex justify-between items-start mb-6">
                        <div class="p-4 rounded-2xl bg-gradient-to-br {{ $stat['color'] }} shadow-lg">
                            <span class="text-2xl">{{ $stat['icon'] }}</span>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500 group-hover:text-amber-500 transition-colors">Détails →</span>
                    </div>
                    <h3 class="text-4xl font-black text-white mb-1 tracking-tighter">{{ $stat['value'] }}</h3>
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Main Content Area -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-fade-in" style="animation-delay: 0.2s">
            <!-- Recent Activity -->
            <div class="lg:col-span-2 glass rounded-[3rem] border-white/5 overflow-hidden">
                <div class="p-8 border-b border-white/5 flex justify-between items-center">
                    <h4 class="text-xl font-black tracking-tight">Activités Récentes</h4>
                    <button class="text-[9px] font-black uppercase tracking-widest text-amber-500 hover:text-white transition-colors">Voir tout</button>
                </div>
                <div class="p-8">
                    <div class="flex flex-col items-center justify-center py-20 text-center">
                        <div class="text-6xl mb-6 opacity-20">📭</div>
                        <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">Aucune activité récente pour le moment</p>
                        <p class="text-[10px] text-slate-600 mt-2 max-w-xs">Vos réservations et interactions s'afficheront ici au fur et à mesure.</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="space-y-8">
                <div class="glass p-10 rounded-[3rem] border-white/5 bg-gradient-to-br from-white/5 to-transparent">
                    <h4 class="text-xl font-black tracking-tight mb-8">Actions Rapides</h4>
                    <div class="space-y-4">
                        <a href="/" class="flex items-center p-4 rounded-2xl bg-white/5 hover:bg-white hover:text-black transition-all group">
                            <span class="text-xl me-4">🏨</span>
                            <span class="text-[10px] font-black uppercase tracking-widest">Réserver une suite</span>
                        </a>
                        <a href="#" class="flex items-center p-4 rounded-2xl bg-white/5 hover:bg-amber-500 hover:text-black transition-all group">
                            <span class="text-xl me-4">🛎️</span>
                            <span class="text-[10px] font-black uppercase tracking-widest">Appeler Concierge</span>
                        </a>
                    </div>
                </div>

                <!-- Ad/Promo -->
                <div class="relative rounded-[3.5rem] overflow-hidden group h-64 shadow-2xl">
                    <img src="/suite_royale.png" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-125">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                    <div class="absolute bottom-10 left-10 right-10">
                        <h5 class="text-2xl font-black mb-1">Offre VIP</h5>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-amber-400">-20% sur la Suite Royale</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
