@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-slate-800">
    <div class="border-b border-slate-100 pb-6 mb-8">
        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Keamanan & Integritas Autentikasi</h2>
        <p class="text-xs sm:text-sm text-slate-500 font-medium">Perbarui kata sandi berkala untuk mencegah kebocoran rekam medis antropometri.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
        @include('profil.sidebar')

        <div class="lg:col-span-3">
            <form action="#" method="POST" class="bg-white border border-slate-200/60 rounded-2xl shadow-sm overflow-hidden">
                @csrf
                <div class="p-6 space-y-6">
                    <h4 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3 tracking-tight">Modifikasi Kata Sandi</h4>
                    
                    <div class="space-y-4 max-w-xl">
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wide">Kata Sandi Saat Ini</label>
                            <input type="password" name="current_password" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition">
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wide">Kata Sandi Baru</label>
                            <input type="password" name="password" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition">
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end">
                    <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2 rounded-xl text-xs font-bold transition">Amankan Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
