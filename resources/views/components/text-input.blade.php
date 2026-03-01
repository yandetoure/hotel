@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-white/5 border-white/10 text-white focus:border-amber-500/50 focus:ring-amber-500/50 rounded-2xl shadow-sm placeholder-slate-500 transition-all duration-300 backdrop-blur-sm']) }}>