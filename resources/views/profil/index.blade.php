@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-slate-800">
    <div class="border-b border-slate-100 pb-6 mb-8">
        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Pengaturan Akun & Kredensial</h2>
        <p class="text-xs sm:text-sm text-slate-500 font-medium">Kelola informasi data diri, email log sistem, dan otorisasi kontrol akses Anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
        <!-- Panggil Navigasi Kiri -->
        @include('profil.sidebar')

        <!-- Konten Kanan -->
        <div class="lg:col-span-3 space-y-6">
            <div class="bg-white border border-slate-200/60 rounded-2xl shadow-sm p-6">
                <div class="flex flex-col sm:flex-row items-center gap-5">
                    <div class="relative flex-shrink-0">
                        <div class="w-20 h-20 bg-slate-100 rounded-2xl border border-slate-200 flex items-center justify-center text-3xl font-black text-slate-700 shadow-inner">C</div>
                        <span class="absolute -bottom-1 -right-1 bg-emerald-500 border-2 border-white w-4 h-4 rounded-full shadow-sm animate-pulse"></span>
                    </div>
                    <div class="text-center sm:text-left space-y-1 truncate">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                            <h3 class="text-lg font-black text-slate-900 tracking-tight">Chris & Aldy (ITN Malang)</h3>
                            <span class="inline-flex self-center bg-slate-900 text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md">Administrator</span>
                        </div>
                        <p class="text-xs text-slate-400 font-mono">ID Operator: NT-2026-90396</p>
                    </div>
                </div>
            </div>

            <form action="#" method="POST" class="bg-white border border-slate-200/60 rounded-2xl shadow-sm overflow-hidden">
                @csrf
                <div class="p-6 space-y-6">
                    <h4 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3 tracking-tight">Informasi Dasar Kredensial</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wide">Nama Lengkap</label>
                            <input type="text" name="name" value="Chris" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition">
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wide">Alamat Email Resmi</label>
                            <input type="email" name="email" value="chris@itnmalang.ac.id" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition">
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wide">Nomor Telepon Kontrol</label>
                            <input type="text" name="phone" value="081238890396" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition">
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
                    <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2 rounded-xl text-xs font-bold shadow-md shadow-slate-900/10 transition">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection