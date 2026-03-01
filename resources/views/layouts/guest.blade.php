<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="font-sans text-white antialiased bg-slate-950 overflow-x-hidden">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
        <div class="absolute inset-0 z-0">
            <img src="/hotel_hero_background_1772394369903.png" class="w-full h-full object-cover opacity-20 blur-sm">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/50 to-slate-950"></div>
        </div>

        <div class="z-10 mb-8 animate-fade-in">
            <a href="/" wire:navigate class="text-3xl font-black tracking-tighter">
                <span class="text-gradient">HOTEL</span> ROYALE
            </a>
        </div>

        <div
            class="z-10 w-full sm:max-w-md mt-6 px-10 py-12 glass overflow-hidden sm:rounded-[2.5rem] border-white/10 animate-fade-in shadow-2xl">
            {{ $slot }}
        </div>
    </div>
</body>

</html>