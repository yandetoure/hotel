@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-amber-500 text-[10px] font-black uppercase tracking-[0.2em] text-white leading-5 focus:outline-none transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-white hover:border-white/10 leading-5 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>