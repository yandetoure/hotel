@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'p-4 rounded-2xl glass border-amber-500/20 text-[10px] font-bold uppercase tracking-widest text-amber-500 mb-6']) }}>
        {{ $status }}
    </div>
@endif