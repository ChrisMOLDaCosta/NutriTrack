@extends('layouts.app')

@section('content')
<div class="space-y-6 relative antialiased text-slate-800 font-sans p-2 sm:p-5 max-w-[1600px] mx-auto animate-fade-in-up">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 p-6 sm:p-8 rounded-2xl border border-slate-800 shadow-xl relative overflow-hidden group">
        <div class="absolute right-[-5%] top-[-30%] w-[600px] h-[600px] bg-gradient-to-br from-emerald-500/10 via-teal-500/5 to-transparent rounded-full blur-3xl pointer-events-none animate-[mesh_10s_ease-in-out_infinite]"></div>
        <div class="absolute left-[15%] bottom-[-40%] w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500/10 via-purple-500/5 to-transparent rounded-full blur-3xl pointer-events-none animate-[mesh_12s_ease-in-out_infinite]" style="animation-delay: -3s;"></div>
        
        <div class="relative z-10 space-y-1">
            <span class="inline-flex items-center gap-1.5 bg-slate-800/80 border border-slate-700/50 text-emerald-400 text-[10px] font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wider shadow-inner">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Sistem Informasi Gizi Keluarga v3.0
            </span>
            <h2 class="text-xl sm:text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-100 to-slate-400">
                Kalkulator Berat Badan Ideal & Gizi Semesta
            </h2>
            <p class="text-xs sm:text-sm text-slate-400 font-medium max-w-xl opacity-90">
                Sistem pemantauan kesehatan tubuh otomatis yang valid untuk semua rentang usia keluarga Anda (WHO & Kemenkes RI).
            </p>
        </div>

        <div class="hidden lg:flex items-center gap-4 bg-slate-900/60 p-3 rounded-xl border border-slate-800/50 relative z-10">
            <div class="text-right">
                <span class="block text-[9px] text-slate-500 font-bold uppercase">Metode Evaluasi</span>
                <span class="text-xs font-bold text-slate-300">WHO & Kemenkes RI</span>
            </div>
            <div class="w-8 h-8 bg-emerald-50/10 text-emerald-400 rounded-lg flex items-center justify-center text-sm">
                <i class="fa-solid fa-heart-pulse"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
        
        <div class="lg:col-span-5 bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between space-y-6 transition-all duration-300 hover:shadow-md">
            <div class="space-y-5">
                <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                    <div class="w-9 h-9 bg-slate-900 text-white rounded-xl flex items-center justify-center text-sm shadow-md">
                        <i class="fa-solid fa-sliders"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm tracking-tight">Pengisian Data Tubuh</h4>
                        <p class="text-[11px] text-slate-400 font-medium">Masukkan informasi tubuh subjek secara akurat</p>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Kelompok Umur</label>
                        <select id="kelompok_usia" onchange="adjustUsiaUI()" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-xs outline-none focus:border-slate-900 focus:ring-1 focus:ring-slate-900 bg-slate-50/60 font-bold text-slate-700 transition-all cursor-pointer">
                            <option value="bayi">Bayi / Balita (0 - 5 Tahun)</option>
                            <option value="anak_remaja">Anak-Anak & Remaja (5 - 18 Tahun)</option>
                            <option value="dewasa" selected>Dewasa (18 - 60 Tahun)</option>
                            <option value="lansia">Lansia / Lanjut Usia (> 60 Tahun)</option>
                        </select>
                    </div>

                    <div id="wrapper_detail_usia">
                        <label id="label_usia" class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Umur Saat Ini</label>
                        <div class="relative">
                            <input type="number" id="nilai_usia" value="25" class="w-full border border-slate-200 rounded-xl pl-4 pr-20 py-3 text-xs outline-none focus:border-slate-900 bg-slate-50/60 text-slate-800 font-bold transition-all" placeholder="Contoh: 25">
                            <span id="unit_usia" class="absolute right-4 top-1/2 -translate-y-1/2 text-[11px] font-bold text-slate-400 uppercase bg-slate-200/80 px-2 py-0.5 rounded-md shadow-inner">Tahun</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Jenis Kelamin Anatomi</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="border border-slate-200 rounded-xl p-3 flex items-center justify-center gap-2.5 cursor-pointer hover:bg-slate-50 transition-all select-none text-xs font-bold text-slate-600 shadow-sm">
                                <input type="radio" name="gender" value="pria" checked class="accent-slate-900 w-4 h-4"> Laki-Laki
                            </label>
                            <label class="border border-slate-200 rounded-xl p-3 flex items-center justify-center gap-2.5 cursor-pointer hover:bg-slate-50 transition-all select-none text-xs font-bold text-slate-600 shadow-sm">
                                <input type="radio" name="gender" value="wanita" class="accent-slate-900 w-4 h-4"> Perempuan
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Pola Aktivitas Harian</label>
                        <select id="faktor_aktivitas" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-xs outline-none focus:border-slate-900 bg-slate-50/60 text-slate-700 font-bold transition-all cursor-pointer">
                            <option value="1.2">Sangat Jarang Bergerak (Banyak Duduk / Rebahan)</option>
                            <option value="1.375">Aktivitas Ringan (Olahraga Ringan 1-3 Hari/Minggu)</option>
                            <option value="1.55">Aktif Bergerak (Olahraga Rutin 3-5 Hari/Minggu)</option>
                            <option value="1.725">Aktivitas Tinggi (Pekerja Lapangan / Atlet Fisik)</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Tinggi Badan (cm)</label>
                            <input type="number" id="tinggi" step="0.1" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-xs outline-none focus:border-slate-900 bg-slate-50/60 text-slate-800 font-bold transition-all" placeholder="Contoh: 165">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Berat Badan (kg)</label>
                            <input type="number" id="berat" step="0.1" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-xs outline-none focus:border-slate-900 bg-slate-50/60 text-slate-800 font-bold transition-all" placeholder="Contoh: 55">
                        </div>
                    </div>
                </div>
            </div>

            <button onclick="prosesMetabolikUniversal()" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 rounded-xl text-xs transition duration-200 active:scale-[0.99] shadow-lg flex items-center justify-center gap-2 uppercase tracking-widest mt-6">
                <i class="fa-solid fa-wand-magic-sparkles text-emerald-400"></i> Analisis Data Kesehatan
            </button>
        </div>

        <div class="lg:col-span-7 flex flex-col justify-between h-full min-h-[600px]">
            
            <div id="defaultViewState" class="bg-white p-12 rounded-2xl border border-slate-100 shadow-sm flex flex-col items-center justify-center text-center space-y-4 flex-1 h-full">
                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-300 border border-slate-100/70 text-2xl shadow-inner">
                    <i class="fa-solid fa-shield-heart text-slate-400"></i>
                </div>
                <div class="space-y-1">
                    <h5 class="font-bold text-slate-700 text-sm">Menunggu Perhitungan Data</h5>
                    <p class="text-xs text-slate-400 max-w-sm leading-relaxed font-medium">
                        Silakan lengkapi formulir tubuh Anda di sebelah kiri, kemudian klik tombol untuk melihat lembar analisis gizi komprehensif di sini.
                    </p>
                </div>
            </div>

            <div id="clinicalReportView" class="hidden space-y-6 flex-1 flex flex-col justify-between h-full animate-[fadeInUp_0.4s_ease-out]">
                
                <div class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-white p-6 sm:p-8 rounded-2xl shadow-xl grid grid-cols-1 md:grid-cols-12 gap-6 items-center relative overflow-hidden border border-slate-800">
                    <div class="absolute -right-6 -bottom-10 text-slate-800/15 text-[160px] font-black z-0 pointer-events-none select-none"><i class="fa-solid fa-chart-simple"></i></div>
                    
                    <div class="md:col-span-7 z-10 space-y-1">
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Hasil Skor Massa Tubuh (IMT)</p>
                        <div class="flex items-baseline gap-2">
                            <h3 id="hasilSkor" class="text-5xl sm:text-6xl font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-emerald-500">0.0</h3>
                            <span id="skorUnit" class="text-xs font-bold text-slate-400">kg/m²</span>
                        </div>
                        <p class="text-xs text-slate-400 font-semibold tracking-wide" id="infoKlien">—</p>
                    </div>

                    <div class="md:col-span-5 z-10 flex flex-col md:items-end justify-center space-y-2">
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold md:text-right w-full">Kesimpulan Diagnosis</p>
                        <div id="hasilStatus" class="inline-block bg-slate-800/90 border border-slate-700/80 text-white px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider shadow-inner text-center">
                            Belum Diperiksa
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center gap-3.5">
                        <div class="w-10 h-10 bg-indigo-50 border border-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center text-sm shadow-inner"><i class="fa-solid fa-weight-scale"></i></div>
                        <div>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Berat Badan Ideal</p>
                            <h5 id="hasilBBI" class="text-base font-black text-slate-800">0.0 <span class="text-xs font-medium text-slate-400">kg</span></h5>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center gap-3.5">
                        <div class="w-10 h-10 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-sm shadow-inner"><i class="fa-solid fa-bolt"></i></div>
                        <div>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Energi Dasar (BMR)</p>
                            <h5 id="hasilBMR" class="text-base font-black text-slate-800">0 <span class="text-xs font-medium text-slate-400">Kalori</span></h5>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center gap-3.5">
                        <div class="w-10 h-10 bg-amber-50 border border-amber-100 text-amber-600 rounded-xl flex items-center justify-center text-sm shadow-inner"><i class="fa-solid fa-fire-flame-simple"></i></div>
                        <div>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Kebutuhan Kalori Total</p>
                            <h5 id="hasilTEE" class="text-base font-black text-slate-800">0 <span class="text-xs font-medium text-slate-400">Kalori</span></h5>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-5 sm:p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-slate-400 flex items-center gap-2">
                        <i class="fa-solid fa-basket-shopping text-indigo-500"></i> Estimasi Kebutuhan Zat Gizi Makro Anda
                    </h5>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-4 rounded-xl bg-slate-50/80 border border-slate-100 space-y-1">
                            <div class="flex justify-between items-center text-xs font-bold text-slate-600">
                                <span class="flex items-center gap-1.5 text-amber-600"><span class="w-2 h-2 rounded-full bg-amber-500"></span> Karbohidrat</span>
                                <span id="pctKarbo" class="font-bold">55%</span>
                            </div>
                            <h4 class="text-xl font-black text-slate-800 mt-1" id="gramKarbo">0g <span class="text-xs font-medium text-slate-400">/ hari</span></h4>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50/80 border border-slate-100 space-y-1">
                            <div class="flex justify-between items-center text-xs font-bold text-slate-600">
                                <span class="flex items-center gap-1.5 text-rose-600"><span class="w-2 h-2 rounded-full bg-rose-500"></span> Protein</span>
                                <span id="pctProtein" class="font-bold">20%</span>
                            </div>
                            <h4 class="text-xl font-black text-slate-800 mt-1" id="gramProtein">0g <span class="text-xs font-medium text-slate-400">/ hari</span></h4>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50/80 border border-slate-100 space-y-1">
                            <div class="flex justify-between items-center text-xs font-bold text-slate-600">
                                <span class="flex items-center gap-1.5 text-teal-600"><span class="w-2 h-2 rounded-full bg-teal-500"></span> Lemak Sehat</span>
                                <span id="pctLemak" class="font-bold">25%</span>
                            </div>
                            <h4 class="text-xl font-black text-slate-800 mt-1" id="gramLemak">0g <span class="text-xs font-medium text-slate-400">/ hari</span></h4>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-5 sm:p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4 flex-1 flex flex-col justify-between">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
                        <div class="w-9 h-9 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-sm shadow-inner">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-xs sm:text-sm tracking-tight">Rekomendasi Gaya Hidup Sehat</h4>
                            <p class="text-[11px] text-slate-400 font-medium">Tips praktis yang disesuaikan dengan kondisi tubuh Anda</p>
                        </div>
                    </div>

                    <div class="space-y-3.5 text-xs text-slate-600 leading-relaxed flex-1 flex flex-col justify-center">
                        <div class="p-3.5 bg-emerald-50/30 border border-emerald-100/70 rounded-xl">
                            <span class="block font-bold text-emerald-700 text-[10px] uppercase tracking-wider mb-0.5"><i class="fa-solid fa-utensils mr-1"></i> Pengaturan Makanan:</span>
                            <p id="saranMakan" class="font-medium text-slate-700 leading-normal text-justify">—</p>
                        </div>

                        <div class="p-3.5 bg-cyan-50/30 border border-cyan-100/70 rounded-xl">
                            <span class="block font-bold text-cyan-700 text-[10px] uppercase tracking-wider mb-0.5"><i class="fa-solid fa-person-running mr-1"></i> Anjuran Aktivitas Fisik:</span>
                            <p id="saranFisik" class="font-medium text-slate-700 leading-normal text-justify">—</p>
                        </div>

                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 flex gap-2.5 items-start">
                            <i class="fa-solid fa-circle-info text-slate-400 mt-0.5 text-sm"></i>
                            <div>
                                <span class="block font-bold text-slate-700 text-[10px] uppercase tracking-wider">Catatan Penting:</span>
                                <p class="text-[11px] text-slate-500 font-medium leading-normal text-justify" id="saranCatatan">—</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<style>
    /* SINKRONISASI ANIMASI: Memanfaatkan basis kurva cubic-bezier yang sama dengan master data */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    
    @keyframes mesh {
        0%, 100% { transform: translate(0px, 0px) scale(1); }
        50% { transform: translate(30px, -20px) scale(1.05); }
    }
    
    p, h3, h4, h5, span, div {
        white-space: normal;
        word-break: keep-all;
    }
</style>
@endsection

@push('scripts')
<script>
    function adjustUsiaUI() {
        const kelompok = document.getElementById('kelompok_usia').value;
        const label = document.getElementById('label_usia');
        const unit = document.getElementById('unit_usia');
        const input = document.getElementById('nilai_usia');

        if (kelompok === 'bayi') {
            label.innerText = "Umur Bayi (Bulan)";
            unit.innerText = "Bulan";
            input.value = "18";
        } else if (kelompok === 'anak_remaja') {
            label.innerText = "Umur Anak / Remaja (Tahun)";
            unit.innerText = "Tahun";
            input.value = "12";
        } else if (kelompok === 'dewasa') {
            label.innerText = "Umur Dewasa (Tahun)";
            unit.innerText = "Tahun";
            input.value = "25";
        } else {
            label.innerText = "Umur Lansia (Tahun)";
            unit.innerText = "Tahun";
            input.value = "65";
        }
    }

    function prosesMetabolikUniversal() {
        const kelompok = document.getElementById('kelompok_usia').value;
        const gender = document.querySelector('input[name="gender"]:checked').value;
        const tinggiCm = parseFloat(document.getElementById('tinggi').value);
        const berat = parseFloat(document.getElementById('berat').value);
        const aktFaktor = parseFloat(document.getElementById('faktor_aktivitas').value);
        const usiaNilai = parseInt(document.getElementById('nilai_usia').value);

        if (!tinggiCm || !berat || !usiaNilai) {
            alert('Mohon maaf, silakan isi kolom Umur, Tinggi Badan, dan Berat Badan terlebih dahulu dengan benar.');
            return;
        }

        const tinggiM = tinggiCm / 100;
        let imt = (berat / (tinggiM * tinggiM)).toFixed(1);

        document.getElementById('hasilSkor').innerText = imt;

        document.getElementById('defaultViewState').classList.add('hidden');
        document.getElementById('clinicalReportView').classList.remove('hidden');

        let txtKategori = "";
        let statusClass = "";
        let bbi = 0;
        let bmr = 0;
        let tee = 0;
        
        let pctK = 55, pctP = 20, pctL = 25; 
        let saranM = "", saranF = "", saranC = "";

        if (kelompok === 'bayi') {
            bbi = (usiaNilai / 2) + 4; 
        } else if (kelompok === 'anak_remaja' && usiaNilai <= 12) {
            bbi = (usiaNilai * 2) + 8;
        } else {
            bbi = (tinggiCm - 100) - ((tinggiCm - 100) * (gender === 'pria' ? 0.10 : 0.15));
        }
        document.getElementById('hasilBBI').innerHTML = `${bbi.toFixed(1)} <span class="text-xs font-medium text-slate-400">kg</span>`;

        let usiaKonversiTahun = (kelompok === 'bayi') ? (usiaNilai / 12) : usiaNilai;
        if (gender === 'pria') {
            bmr = (10 * berat) + (6.25 * tinggiCm) - (5 * usiaKonversiTahun) + 5;
        } else {
            bmr = (10 * berat) + (6.25 * tinggiCm) - (5 * usiaKonversiTahun) - 161;
        }

        if (kelompok === 'lansia') {
            bmr = bmr * 0.92;
        }
        tee = bmr * aktFaktor;
        
        // --- BALITA ---
        if (kelompok === 'bayi') {
            document.getElementById('infoKlien').innerText = `Klaster: Balita (${gender === 'pria' ? 'Laki-Laki' : 'Perempuan'}), ${usiaNilai} Bulan | Standar Grafik Tumbuh WHO`;
            document.getElementById('skorUnit').innerText = "Skor IMT";
            
            if (imt < 13.5) {
                txtKategori = "Gizi Buruk";
                statusClass = "bg-rose-600 text-white font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Si kecil memerlukan perhatian khusus. Tingkatkan pemberian ASI atau MPASI yang padat energi dan protein.";
                saranF = "Biarkan anak tidur dan istirahat dengan cukup. Kurangi aktivitas bermain yang terlalu menguras fisik.";
                saranC = "Kondisi berat badan si kecil berada di bawah batas aman. Segera bawa si kecil berkonsultasi ke fasilitas kesehatan terdekat.";
            } else if (imt >= 13.5 && imt < 14.5) {
                txtKategori = "Kekurangan Gizi";
                statusClass = "bg-amber-500 text-slate-900 font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Berikan variasi lauk pauk yang disukai si kecil. Cobalah berikan camilan bergizi seperti biskuit balita di sela-sela jam makan utamanya.";
                saranF = "Ajak anak aktif bergerak dengan permainan motorik menyenangkan di dalam rumah.";
                saranC = "Periksakan kondisi tumbuh kembang anak secara berkala ke Posyandu.";
            } else if (imt >= 14.5 && imt <= 18.0) {
                txtKategori = "Gizi Baik & Normal";
                statusClass = "bg-emerald-500 text-slate-900 font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Pertahankan pola asuh makan bergizi seimbang saat ini. Pastikan piring makannya mengandung karbohidrat, lauk pauk, sayur, dan buah.";
                saranF = "Dukung si kecil untuk bebas bermain aktif dan mengeksplorasi lingkungan sekitar.";
                saranC = "Pertumbuhan anak sudah berjalan sangat ideal. Lanjutkan pemantauan berat dan tinggi badan sebulan sekali di Posyandu.";
            } else {
                txtKategori = "Kelebihan Berat Badan";
                statusClass = "bg-rose-600 text-white font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Batasi makanan ringan komersial atau minuman instan berperisa. Berikan potongan buah segar sebagai opsi utama camilan.";
                saranF = "Ajak si kecil bermain aktif yang melibatkan gerakan seluruh tubuh minimal 30 menit sehari.";
                saranC = "Pantau porsi makan anak agar tidak berlebihan demi menjaga kelincahan gerak motoriknya.";
            }
        }
        
        // --- ANAK & REMAJA ---
        else if (kelompok === 'anak_remaja') {
            document.getElementById('infoKlien').innerText = `Klaster: Anak & Remaja (${gender === 'pria' ? 'Laki-Laki' : 'Perempuan'}), ${usiaNilai} Tahun`;
            document.getElementById('skorUnit').innerText = "kg/m²";

            let batasKurus = (usiaNilai <= 12) ? (gender === 'pria' ? 14.0 : 13.7) : (gender === 'pria' ? 16.0 : 15.5);
            let batasGemuk = (usiaNilai <= 12) ? (gender === 'pria' ? 19.5 : 20.0) : (gender === 'pria' ? 24.0 : 24.5);

            if (imt < batasKurus) {
                txtKategori = "Berat Badan Kurang";
                statusClass = "bg-amber-500 text-slate-900 font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Tambah porsi makan sehatmu, perbanyak protein (telur, ayam, ikan) and minum susu harian.";
                saranF = "Cobalah lakukan latihan fisik ringan seperti push-up atau bersepeda santai agar kalori diubah menjadi massa otot.";
                saranC = "Jangan sering begadang dan pastikan tidur 8 jam semalam demi mendukung pertumbuhan hormon.";
            } else if (imt >= batasKurus && imt <= batasGemuk) {
                txtKategori = "Berat Badan Normal";
                statusClass = "bg-emerald-500 text-slate-900 font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Bagus sekali! Jaga terus performa tubuh ini dengan makan makanan rumahan yang bersih, berserat, dan seimbang.";
                saranF = "Pertahankan kebiasaan bergerak aktif dengan berolahraga minimal 3 kali seminggu (futsal, badminton, berenang).";
                saranC = "Status fisikmu sangat mendukung aktivitas sekolah. Cukup pertahankan gaya hidup sehatmu.";
            } else {
                txtKategori = "Obesitas Remaja";
                statusClass = "bg-rose-600 text-white font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Kurangi makanan cepat saji, jajanan gorengan, minuman boba, soda, atau jeli instan yang tinggi gula.";
                saranF = "Yuk, kurangi bermain gawai sambil rebahan. Targetkan berjalan kaki cepat atau bersepeda minimal 45 menit setiap hari.";
                saranC = "Menjaga berat badan ideal sejak remaja sangat penting untuk investasi kesehatan masa depanmu.";
            }
        }
        
        // --- DEWASA ---
        else if (kelompok === 'dewasa') {
            document.getElementById('infoKlien').innerText = `Klaster: Dewasa (${gender === 'pria' ? 'Laki-Laki' : 'Perempuan'}), ${usiaNilai} Tahun | Standar Asia-Pasifik`;
            document.getElementById('skorUnit').innerText = "kg/m²";

            if (imt < 18.5) {
                txtKategori = "Berat Badan Kurang";
                statusClass = "bg-amber-500 text-slate-900 font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                pctK = 50; pctP = 25; pctL = 25; tee += 400;
                saranM = "Targetkan surplus kalori sehat. Tambahkan camilan padat gizi di antara jam makan utama Anda, seperti alpukat dan kacang-kacangan.";
                saranF = "Lakukan latihan beban (calisthenics, gym) agar penambahan berat badan didominasi oleh massa otot, bukan timbunan lemak.";
                saranC = "Pastikan tingkat stres harian Anda terkelola dengan baik karena stres kronis merusak absorpsi gizi.";
            } else if (imt >= 18.5 && imt <= 22.9) {
                txtKategori = "Berat Badan Normal (Ideal)";
                statusClass = "bg-emerald-500 text-slate-900 font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Selamat, proporsi tubuh Anda prima! Batasi konsumsi minyak jenuh, gula tambahan, dan makanan terlalu asin.";
                saranF = "Pertahankan metabolisme prima ini dengan melakukan aktivitas fisik intensitas sedang selama 30 menit sehari.";
                saranC = "Kondisi fisik Anda berada pada zona proteksi terbaik dari risiko penyakit degeneratif.";
            } else if (imt >= 23.0 && imt <= 24.9) {
                txtKategori = "Berat Badan Lebih (Overweight)";
                statusClass = "bg-orange-500 text-white font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                pctK = 45; pctP = 25; pctL = 30; tee -= 300;
                saranM = "Kurangi porsi karbohidrat olahan (nasi putih, mie, tepung) dan perbanyak porsi sayur berserat tinggi di piring Anda.";
                saranF = "Tingkatkan durasi bergerak harian menjadi 40 menit per sesi. Perbanyak jalan kaki dan hindari 'sedentary lifestyle'.";
                saranC = "Kondisi ini merupakan alarm awal tubuh. Mengurangi berat badan 2-4 kg akan mengembalikan metabolisme Anda ke zona normal.";
            } else {
                txtKategori = "Obesitas";
                statusClass = "bg-rose-600 text-white font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                pctK = 40; pctP = 30; pctL = 30; tee -= 500;
                saranM = "Wajib menerapkan pola makan defisit kalori. Stop konsumsi gorengan, makanan manis, dan bersantan. Utamakan metode rebus/kukus.";
                saranF = "Lakukan olahraga rendah benturan (low-impact) guna menjaga sendi lutut Anda, seperti bersepeda statis atau berenang.";
                saranC = "Kondisi obesitas berisiko memicu kolesterol dan hipertensi. Disarankan melakukan pemeriksaan medis berkala.";
            }
        }
        
        // --- LANSIA ---
        else {
            document.getElementById('infoKlien').innerText = `Klaster: Lanjut Usia (${gender === 'pria' ? 'Kakek' : 'Nenek'}), ${usiaNilai} Tahun | Acuan Kesehatan Geriatri`;
            document.getElementById('skorUnit').innerText = "kg/m²";

            if (imt < 20.0) {
                txtKategori = "Lansia Kurang Gizi";
                statusClass = "bg-rose-500 text-white font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                pctK = 50; pctP = 30; pctL = 20; tee += 250;
                saranM = "Sajikan makanan bertekstur empuk atau lunak agar mudah dicerna. Sediakan susu formula bernutrisi tinggi khusus lansia.";
                saranF = "Lakukan latihan peregangan fisik sederhana di rumah secara perlahan demi mencegah kekakuan otot.";
                saranC = "Kurang gizi pada lansia menurunkan imunitas. Harap lakukan pemantauan asupan makan secara intensif oleh keluarga.";
            } else if (imt >= 20.0 && imt <= 24.9) {
                txtKategori = "Lansia Sehat & Ideal";
                statusClass = "bg-emerald-500 text-slate-900 font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                saranM = "Pertahankan menu sehat harian saat ini. Ingatkan lansia untuk selalu minum air putih 6-8 gelas sehari agar bebas dehidrasi.";
                saranF = "Dukung untuk rutin berjalan santai di bawah sinar matahari pagi sekitar 15-20 menit agar tulang tetap kokoh.";
                saranC = "Status gizi di usia lanjut berada pada batas yang sangat aman dan prima. Jaga mood agar selalu bahagia.";
            } else {
                txtKategori = "Lansia Obesitas";
                statusClass = "bg-rose-600 text-white font-black px-4 py-2 rounded-xl text-xs uppercase tracking-wide shadow-sm";
                pctK = 45; pctP = 25; pctL = 30; tee -= 200;
                saranM = "Batasi lauk pauk yang berlemak jenuh tinggi, bersantan kental, serta kurangi penggunaan garam berlebih.";
                saranF = "Lakukan aktivitas pergerakan sendi ringan yang aman, misalnya senam peregangan sambil duduk di kursi.";
                saranC = "Berat badan yang berlebih berisiko menimbulkan nyeri hebat pada persendian lutut lansia.";
            }
        }

        document.getElementById('hasilStatus').innerText = txtKategori;
        document.getElementById('hasilStatus').className = statusClass;
        
        document.getElementById('hasilBMR').innerHTML = `${Math.round(bmr)} <span class="text-xs font-medium text-slate-400">Kalori</span>`;
        document.getElementById('hasilTEE').innerHTML = `${Math.round(tee)} <span class="text-xs font-medium text-slate-400">Kalori</span>`;

        const gramK = ((pctK / 100) * tee) / 4;
        const gramP = ((pctP / 100) * tee) / 4;
        const gramL = ((pctL / 100) * tee) / 9;

        document.getElementById('pctKarbo').innerText = `${pctK}%`;
        document.getElementById('pctProtein').innerText = `${pctP}%`;
        document.getElementById('pctLemak').innerText = `${pctL}%`;

        document.getElementById('gramKarbo').innerHTML = `${Math.round(gramK)}g <span class="text-xs font-medium text-slate-400">/ hari</span>`;
        document.getElementById('gramProtein').innerHTML = `${Math.round(gramP)}g <span class="text-xs font-medium text-slate-400">/ hari</span>`;
        document.getElementById('gramLemak').innerHTML = `${Math.round(gramL)}g <span class="text-xs font-medium text-slate-400">/ hari</span>`;

        document.getElementById('saranMakan').innerText = saranM;
        document.getElementById('saranFisik').innerText = saranF;
        document.getElementById('saranCatatan').innerText = saranC;
    }
</script>
@endpush