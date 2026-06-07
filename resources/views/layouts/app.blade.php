<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriTrack - Pantau Gizi Anak, Bangun Generasi Sehat</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#0F172A',     /* Slate 900 premium */
                            darker: '#020617',   /* Slate 950 untuk kedalaman efek */
                            accent: '#10B981',   /* Emerald Hijau Logo */
                            glow: '#34D399'      /* Hijau Terang untuk Efek Sorotan */
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800 print:bg-white select-none">

    <div class="flex h-screen overflow-hidden relative">
        
        <aside class="w-66 bg-gradient-to-b from-brand-dark via-slate-900 to-brand-darker text-white flex flex-col shadow-2xl relative z-20 print:hidden border-r border-slate-800">
            <div class="absolute top-0 left-0 right-0 h-44 bg-gradient-to-b from-brand-accent/10 to-transparent blur-2xl pointer-events-none"></div>

            <div class="flex items-center gap-4 px-6 py-7 border-b border-slate-800 relative z-10">
                <div class="w-14 h-14 bg-white rounded-2xl p-2.5 flex items-center justify-center shadow-xl shadow-brand-accent/20 ring-4 ring-brand-accent/25 transition-all duration-500 hover:scale-110 hover:rotate-3 flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo NutriTrack" class="max-h-full max-w-full object-contain filter drop-shadow">
                </div>
                
                <div class="flex flex-col">
                    <span class="text-2xl font-black tracking-tight text-white leading-none">
                        Nutri<span class="text-brand-accent drop-shadow-[0_0_10px_rgba(16,185,129,0.6)]">Track</span>
                    </span>
                    <span class="text-[9px] text-slate-400 font-bold tracking-widest uppercase mt-2 flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 bg-brand-accent rounded-full animate-pulse"></span> Monitoring
                    </span>
                </div>
            </div>
            
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto relative z-10">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 text-xs font-bold uppercase tracking-wider {{ Request::is('dashboard') ? 'bg-brand-accent text-slate-950 shadow-lg shadow-brand-accent/20 border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }} rounded-xl transition-all duration-300 group">
                    <i class="fa-solid fa-chart-pie text-sm {{ Request::is('dashboard') ? 'text-slate-950' : 'text-slate-500 group-hover:text-brand-accent' }} transition-colors"></i> Dashboard
                </a>
                
                <a href="{{ url('/peserta') }}" class="flex items-center gap-3.5 px-4 py-3 text-xs font-bold uppercase tracking-wider {{ Request::is('peserta*') ? 'bg-brand-accent text-slate-950 shadow-lg shadow-brand-accent/20 border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }} rounded-xl transition-all duration-300 group">
                    <i class="fa-solid fa-users text-sm {{ Request::is('peserta*') ? 'text-slate-950' : 'text-slate-500 group-hover:text-brand-accent' }} transition-colors"></i> Data Peserta
                </a>
                
                <a href="{{ url('/hitung-bmi') }}" class="flex items-center gap-3.5 px-4 py-3 text-xs font-bold uppercase tracking-wider {{ Request::is('hitung-bmi') ? 'bg-brand-accent text-slate-950 shadow-lg shadow-brand-accent/20 border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }} rounded-xl transition-all duration-300 group">
                    <i class="fa-solid fa-calculator text-sm {{ Request::is('hitung-bmi') ? 'text-slate-950' : 'text-slate-500 group-hover:text-brand-accent' }} transition-colors"></i> Hitung BMI
                </a>
                
                <a href="{{ url('/laporan') }}" class="flex items-center gap-3.5 px-4 py-3 text-xs font-bold uppercase tracking-wider {{ Request::is('laporan') ? 'bg-brand-accent text-slate-950 shadow-lg shadow-brand-accent/20 border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }} rounded-xl transition-all duration-300 group">
                    <i class="fa-solid fa-file-invoice text-sm {{ Request::is('laporan') ? 'text-slate-950' : 'text-slate-500 group-hover:text-brand-accent' }} transition-colors"></i> Laporan
                </a>
            </nav>
            
            <div class="p-4 border-t border-slate-800/60 text-[10px] text-slate-500 text-center font-bold tracking-widest uppercase relative z-10">
                &copy; 2026 NutriTrack
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-y-auto bg-[#F8FAFC]">
            
            <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-100 px-8 py-4 flex justify-between items-center sticky top-0 z-30 print:hidden">
                <h1 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-brand-accent"></span>
                    @if(Request::is('dashboard')) Ringkasan Analisis Gizi @endif
                    @if(Request::is('peserta*')) Manajemen Data Anak @endif
                    @if(Request::is('hitung-bmi')) Input Pemeriksaan Antropometri @endif
                    @if(Request::is('laporan')) Rekapitulasi Laporan Bulanan @endif
                    @if(Request::is('profil*')) Pengaturan Akun Petugas @endif
                </h1>
                
                <div class="flex items-center">
                    <a href="{{ route('profil.index') }}" title="Buka Profil & Pengaturan" class="flex items-center gap-3 p-2 pr-4 bg-slate-50 hover:bg-slate-100/80 border border-slate-100 rounded-2xl transition-all duration-300 group ring-1 ring-transparent hover:ring-brand-accent/20">
                        
                        <div class="w-10 h-10 bg-gradient-to-tr from-brand-accent to-teal-500 text-slate-950 rounded-xl flex items-center justify-center font-black shadow-md shadow-brand-accent/15 group-hover:scale-105 transition-all duration-300 overflow-hidden">
                            @if(Auth::check() && Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar Header" class="w-full h-full object-cover">
                            @else
                                <span class="uppercase">
                                    {{ Auth::check() ? substr(Auth::user()->name, 0, 1) : 'N' }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="flex flex-col hidden sm:flex">
                            <span class="font-bold text-xs text-slate-800 group-hover:text-brand-accent transition-colors leading-tight">
                                {{ Auth::check() ? Auth::user()->name : 'Guest User' }}
                            </span>
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-0.5 flex items-center gap-1">
                                {{ Auth::check() ? (Auth::user()->role ?? 'Petugas Gizi') : 'Petugas Gizi' }} <i class="fa-solid fa-chevron-right text-[8px] text-slate-300 group-hover:text-brand-accent transition-colors"></i>
                            </span>
                        </div>
                    </a>
                </div>
            </header>

            <main class="p-6 sm:p-8 w-full print:p-0 print:m-0">
                @yield('content')
            </main>
            
        </div>
    </div>

    @stack('scripts')
</body>
</html>