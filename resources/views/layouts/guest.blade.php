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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="font-sans antialiased bg-slate-950 overflow-x-hidden">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
        <div class="absolute inset-0 z-0">
            <!-- Background Image -->
            <div class="w-full h-full bg-slate-900 absolute inset-0"></div>
            <img src="/hotel_hero_background_1772394369903.png" class="w-full h-full object-cover opacity-30 blur-sm mix-blend-overlay">
        </div>

        <!-- Logo -->
        <div class="z-10 mb-8 animate-fade-in mt-10">
            <a href="/" wire:navigate class="text-[28px] font-black tracking-tighter cursor-pointer">
                <span class="text-[#f97316]">HOTEL</span><span class="text-white ml-1">ROYALE</span>
            </a>
        </div>

        <!-- Auth Card -->
        <div class="z-10 w-full sm:max-w-[420px] px-10 py-12 bg-[#c0c4cc] overflow-hidden rounded-[2.5rem] animate-fade-in shadow-2xl">
            {{ $slot }}
        </div>
    </div>
</body>

</html>