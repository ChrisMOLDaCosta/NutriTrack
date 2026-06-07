@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-slate-800">
    <div class="border-b border-slate-100 pb-6 mb-8">
        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Log Audit & Notifikasi Aktivitas</h2>
        <p class="text-xs sm:text-sm text-slate-500 font-medium">Pantau jejak digital akses akun Anda untuk memastikan tidak ada aktivitas mencurigakan.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
        @include('profil.sidebar')

        <div class="lg:col-span-3">
            <div class="bg-white border border-slate-200/60 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Jejak Sesi Masuk Terakhir</h4>
                    <span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2 py-0.5 border border-emerald-100 rounded-md">Sistem Aman</span>
                </div>
                
                <div class="w-full overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[500px]">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-[10px] font-bold uppercase text-slate-400 tracking-wider">
                                <th class="py-3 px-5">Perangkat & Browser</th>
                                <th class="py-3 px-5">Alamat IP</th>
                                <th class="py-3 px-5 text-right">Waktu Akses</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-600">
                            <tr class="hover:bg-slate-50/30 transition">
                                <td class="py-3.5 px-5 flex items-center gap-2.5">
                                    <i class="fa-solid fa-laptop text-slate-400 text-sm"></i>
                                    <div>
                                        <div class="font-bold text-slate-900">Chrome on Windows (Sesi Ini)</div>
                                        <div class="text-[10px] text-slate-400">Kota Malang, Indonesia</div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-5 font-mono text-[11px] text-slate-500">182.253.162.90</td>
                                <td class="py-3.5 px-5 text-right text-slate-400 font-mono text-[11px]">Hari ini, 11:24 WIB</td>
                            </tr>
                            <tr class="hover:bg-slate-50/30 transition">
                                <td class="py-3.5 px-5 flex items-center gap-2.5">
                                    <i class="fa-solid fa-mobile-screen-button text-slate-400 text-sm"></i>
                                    <div>
                                        <div class="font-bold text-slate-900">Safari on iPhone 15 Pro</div>
                                        <div class="text-[10px] text-slate-400">Klojen, Indonesia</div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-5 font-mono text-[11px] text-slate-500">114.79.53.21</td>
                                <td class="py-3.5 px-5 text-right text-slate-400 font-mono text-[11px]">Kemarin, 20:15 WIB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 