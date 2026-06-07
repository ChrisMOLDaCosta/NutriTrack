@extends('layouts.app')

@section('content')
<!-- KONTEN UTAMA: Layout aplikasi normal, otomatis bersih total dari sidebar/banner pas di-print -->
<div class="p-4 sm:p-6 w-full mx-auto antialiased text-slate-800 font-sans print:p-0 print:m-0 print:w-full">
    
    <div class="space-y-6 w-full">
        
        <!-- JUDUL LAPORAN UTAMA (Hanya Muncul Pas Di-Print) -->
        <div class="hidden print:block text-center mb-8">
            <h1 class="text-2xl font-bold uppercase tracking-wide text-slate-900">Rekapitulasi Laporan Bulanan</h1>
            <p class="text-xs text-slate-500 mt-1">Sistem Informasi Monitoring Gizi Anak - NutriTrack</p>
            <hr class="border-t-2 border-slate-900 mt-4">
        </div>

        <!-- BANNER APLIKASI (Otomatis Hilang Pas Di-Print) -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 p-6 rounded-2xl border border-slate-800 shadow-xl relative overflow-hidden print:hidden">
            <div class="absolute right-[-5%] top-[-30%] w-[600px] h-[600px] bg-gradient-to-br from-emerald-500/10 via-teal-500/5 to-transparent rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="relative z-10 space-y-1">
                <span class="inline-flex items-center gap-1.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-[10px] font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span> Live Master Data
                </span>
                <h2 class="text-xl sm:text-2xl font-extrabold tracking-tight text-white">
                    Rekapitulasi Laporan Bulanan
                </h2>
                <p class="text-xs sm:text-sm text-slate-400 font-medium max-w-xl opacity-90">
                    Sistem kendali manajemen berkas fisik anak & Program Makan Bergizi Gratis secara presisi.
                </p>
            </div>
            
            <div class="flex items-center gap-3 w-full md:w-auto relative z-10">
                <button onclick="eksporKeExcel()" class="flex-1 md:flex-none bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 px-4 py-2.5 rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 active:scale-95 shadow-sm">
                    <i class="fa-solid fa-file-excel text-emerald-400 text-sm"></i> Spreadsheet
                </button>
                <button onclick="window.print()" class="flex-1 md:flex-none bg-[#00CC99] hover:bg-[#00B386] text-slate-950 px-5 py-2.5 rounded-xl text-xs font-black shadow-lg shadow-emerald-500/20 transition flex items-center justify-center gap-2 active:scale-95">
                    <i class="fa-solid fa-print"></i> Cetak Dokumen
                </button>
            </div>
        </div>

        <!-- PANEL FILTER (Otomatis Hilang Pas Di-Print) -->
        <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm print:hidden">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                
                <!-- Input Pencarian -->
                <div class="relative flex-1 group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 group-focus-within:text-slate-900 transition-colors">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik NISN, nama siswa, atau sekolah..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-900 focus:bg-white transition-all shadow-sm">
                </div>
                
                <!-- Dropdown Status Gizi -->
                <select name="status_gizi" class="w-full sm:w-56 px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-900 shadow-sm">
                    <option value="">Semua Status Gizi</option>
                    <option value="Gizi Normal" {{ request('status_gizi') == 'Gizi Normal' ? 'selected' : '' }}>Gizi Normal</option>
                    <option value="Kurang Gizi" {{ request('status_gizi') == 'Kurang Gizi' ? 'selected' : '' }}>Kurang Gizi</option>
                    <option value="Obesitas" {{ request('status_gizi') == 'Obesitas' ? 'selected' : '' }}>Obesitas</option>
                </select>
                
                <button type="submit" class="bg-[#0B132B] text-white px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 transition active:scale-95 shadow-md">Saring Data</button>
                
                <!-- Tombol Reset Saringan -->
                <a href="{{ url()->current() }}" class="bg-slate-100 text-slate-600 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-200 transition active:scale-95 text-center flex items-center justify-center shadow-sm" title="Reset Pencarian & Filter">
                    <i class="fa-solid fa-rotate-right"></i>
                </a>
            </form>
        </div>

        <!-- AREA TABEL DATA UTAMA -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden w-full print:border-none print:shadow-none print:bg-transparent">
            <div class="overflow-x-auto w-full">
                <table id="tabelLaporanGizi" class="w-full text-left border-collapse table-auto print:w-full">
                    <thead>
                        <tr class="bg-[#0B132B] text-[11px] font-bold uppercase tracking-wider text-slate-300 select-none print:bg-slate-100 print:text-slate-900 print:border-b-2 print:border-slate-800">
                            <th class="py-4 px-5">NISN / ID</th>
                            <th class="py-4 px-5">Nama Lengkap</th>
                            <th class="py-4 px-5">Asal Sekolah</th>
                            <th class="py-4 px-5 text-center">BB (KG)</th>
                            <th class="py-4 px-5 text-center">TB (CM)</th>
                            <th class="py-4 px-5 text-right">Status Gizi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-600 font-medium print:text-slate-900">
                        @php $records = $logsGizi ?? ($logs ?? []); @endphp
                        @forelse($records as $log)
                        <tr class="hover:bg-slate-50 transition-colors duration-150 print:hover:bg-transparent print:border-b print:border-slate-200">
                            
                            <td class="py-4 px-5 font-mono text-slate-500 text-xs tracking-wider whitespace-nowrap print:text-slate-900">
                                {{ $log->nisn ?? '#'.$log->id }}
                            </td>
                            
                            <td class="py-4 px-5 font-bold text-slate-900 leading-snug print:text-slate-900">
                                {{ $log->nama_lengkap ?? 'Tanpa Nama' }}
                            </td>
                            
                            <td class="py-4 px-5 text-slate-500 leading-snug print:text-slate-900">
                                {{ $log->asal_sekolah ?? 'Tidak Ada Data' }}
                            </td>

                            <td class="py-4 px-5 text-center font-mono font-bold text-slate-700 print:text-slate-900">
                                {{ $log->berat_badan ?? '—' }}
                            </td>
                            
                            <td class="py-4 px-5 text-center font-mono font-bold text-slate-700 print:text-slate-900">
                                {{ $log->tinggi_badan ?? '—' }}
                            </td>
                            
                            <td class="py-4 px-5 text-right font-bold">
                                @php $status = $log->status_gizi ?? 'Gizi Normal'; @endphp
                                <span class="{{ $status === 'Kurang Gizi' ? 'text-rose-600' : ($status === 'Obesitas' ? 'text-amber-600' : 'text-emerald-600') }} print:text-slate-950">
                                    {{ $status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-16 text-center text-slate-400">
                                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-slate-50 text-slate-300 mb-2">
                                    <i class="fa-solid fa-folder-open text-xl"></i>
                                </div>
                                <p class="text-xs font-bold text-slate-500">Data Tidak Ditemukan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Pelindung Error -->
            @if(isset($records) && is_object($records) && !is_null($records) && method_exists($records, 'links'))
                <div class="p-4 border-t border-slate-50 bg-slate-50/30 print:hidden">
                    {{ $records->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- STYLE KHUSUS PRINT DAN ANIMASI -->
<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

    @media print {
        @page {
            size: A4 portrait;
            margin: 10mm 15mm 10mm 15mm;
        }

        /* Bersihkan elemen navigasi aplikasi dari kertas */
        header, footer, nav, aside, .sidebar, #sidebar, .nav-side, .print\:hidden, button, form {
            display: none !important;
        }

        /* Rentangkan konten agar penuh mengikuti lebar kertas */
        body, main, .content, .wrapper, div {
            position: static !important;
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            box-shadow: none !important;
            transform: none !important;
        }

        /* Aturan Lebar Tabel Cetak */
        #tabelLaporanGizi {
            width: 100% !important;
            table-layout: auto !important;
            border: 1px solid #cbd5e1 !important;
        }
        
        th, td {
            padding: 10px 12px !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }

        thead tr { 
            background-color: #f1f5f9 !important; 
            color: #0f172a !important; 
            -webkit-print-color-adjust: exact !important; 
            print-color-adjust: exact !important; 
        }
    }
</style>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    function eksporKeExcel() {
        var elemenTabel = document.getElementById('tabelLaporanGizi');
        var lembarKerja = XLSX.utils.table_to_sheet(elemenTabel);
        var bukuKerja = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(bukuKerja, lembarKerja, 'Laporan Gizi');
        XLSX.writeFile(bukuKerja, 'Laporan_NutriTrack_' + new Date().toISOString().slice(0, 10) + '.xlsx');
    }

    // =========================================================================
    // TRIK SAKTI PENGGESER JUDUL BROWSER CHROME KE SISI POJOK KANAN (SIMETRIS)
    // =========================================================================
    var judulAsliHalaman = document.title;

    window.onbeforeprint = function() {
        // Menyisipkan spasi panjang di depan teks judul bawaan browser.
        // Ruang kosong ini otomatis memaksa teks asli terdorong penuh ke pojok kanan atas kertas cetak!
        document.title = "                                                                                                                                              NutriTrack - Pantau Gizi Anak, Bangun Generasi Sehat";
    };

    window.onafterprint = function() {
        // Kembalikan judul tab ke semula saat jendela cetak ditutup agar aplikasi tetap normal
        document.title = judulAsliHalaman;
    };
</script>
@endpush