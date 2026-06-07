<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriTrack - Pantau Gizi Anak, Bangun Generasi Sehat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js CDN untuk Animasi Real-time Monitoring Grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            accent: '#10b981',      
                            accentHover: '#059669', 
                            dark: '#0f172a',        
                            slateMuted: '#64748b',  
                            ice: '#f0fdf4',         
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        .glass-header { background: rgba(255, 255, 255, 0.75); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); }
        .gradient-mesh {
            background: radial-gradient(circle at 85% 15%, rgba(16, 185, 129, 0.12), transparent 45%),
                        radial-gradient(circle at 15% 75%, rgba(6, 182, 212, 0.08), transparent 50%);
        }
    </style>
</head>
<body class="bg-[#f8fafc] font-sans antialiased text-slate-800 gradient-mesh min-h-screen">

    <!-- HEADER NAVIGATION -->
    <header class="glass-header sticky top-0 z-50 border-b border-slate-200/50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            
            <!-- Logo Brand -->
            <div class="flex items-center gap-3 group cursor-pointer">
                <div class="relative flex items-center justify-center">
                    <div class="absolute inset-0 bg-brand-accent/25 rounded-xl blur-lg"></div>
                    <img src="{{ asset('images/logo.png') }}" alt="NutriTrack Logo" class="h-10 w-auto object-contain relative z-10">
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-black tracking-tight text-slate-900 leading-none">Nutri<span class="text-brand-accent">Track</span></span>
                    <span class="text-[9px] font-extrabold text-brand-slateMuted tracking-widest uppercase mt-1">Sistem Pemantauan Gizi Nasional</span>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="hidden lg:flex items-center gap-8 text-xs font-bold uppercase tracking-wider text-slate-600">
                <a href="#monitoring-tren" class="hover:text-brand-accent transition-colors">Monitoring Tren</a>
                <a href="#fitur-inti" class="hover:text-brand-accent transition-colors">Modul Aplikasi</a>
                <a href="#kalkulator-universal" class="bg-brand-ice border border-emerald-200/60 px-3 py-1.5 rounded-lg text-brand-accent hover:bg-brand-accent hover:text-white transition-all">Coba Kalkulator BMI</a>
                <a href="#faq" class="hover:text-brand-accent transition-colors">FAQ Pusat</a>
            </nav>

            <!-- Action Auth Button -->
            <div class="flex items-center gap-4">
                <a href="{{ url('/login') }}" class="text-xs font-extrabold uppercase tracking-wider text-slate-700 hover:text-brand-accent transition-colors">Masuk</a>
                <a href="{{ url('/register') }}" class="bg-slate-900 hover:bg-brand-accent hover:text-slate-950 text-white text-xs font-black uppercase tracking-wider px-5 py-3.5 rounded-xl shadow-md transition-all">
                    Registrasi Petugas <i class="fa-solid fa-arrow-right-to-bracket ml-2 text-[10px]"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- HERO MAIN SECTION (TAGLINE RESMI) -->
    <section class="relative pt-12 pb-20 lg:py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Info Column -->
            <div class="space-y-6 lg:col-span-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 bg-emerald-100/70 border border-emerald-200/80 text-emerald-800 px-4 py-2 rounded-full text-[10px] font-black tracking-wider uppercase mx-auto lg:mx-0 shadow-sm">
                    <i class="fa-solid fa-circle-check text-brand-accent"></i> Sinkronisasi Dashboard Data Real-time
                </div>
                <!-- Sesuai Permintaan: Tagline Wajib -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 leading-[1.15] tracking-tight">
                    Pantau Gizi Anak,<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-500">
                        Bangun Generasi Sehat.
                    </span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-500 font-semibold leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Sistem integrasi NutriTrack dirancang khusus untuk mempermudah pencatatan berkala, pemantauan status indikator gizi, serta pelaporan logistik intervensi pemulihan anak. Membantu instansi mewujudkan generasi bebas stunting melalui keputusan data yang akurat.
                </p>
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ url('/register') }}" class="bg-brand-accent hover:bg-brand-accentHover text-slate-950 hover:text-white font-black text-xs uppercase tracking-wider px-8 py-4 rounded-xl shadow-lg transition-all">
                        Mulai Registrasi Petugas
                    </a>
                    <a href="#monitoring-tren" class="border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-bold text-xs uppercase tracking-wider px-7 py-4 rounded-xl shadow-sm transition">
                        Lihat Live Grafik Monitoring <i class="fa-solid fa-chart-line ml-1.5 text-brand-accent"></i>
                    </a>
                </div>
            </div>

            <!-- Right Visual Column: Live Monitoring Graphic Animation -->
            <div id="monitoring-tren" class="lg:col-span-6 flex justify-center relative">
                <div class="w-full max-w-xl bg-white rounded-2xl p-5 border border-slate-200 shadow-xl space-y-4">
                    <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                        <div>
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Live Demo Dashboard</span>
                            <h3 class="text-sm font-black text-slate-900">Grafik Monitoring Tren Gizi Wilayah</h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-ping"></span>
                            <span class="text-[10px] font-mono font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">Aktif Memantau</span>
                        </div>
                    </div>
                    
                    <!-- Container Canvas Chart JS -->
                    <div class="relative h-56 w-full">
                        <canvas id="liveMonitoringChart"></canvas>
                    </div>
                    
                    <p class="text-[10px] text-slate-400 text-center font-medium">
                        *Grafik di atas menyimulasikan fluktuasi penurunan persentase kasus gizi buruk pasca implementasi intervensi nutrisi terpadu.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- TEASER INDEKS KALKULATOR BMI UNIVERSAL (PANCINGAN INTERAKTIF) -->
    <section id="kalkulator-universal" class="py-16 bg-white border-y border-slate-200/60">
        <div class="max-w-4xl mx-auto px-6">
            
            <div class="text-center space-y-2 mb-10">
                <span class="text-[10px] bg-slate-900 text-white font-black tracking-widest uppercase px-3 py-1 rounded-md">Uji Coba Fitur</span>
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Kalkulator BMI Sederhana</h2>
                <p class="text-xs text-slate-500 font-semibold max-w-md mx-auto">Rasakan kemudahan kalkulasi instan. Masuk ke dashboard utama untuk analisis gizi anak yang jauh lebih mendalam (Z-Score & grafik WHO).</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                <!-- Inputs (Universal: Untuk Semua Orang) -->
                <div class="md:col-span-5 space-y-3.5">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-600 uppercase block">Berat Badan (kg)</label>
                        <input type="number" id="uni-weight" placeholder="Contoh: 60" class="w-full px-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:border-brand-accent">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-600 uppercase block">Tinggi Badan (cm)</label>
                        <input type="number" id="uni-height" placeholder="Contoh: 165" class="w-full px-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:border-brand-accent">
                    </div>
                    <button type="button" onclick="calculateUniversalBMI()" class="w-full py-3 bg-slate-900 hover:bg-brand-accent hover:text-slate-950 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-all">
                        Cek Hasil Indeks <i class="fa-solid fa-bolt ml-1 text-amber-400"></i>
                    </button>
                </div>

                <!-- Simple Display Box Result -->
                <div class="md:col-span-7 bg-slate-900 text-white p-5 rounded-xl min-h-[170px] flex flex-col justify-between relative overflow-hidden">
                    <div id="uni-placeholder" class="absolute inset-0 bg-slate-900 flex flex-col items-center justify-center text-center p-4">
                        <p class="text-xs font-bold text-slate-400">Masukkan Data Fisik Anda</p>
                        <p class="text-[10px] text-slate-500 mt-0.5">Hasil klasifikasi massa tubuh singkat akan tampil di sini.</p>
                    </div>

                    <div id="uni-result-view" class="space-y-3 opacity-0 transition-all duration-300">
                        <div class="flex justify-between items-center border-b border-white/5 pb-2">
                            <div>
                                <span class="text-[9px] text-slate-400 font-bold uppercase block">Skor BMI Anda</span>
                                <h4 id="uni-render-score" class="text-3xl font-black text-brand-accent">22.4</h4>
                            </div>
                            <span id="uni-render-badge" class="text-[9px] font-black uppercase px-2.5 py-1 rounded bg-white/10">Normal</span>
                        </div>
                        <p id="uni-render-advice" class="text-[11px] text-slate-400 leading-relaxed font-medium">--</p>
                        
                        <div class="pt-1 text-center border-t border-white/5">
                            <a href="{{ url('/register') }}" class="text-[10px] text-brand-accent hover:underline font-bold">Tertarik dengan fitur lengkap? Daftar Akun Petugas Kelola Gizi Siswa &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CORE MODULE LISTS -->
    <section id="fitur-inti" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-xl mx-auto space-y-2 mb-12">
                <span class="text-[10px] bg-slate-900 text-white font-black tracking-widest uppercase px-3 py-1 rounded-md">Manajemen Internal</span>
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Modul Halaman Aplikasi NutriTrack</h2>
                <p class="text-slate-500 text-xs font-semibold leading-relaxed">Seluruh fungsionalitas utama yang siap Anda kelola di dalam gerbang sistem autentikasi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Modul 1 -->
                <div class="p-5 rounded-xl bg-slate-50 border border-slate-200/70 space-y-2">
                    <div class="w-9 h-9 rounded-lg bg-emerald-100 text-brand-accent flex items-center justify-center text-sm"><i class="fa-solid fa-table-list"></i></div>
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Halaman Kelola Data Siswa</h4>
                    <p class="text-slate-500 text-[11px] font-medium leading-relaxed">Tempat utama untuk mendaftarkan nama siswa/anak, mengelompokkan rombel, serta mengarsipkan riwayat log rekam medis fisik bulanan.</p>
                </div>
                <!-- Modul 2 -->
                <div class="p-5 rounded-xl bg-slate-50 border border-slate-200/70 space-y-2">
                    <div class="w-9 h-9 rounded-lg bg-emerald-100 text-brand-accent flex items-center justify-center text-sm"><i class="fa-solid fa-chart-line"></i></div>
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Halaman Grafik Antropometri</h4>
                    <p class="text-slate-500 text-[11px] font-medium leading-relaxed">Visualisasi diagram kurva pertumbuhan anak (TB/U, BB/U, dan BMI/U) berdasarkan standarisasi kalkulasi deviasi matematika Z-Score.</p>
                </div>
                <!-- Modul 3 -->
                <div class="p-5 rounded-xl bg-slate-50 border border-slate-200/70 space-y-2">
                    <div class="w-9 h-9 rounded-lg bg-emerald-100 text-brand-accent flex items-center justify-center text-sm"><i class="fa-solid fa-file-export"></i></div>
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Halaman Ekspor Laporan</h4>
                    <p class="text-slate-500 text-[11px] font-medium leading-relaxed">Fasilitas instan bagi kepala instansi atau puskesmas untuk mengunduh rekapitulasi data gizi berformat spreadsheet Excel siap kirim ke Dinas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- EXPANDED REAL SYSTEM OPERATIONAL FAQ (DIPERBANYAK & RELEVAN DENGAN WEB) -->
    <section id="faq" class="py-16 bg-slate-50 border-t border-slate-200/60">
        <div class="max-w-3xl mx-auto px-6">
            <div class="text-center space-y-2 mb-12">
                <span class="text-[10px] bg-slate-200 text-slate-800 font-black tracking-widest uppercase px-3 py-1 rounded-md">Pertanyaan Operasional</span>
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">FAQ Sistem NutriTrack</h2>
                <p class="text-xs text-slate-500 font-semibold">Segala hal yang perlu diketahui oleh calon petugas atau instansi pengguna.</p>
            </div>

            <div class="space-y-3">
                <div class="bg-white border border-slate-200 rounded-xl p-4 cursor-pointer" onclick="toggleFaq(this)">
                    <div class="flex justify-between items-center">
                        <h4 class="text-xs font-bold text-slate-900">Siapa saja yang diperbolehkan mendaftar akun sebagai petugas?</h4>
                        <span class="text-slate-400 text-xs transition-transform"><i class="fa-solid fa-chevron-down"></i></span>
                    </div>
                    <p class="text-[11px] text-slate-500 mt-2 leading-relaxed hidden">Pendaftaran akun di halaman registrasi terbuka untuk Bidan Desa, Tenaga Pelaksana Gizi (TPG) Puskesmas, Kader Posyandu, serta Guru/Petugas Administrasi sekolah yang ditunjuk resmi untuk mengelola data tumbuh kembang anak didik.</p>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl p-4 cursor-pointer" onclick="toggleFaq(this)">
                    <div class="flex justify-between items-center">
                        <h4 class="text-xs font-bold text-slate-900">Bagaimana cara memasukkan data jika jumlah siswa sangat banyak?</h4>
                        <span class="text-slate-400 text-xs transition-transform"><i class="fa-solid fa-chevron-down"></i></span>
                    </div>
                    <p class="text-[11px] text-slate-500 mt-2 leading-relaxed hidden">Di dalam sistem internal (setelah login), tersedia fitur penginputan data kolektif. Anda juga dapat menggunakan template khusus untuk mengunggah spreadsheet Excel data siswa secara massal sekaligus demi efisiensi waktu petugas.</p>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl p-4 cursor-pointer" onclick="toggleFaq(this)">
                    <div class="flex justify-between items-center">
                        <h4 class="text-xs font-bold text-slate-900">Apakah grafik riwayat pertumbuhan anak bisa dicetak secara individu?</h4>
                        <span class="text-slate-400 text-xs transition-transform"><i class="fa-solid fa-chevron-down"></i></span>
                    </div>
                    <p class="text-[11px] text-slate-500 mt-2 leading-relaxed hidden">Bisa. Pada modul Halaman Grafik Antropometri, terdapat tombol khusus untuk mencetak kartu rekam gizi per anak didik dalam format ringkas yang bisa dibagikan langsung kepada orang tua siswa.</p>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl p-4 cursor-pointer" onclick="toggleFaq(this)">
                    <div class="flex justify-between items-center">
                        <h4 class="text-xs font-bold text-slate-900">Bagaimana aspek keamanan data pribadi anak di platform ini?</h4>
                        <span class="text-slate-400 text-xs transition-transform"><i class="fa-solid fa-chevron-down"></i></span>
                    </div>
                    <p class="text-[11px] text-slate-500 mt-2 leading-relaxed hidden">Seluruh rekam data medis dilindungi oleh protokol enkripsi di dalam database sistem. Data profil anak hanya dapat diakses, diubah, dan dikelola oleh institusi terdaftar yang memiliki relasi wilayah kerja langsung dengan siswa bersangkutan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-500 py-10 text-xs font-medium border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <span class="text-white font-black">Nutri<span class="text-brand-accent">Track</span></span>
                <span class="text-slate-800">|</span>
                <p>&copy; 2026 Tim Pengembang NutriTrack. All rights reserved.</p>
            </div>
            <div class="flex items-center gap-5 font-bold text-[10px] uppercase tracking-wider">
                <a href="#monitoring-tren" class="hover:text-white transition-colors">Monitoring</a>
                <a href="#kalkulator-universal" class="hover:text-white transition-colors">Kalkulator Teaser</a>
                <a href="{{ url('/login') }}" class="text-brand-accent hover:underline">Sesi Login</a>
            </div>
        </div>
    </footer>

    <!-- LOGIK ENGINE & ANIMATION CONFIG -->
    <script>
        // 1. Inisialisasi Animasi Real-time Monitoring Grafik (Chart.js)
        const ctx = document.getElementById('liveMonitoringChart').getContext('2d');
        const liveChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Tingkat Kasus Malnutrisi (%)',
                    data: [14.2, 12.8, 11.5, 9.4, 7.1, 5.2], // Simulasi tren menurun
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.05)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#10b981'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: 'rgba(0, 0, 0, 0.03)' }, ticks: { font: { size: 10 } } },
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });

        // 2. Logika Teaser Kalkulator BMI Universal (Berlaku Semua Umur)
        function calculateUniversalBMI() {
            const weight = parseFloat(document.getElementById('uni-weight').value);
            const heightCm = parseFloat(document.getElementById('uni-height').value);

            if (!weight || !heightCm || weight <= 0 || heightCm <= 0) {
                alert('Silakan masukkan berat dan tinggi badan yang valid!');
                return;
            }

            const heightM = heightCm / 100;
            const bmi = (weight / (heightM * heightM)).toFixed(1);

            let status = '';
            let badgeClass = '';
            let advice = '';

            if (bmi < 18.5) {
                status = 'Kurus (Underweight)';
                badgeClass = 'bg-amber-500/20 text-amber-400 border border-amber-500/30';
                advice = 'Indeks tubuh di bawah standar normal. Disarankan menambah asupan kalori padat nutrisi makro.';
            } else if (bmi >= 18.5 && bmi < 25.0) {
                status = 'Normal (Ideal)';
                badgeClass = 'bg-emerald-500/20 text-brand-accent border border-emerald-500/30';
                advice = 'Selamat! Bobot tubuh Anda berada di rentang proporsional ideal. Tetap jaga pola makan seimbang Anda.';
            } else if (bmi >= 25.0 && bmi < 30.0) {
                status = 'Gemuk (Overweight)';
                badgeClass = 'bg-orange-500/20 text-orange-400 border border-orange-500/30';
                advice = 'Melebihi batas ideal. Mulai batasi porsi karbohidrat sederhana berlebih serta rutin berolahraga.';
            } else {
                status = 'Obesitas';
                badgeClass = 'bg-red-500/20 text-red-400 border border-red-500/30';
                advice = 'Kategori penumpukan lemak tinggi. Disarankan konsultasi pengaturan defisit kalori harian yang sehat.';
            }

            document.getElementById('uni-placeholder').classList.add('hidden');
            const resView = document.getElementById('uni-result-view');
            resView.classList.remove('opacity-0');

            document.getElementById('uni-render-score').innerText = bmi;
            const badge = document.getElementById('uni-render-badge');
            badge.innerText = status;
            badge.className = `text-[9px] font-black uppercase px-2.5 py-1 rounded ${badgeClass}`;
            document.getElementById('uni-render-advice').innerText = advice;
        }

        // 3. Logika Klik FAQ Accordion
        function toggleFaq(element) {
            const description = element.querySelector('p');
            const icon = element.querySelector('.fa-solid');
            
            if (description.classList.contains('hidden')) {
                description.classList.remove('hidden');
                icon.parentElement.classList.add('rotate-180');
            } else {
                description.classList.add('hidden');
                icon.parentElement.classList.remove('rotate-180');
            }
        }
    </script>
</body>
</html>