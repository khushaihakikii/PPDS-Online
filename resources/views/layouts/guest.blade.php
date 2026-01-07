<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PPDS Online') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .bg-pattern {
            background-color: #fcfcfd;
            background-image: radial-gradient(#e2e8f0 0.5px, transparent 0.5px);
            background-size: 24px 24px;
        }
        .blob-guest {
            position: absolute; width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%; z-index: -1;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-pattern text-slate-900 min-h-screen">
    
    <div class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden">
        <div class="blob-guest -top-48 -left-48 animate-pulse"></div>
        <div class="blob-guest -bottom-48 -right-48" style="animation-delay: 2s"></div>

        {{-- Logo Section --}}
        @if(isset($showLogo) && $showLogo)
            <div class="mb-8 transition-all duration-500 hover:scale-105 relative z-10">
                <a href="/" class="flex flex-col items-center gap-2">
                    <div class="p-3 bg-white shadow-xl shadow-blue-100 rounded-2xl border border-slate-100">
                        <x-application-logo class="w-12 h-12 fill-current text-blue-600" />
                    </div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">
                        PPDS<span class="text-blue-600">Online</span>
                    </span>
                </a>
            </div>
        @endif

        {{-- Slot konten utama (Halaman Login/Register) --}}
        <div class="w-full relative z-10">
            {{ $slot }}
        </div>

        {{-- Footer Simple --}}
        <div class="mt-8 text-center relative z-10">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                &copy; {{ date('Y') }} {{ config('app.name') }} &bull; Keamanan Terjamin
            </p>
        </div>
    </div>

</body>
</html>