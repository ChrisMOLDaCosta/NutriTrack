@extends('layouts.app')

@section('content')
<div class="space-y-6 p-2 sm:p-5 max-w-[1600px] mx-auto antialiased text-slate-800">
    
    <div class="relative bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 rounded-2xl p-6 sm:p-8 text-white shadow-xl overflow-hidden border border-slate-800/80 animate-fade-in-up">
        <div class="absolute right-[-10%] top-[-20%] w-[500px] h-[500px] bg-gradient-to-br from-emerald-500/20 to-teal-500/0 rounded-full blur-3xl pointer-events-none animate-mesh-slow"></div>
        <div class="absolute left-[20%] bottom-[-30%] w-[400px] h-[400px] bg-gradient-to-tr from-indigo-500/10 to-purple-500/0 rounded-full blur-3xl pointer-events-none animate-mesh-slow" style="animation-delay: -2s;"></div>
        
        <div class="relative z-10 max-w-3xl space-y-3">
            <span class="inline-flex items-center gap-1.5 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 border border-emerald-500/30 text-emerald-400 text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm backdrop-blur-md">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Sistem Monitoring Gizi Terintegrasi
            </span>
            <h2 class="text-xl sm:text-3xl font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-100 to-slate-300">
                "Pantau Gizi Anak, Bangun Generasi Sehat"
            </h2>
            <p class="text-slate-400 text-xs sm:text-sm font-medium leading-relaxed max-w-xl opacity-90">
                Sistem analisis data status gizi program makan bergizi gratis. Seluruh ringkasan eksekutif dan grafik di bawah tersinkronisasi otomatis dengan basis data real-time.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 animate-fade-in-up" style="animation-delay: 100ms;">
        <div class="group bg-white p-5 rounded-2xl border border-slate-100 flex items-center justify-between transition-all duration-300 hover:border-slate-300 hover:shadow-lg hover:shadow-slate-100/80">
            <div class="space-y-1">
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider">Total Peserta</p>
                <h3 class="text-2xl font-black text-slate-800">{{ $stats['total'] ?? count($dataSiswa) }} <span class="text-xs font-medium text-slate-400">Anak</span></h3>
            </div>
            <div class="w-11 h-11 bg-slate-50 border border-slate-100 text-slate-600 rounded-xl flex items-center justify-center text-base transition-all duration-300 group-hover:bg-slate-900 group-hover:text-white group-hover:scale-105 shadow-sm">
                <i class="fa-solid fa-child"></i>
            </div>
        </div>

        <div class="group bg-white p-5 rounded-2xl border border-slate-100 flex items-center justify-between transition-all duration-300 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-50/50">
            <div class="space-y-1">
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider">Gizi Normal</p>
                <h3 class="text-2xl font-black text-emerald-600">{{ $stats['normal'] ?? 0 }} <span class="text-xs font-medium text-emerald-400">Anak</span></h3>
            </div>
            <div class="w-11 h-11 bg-emerald-50/60 border border-emerald-100/50 text-emerald-600 rounded-xl flex items-center justify-center text-base transition-all duration-300 group-hover:bg-emerald-600 group-hover:text-white group-hover:scale-105 shadow-sm">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>

        <div class="group bg-white p-5 rounded-2xl border border-slate-100 flex items-center justify-between transition-all duration-300 hover:border-amber-200 hover:shadow-lg hover:shadow-amber-50/50">
            <div class="space-y-1">
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider">Kurang Gizi</p>
                <h3 class="text-2xl font-black text-amber-500">{{ $stats['kurang'] ?? 0 }} <span class="text-xs font-medium text-amber-400">Anak</span></h3>
            </div>
            <div class="w-11 h-11 bg-amber-50/60 border border-amber-100/50 text-amber-500 rounded-xl flex items-center justify-center text-base transition-all duration-300 group-hover:bg-amber-500 group-hover:text-white group-hover:scale-105 shadow-sm">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
        </div>

        <div class="group bg-white p-5 rounded-2xl border border-slate-100 flex items-center justify-between transition-all duration-300 hover:border-rose-200 hover:shadow-lg hover:shadow-rose-50/50">
            <div class="space-y-1">
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider">Obesitas</p>
                <h3 class="text-2xl font-black text-rose-500">{{ $stats['obesitas'] ?? 0 }} <span class="text-xs font-medium text-rose-400">Anak</span></h3>
            </div>
            <div class="w-11 h-11 bg-rose-50/60 border border-rose-100/50 text-rose-500 rounded-xl flex items-center justify-center text-base transition-all duration-300 group-hover:bg-rose-500 group-hover:text-white group-hover:scale-105 shadow-sm">
                <i class="fa-solid fa-weight-scale"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in-up" style="animation-delay: 200ms;">
        
        <div class="bg-white p-5 rounded-2xl border border-slate-100 lg:col-span-2 flex flex-col justify-between shadow-sm transition-all hover:border-slate-200">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h4 class="font-bold text-slate-800 text-sm">Visualisasi Real-Time Status Gizi</h4>
                    <p class="text-xs text-slate-400">Proporsi akumulasi dari seluruh data murid yang terdaftar</p>
                </div>
                <span class="text-[10px] font-bold text-emerald-600 border border-emerald-200 px-2.5 py-0.5 rounded-md bg-emerald-50/50 uppercase tracking-wider select-none animate-pulse">
                    Live Sinkron
                </span>
            </div>
            <div class="flex-1 w-full relative h-[300px]">
                <canvas id="giziLiveChart"></canvas>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-100 flex flex-col justify-between shadow-sm transition-all hover:border-slate-200">
            <div>
                <div class="flex items-center gap-2.5 mb-4 border-b border-slate-100 pb-3">
                    <div class="w-7 h-7 bg-slate-900 text-white rounded-lg flex items-center justify-center text-xs shadow-sm">
                        <i class="fa-solid fa-calculator"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Kalkulator BMI Instan</h4>
                        <p class="text-[11px] text-slate-400">Skrining awal status gizi mandiri</p>
                    </div>
                </div>

                <div class="space-y-3.5">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Berat Badan (kg)</label>
                        <input type="number" id="weight" min="1" step="any" class="w-full border border-slate-200 bg-slate-50/50 rounded-xl px-3 py-2 text-xs font-semibold text-slate-700 focus:outline-none focus:border-slate-900 focus:bg-white transition-all placeholder:text-slate-300" placeholder="Contoh: 35">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Tinggi Badan (cm)</label>
                        <input type="number" id="height" min="1" step="any" class="w-full border border-slate-200 bg-slate-50/50 rounded-xl px-3 py-2 text-xs font-semibold text-slate-700 focus:outline-none focus:border-slate-900 focus:bg-white transition-all placeholder:text-slate-300" placeholder="Contoh: 140">
                    </div>
                    <button onclick="calculateBMI()" class="w-full bg-slate-900 hover:bg-slate-800 text-white py-2.5 rounded-xl text-xs font-bold transition duration-200 active:scale-[0.98] shadow-sm tracking-wide">
                        Hitung Sekarang
                    </button>
                </div>
            </div>

            <div id="bmiResult" class="hidden mt-4 p-4 rounded-xl border text-center transition-all duration-300">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Hasil Skor BMI</p>
                <h5 id="bmiScore" class="text-3xl font-black text-slate-800 my-0.5">0.0</h5>
                <p id="bmiStatus" class="text-[11px] font-bold uppercase tracking-wide">—</p>
                
                <div class="mt-2.5 pt-2.5 border-t border-slate-100 text-left">
                    <p id="bmiSuggestion" class="text-[11px] text-slate-500 leading-relaxed font-medium"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 transition-all shadow-md overflow-hidden animate-fade-in-up" style="animation-delay: 300ms;">
        <div class="p-5 flex flex-col sm:flex-row justify-between sm:items-center gap-3">
            <div>
                <h4 class="font-bold text-slate-800 text-sm">Daftar Data Siswa Terbaru</h4>
                <p class="text-xs text-slate-400">Data rekapitulasi siswa dan instansi sekolah yang terdaftar di dalam sistem</p>
            </div>
            <a href="{{ route('peserta.index') }}" class="inline-flex items-center justify-center gap-1.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-4 py-2 rounded-xl text-xs font-extrabold shadow-md shadow-emerald-500/10 transition-all duration-200 hover:-translate-y-0.5 active:scale-95">
                <span>Lihat Semua Peserta</span>
                <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[950px] table-fixed">
                <thead>
                    <tr class="bg-slate-900 text-[10px] font-bold uppercase tracking-wider text-slate-300 select-none">
                        <th class="py-3.5 px-6 font-semibold w-[15%]">NISN Pokok</th>
                        <th class="py-3.5 px-6 font-semibold w-[25%]">Nama Lengkap Siswa</th>
                        <th class="py-3.5 px-6 font-semibold w-[25%]">Asal Sekolah</th>
                        <th class="py-3.5 px-6 font-semibold text-center w-[15%]">Tingkat Kelas</th>
                        <th class="py-3.5 px-6 font-semibold text-center w-[20%]">Aksi Terintegrasi</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600 text-xs divide-y divide-slate-100">
                    @forelse($dataSiswa as $siswa)
                    <tr class="hover:bg-slate-50 transition-colors duration-150 even:bg-slate-50/30">
                        
                        <td class="py-4 px-6 font-mono text-slate-500 tracking-tight font-medium truncate">
                            {{ $siswa->nisn }}
                        </td>
                        
                        <td class="py-4 px-6 truncate">
                            <div class="font-bold text-slate-800 text-[13px] tracking-tight">
                                {{ $siswa->nama_lengkap }}
                            </div>
                        </td>

                        <td class="py-4 px-6 truncate font-medium text-slate-700">
                            {{ $siswa->asal_sekolah ?? 'Tidak Ada Data Sekolah' }}
                        </td>
                        
                        <td class="py-4 px-6 text-center">
                            <span class="inline-block bg-indigo-50 border border-indigo-100/70 text-indigo-600 text-[10px] font-bold px-3 py-0.5 rounded-md min-w-[80px] uppercase">
                                Kelas {{ $siswa->kelas }}
                            </span>
                        </td>
                        
                        <td class="py-4 px-6 text-center">
                            <a href="{{ route('peserta.index') }}" class="inline-flex items-center justify-center px-4 py-1.5 bg-slate-100 hover:bg-slate-900 text-slate-700 hover:text-white rounded-lg text-[11px] font-bold transition-all duration-300 border border-slate-200/40 shadow-sm hover:shadow-md hover:-translate-y-0.5 active:scale-95 whitespace-nowrap gap-1.5">
                                <i class="fa-solid fa-circle-info text-[10px] opacity-70"></i> 
                                <span>Detail Siswa</span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-16 text-center text-slate-400">
                            <div class="flex flex-col items-center justify-center gap-2 py-4">
                                <i class="fa-solid fa-folder-open text-2xl text-slate-200"></i>
                                <p class="text-xs font-semibold text-slate-700">Belum Ada Data Siswa</p>
                                <p class="text-[11px] text-slate-400">Silakan tambahkan data murid baru di Halaman Peserta.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // ==========================================
    // SINKRONISASI GRAFIK DENGAN REAL DATABASE CODES
    // ==========================================
    const ctxLive = document.getElementById('giziLiveChart').getContext('2d');
    
    const countNormal = {{ $stats['normal'] ?? 0 }};
    const countKurang = {{ $stats['kurang'] ?? 0 }};
    const countObesitas = {{ $stats['obesitas'] ?? 0 }};

    new Chart(ctxLive, {
        type: 'bar',
        data: {
            labels: ['Gizi Normal', 'Kurang Gizi', 'Obesitas'],
            datasets: [{
                label: 'Jumlah Peserta Terdata',
                data: [countNormal, countKurang, countObesitas],
                backgroundColor: [
                    'rgba(16, 185, 129, 0.85)', 
                    'rgba(245, 158, 11, 0.85)', 
                    'rgba(244, 63, 94, 0.85)'   
                ],
                borderColor: [
                    '#10b981',
                    '#f59e0b',
                    '#f43f5e'
                ],
                borderWidth: 1.5,
                borderRadius: 8,
                barThickness: 32
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#0f172a',
                    padding: 12,
                    titleFont: { family: 'Plus Jakarta Sans', size: 12, weight: '700' },
                    bodyFont: { family: 'Plus Jakarta Sans', size: 11 },
                    cornerRadius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#f1f5f9', borderDash: [5, 5] },
                    ticks: { font: { family: 'Plus Jakarta Sans', size: 11, weight: '500' }, color: '#94a3b8', stepSize: 1 }
                },
                x: {
                    grid: { display: false },
                    ticks: { font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' }, color: '#475569' }
                }
            }
        }
    });

    // ==========================================
    // BMI CALCULATOR LOGIC
    // ==========================================
    function calculateBMI() {
        const weight = parseFloat(document.getElementById('weight').value);
        const heightCm = parseFloat(document.getElementById('height').value);
        const resultDiv = document.getElementById('bmiResult');
        const scoreH5 = document.getElementById('bmiScore');
        const statusP = document.getElementById('bmiStatus');
        const suggestionP = document.getElementById('bmiSuggestion');

        // Proteksi ekstra mencegah pembagian dengan angka 0 atau kosong (Anti-NaN)
        if (!weight || !heightCm || heightCm <= 0 || weight <= 0) { 
            alert('Harap masukkan nilai berat dan tinggi badan yang valid!'); 
            return; 
        }

        const bmi = (weight / ((heightCm / 100) ** 2)).toFixed(1);
        scoreH5.innerText = bmi;
        resultDiv.classList.remove('hidden');

        if (bmi < 18.5) { 
            statusP.innerText = "Kurang Gizi"; 
            statusP.className = "text-[11px] font-bold mt-1 text-amber-600 uppercase tracking-wide"; 
            resultDiv.className = "mt-4 p-4 rounded-xl border text-center bg-amber-50/40 border-amber-200/60 animate-fade-in-up"; 
            suggestionP.innerText = "Prioritaskan kalori dan protein tambahan pada distribusi menu makan siang anak.";
        } 
        else if (bmi < 25) { 
            statusP.innerText = "Gizi Normal"; 
            statusP.className = "text-[11px] font-bold mt-1 text-emerald-600 uppercase tracking-wide"; 
            resultDiv.className = "mt-4 p-4 rounded-xl border text-center bg-emerald-50/40 border-emerald-200/60 animate-fade-in-up"; 
            suggestionP.innerText = "Kondisi fisik ideal. Pertahankan konsistensi kombinasi nutrisi saat ini.";
        } 
        else { 
            statusP.innerText = "Obesitas"; 
            statusP.className = "text-[11px] font-bold mt-1 text-rose-600 uppercase tracking-wide"; 
            resultDiv.className = "mt-4 p-4 rounded-xl border text-center bg-rose-50/40 border-rose-200/60 animate-fade-in-up"; 
            suggestionP.innerText = "Sesuaikan asupan karbohidrat dengan menambah porsi serat/sayur pada menu.";
        }
    }
</script>

<style>
    /* High-End Fluid Cubic-Bezier Animation Engine */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes meshMovement {
        0%, 100% { transform: translate(0px, 0px) scale(1); }
        50% { transform: translate(30px, -20px) scale(1.15); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .animate-mesh-slow {
        animation: meshMovement 7s ease-in-out infinite;
    }
</style>
@endpush