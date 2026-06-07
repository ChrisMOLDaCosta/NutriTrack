<div class="lg:col-span-1 bg-white p-4 rounded-2xl border border-slate-200/60 shadow-sm space-y-1">
    <!-- Profil Pengguna -->
    <a href="{{ route('profil.index') }}" 
       class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('profil.index') ? 'bg-slate-900 text-white font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-semibold' }} rounded-xl text-xs transition">
        <i class="fa-solid fa-user-gear text-sm"></i> Profil Pengguna
    </a>
    
    <!-- Detail Institusi -->
    <a href="{{ route('profil.institusi') }}" 
       class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('profil.institusi') ? 'bg-slate-900 text-white font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-semibold' }} rounded-xl text-xs transition">
        <i class="fa-solid fa-building-shield text-sm"></i> Detail Institusi
    </a>
    
    <!-- Keamanan Akun -->
    <a href="{{ route('profil.keamanan') }}" 
       class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('profil.keamanan') ? 'bg-slate-900 text-white font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-semibold' }} rounded-xl text-xs transition">
        <i class="fa-solid fa-shield-halved text-sm"></i> Keamanan Akun
    </a>
    
    <!-- Notifikasi Log -->
    <a href="{{ route('profil.notifikasi') }}" 
       class="flex items-center gap-3 px-4 py-2.5 {{ request()->routeIs('profil.notifikasi') ? 'bg-slate-900 text-white font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800 font-semibold' }} rounded-xl text-xs transition">
        <i class="fa-solid fa-bell text-sm"></i> Notifikasi Log
    </a>
</div>