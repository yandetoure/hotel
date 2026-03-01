<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-8 py-4 bg-white/5 border border-white/10 rounded-2xl font-black text-[10px] text-white uppercase tracking-[0.2em] hover:bg-white hover:text-black transition-all duration-300 shadow-lg shadow-white/5']) }}>
    {{ $slot }}
</button>