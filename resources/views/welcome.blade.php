<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PPDS Online - Platform Pendaftaran Sekolah Online Modern">

    <title>PPDS Online - Modern & Responsif</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; overflow-x: hidden; }
        .glass { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
        .blob {
            position: absolute; width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.15) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%; z-index: -1;
        }
        @media (min-width: 1024px) { .blob { width: 600px; height: 600px; } }
    </style>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body class="bg-[#fcfcfd] text-slate-900 antialiased selection:bg-blue-100 selection:text-blue-700">
    
    <div class="blob top-[-5%] left-[-10%] animate-pulse"></div>
    <div class="blob bottom-[10%] right-[-10%]"></div>

    <nav class="fixed top-0 w-full z-50 glass border-b border-slate-100/50">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 h-16 md:h-20 flex items-center justify-between">
            <div class="text-xl md:text-2xl font-extrabold tracking-tight text-slate-900">
                PPDS<span class="text-blue-600">Online</span>
            </div>
            
            <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                {{-- <a href="#" class="hover:text-blue-600 transition-colors">Beranda</a> --}}
                <a href="{{ route('login') }}" class="hover:text-blue-600 transition-colors">Masuk</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-2.5 rounded-full hover:bg-blue-700 transition-all shadow-md shadow-blue-200">Daftar Sekarang</a>
            </div>

            <div class="md:hidden">
                <a href="{{ route('login') }}" class="text-sm font-bold text-blue-600 px-4 py-2 border border-blue-100 rounded-lg bg-blue-50">Masuk</a>
            </div>
        </div>
    </nav>

    <main class="relative pt-24 pb-12 md:pt-40 md:pb-24 px-5 sm:px-8 max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
        
        <div class="w-full lg:w-1/2 space-y-6 md:space-y-8 text-center lg:text-left order-2 lg:order-1">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-[10px] md:text-xs font-bold uppercase tracking-wider mx-auto lg:mx-0">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                Pendaftaran TA 2025/2026 Dibuka
            </div>
            
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold text-slate-900 leading-[1.15] tracking-tight">
                Masa Depan <br class="hidden sm:block"> 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-500">Pendaftaran Sekolah</span>
            </h1>
            
            <p class="text-base md:text-lg lg:text-xl text-slate-500 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                Platform satu pintu untuk pendaftaran sekolah yang lebih cepat, transparan, dan terpercaya bagi seluruh orang tua dan calon siswa.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center lg:justify-start pt-4 px-4 sm:px-0">
                <a href="{{ route('register') }}"
                    class="group inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all bg-blue-600 rounded-2xl hover:bg-blue-700 hover:shadow-xl hover:-translate-y-1">
                    Daftar Akun Baru
                </a>
                <a href="#alur"
                    class="inline-flex items-center justify-center px-8 py-4 font-bold text-slate-600 transition-all border-2 border-slate-200 rounded-2xl hover:bg-slate-50 hover:border-slate-300">
                    Lihat Panduan
                </a>
            </div>

            <div class="pt-8 grid grid-cols-2 md:grid-cols-3 gap-6 border-t border-slate-100 max-w-md mx-auto lg:mx-0">
                <div class="text-center lg:text-left">
                    <div class="text-xl md:text-2xl font-bold text-slate-900 uppercase">10k+</div>
                    <div class="text-[10px] md:text-xs text-slate-400 font-bold uppercase tracking-widest">Siswa</div>
                </div>
                <div class="text-center lg:text-left">
                    <div class="text-xl md:text-2xl font-bold text-slate-900 uppercase">500+</div>
                    <div class="text-[10px] md:text-xs text-slate-400 font-bold uppercase tracking-widest">Sekolah</div>
                </div>
                <div class="text-center lg:text-left col-span-2 md:col-span-1 border-t md:border-t-0 pt-4 md:pt-0 border-slate-50">
                    <div class="text-xl md:text-2xl font-bold text-slate-900 uppercase">100%</div>
                    <div class="text-[10px] md:text-xs text-slate-400 font-bold uppercase tracking-widest">Online</div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 order-1 lg:order-2">
            <div class="relative w-full max-w-[320px] sm:max-w-[450px] lg:max-w-none mx-auto">
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                
                <div class="relative bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2rem] sm:rounded-[3rem] shadow-2xl p-8 sm:p-12 text-white overflow-hidden group">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="bg-white/10 p-4 rounded-2xl mb-6 backdrop-blur-md group-hover:scale-110 transition-transform">
                            <svg class="w-12 h-12 md:w-16 md:h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold mb-2">Simpel & Praktis</h3>
                        <p class="text-blue-100 text-xs md:text-sm leading-relaxed opacity-80">
                            Unggah dokumen, pilih sekolah favorit, dan pantau status seleksi secara real-time dari genggaman Anda.
                        </p>
                    </div>
                </div>

                {{-- <div class="absolute -bottom-5 sm:-bottom-10 -right-2 sm:-right-8 glass p-4 rounded-2xl shadow-xl flex items-center gap-3 border border-white/50 hidden sm:flex">
                    <div class="h-10 w-10 bg-blue-600 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-tight text-left">Status Akun</div>
                        <div class="text-xs font-bold text-slate-800">Dokumen Terverifikasi</div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>

    <footer class="w-full bg-white border-t border-slate-100 px-5 py-8 md:py-12 mt-auto">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
            <div class="text-sm font-medium text-slate-400 order-2 md:order-1">
                &copy; {{ date('Y') }} <span class="text-slate-900 font-bold">PPDS Online</span>. 
            </div>
            <div class="flex flex-wrap justify-center gap-4 md:gap-8 text-[13px] font-bold text-slate-500 order-1 md:order-2">
                <a href="#" class="hover:text-blue-600">Panduan</a>
                <a href="#" class="hover:text-blue-600">Kebijakan</a>
                <a href="#" class="hover:text-blue-600">Hubungi Kami</a>
            </div>
        </div>
    </footer>

    <style>
        @keyframes blob {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
    </style>
</body>

</html>