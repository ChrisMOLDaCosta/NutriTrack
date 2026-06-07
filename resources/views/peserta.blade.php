@extends('layouts.app')

@section('content')
<div class="space-y-6 relative antialiased text-slate-800 font-sans p-2 sm:p-5 max-w-[1600px] mx-auto animate-fade-in-up">
    
    <!-- NOTIFIKASI TOAST SUCCESS (Premium Glassmorphism Dashboard Style) -->
    @if(session('success'))
    <div id="toastSuccess" class="fixed top-6 right-6 bg-slate-950/95 backdrop-blur-md text-white px-5 py-4 rounded-2xl shadow-2xl border border-slate-800 flex items-center gap-4 z-50 transition-all duration-500 ease-out animate-slide-in">
        <div class="w-9 h-9 bg-emerald-500/20 rounded-xl flex items-center justify-center text-emerald-400 shadow-inner animate-bounce">
            <i class="fa-solid fa-circle-check text-base"></i>
        </div>
        <div>
            <p class="text-[10px] text-emerald-400 font-bold uppercase tracking-wider">Notifikasi Sukses</p>
            <p class="text-xs font-medium text-slate-200 mt-0.5">{{ session('success') }}</p>
        </div>
        <button onclick="closeToast('toastSuccess')" class="text-slate-400 hover:text-white transition-colors pl-2 active:scale-90">
            <i class="fa-solid fa-xmark text-xs"></i>
        </button>
    </div>
    @endif

    <!-- NOTIFIKASI TOAST ERROR -->
    @if(session('error'))
    <div id="toastError" class="fixed top-6 right-6 bg-slate-950/95 backdrop-blur-md text-white px-5 py-4 rounded-2xl shadow-2xl border border-rose-900 flex items-center gap-4 z-50 transition-all duration-500 ease-out animate-slide-in">
        <div class="w-9 h-9 bg-rose-500/20 rounded-xl flex items-center justify-center text-rose-400 shadow-inner animate-shake">
            <i class="fa-solid fa-circle-xmark text-base"></i>
        </div>
        <div>
            <p class="text-[10px] text-rose-400 font-bold uppercase tracking-wider">Sistem Error</p>
            <p class="text-xs font-medium text-slate-200 mt-0.5">{{ session('error') }}</p>
        </div>
        <button onclick="closeToast('toastError')" class="text-slate-400 hover:text-white transition-colors pl-2 active:scale-90">
            <i class="fa-solid fa-xmark text-xs"></i>
        </button>
    </div>
    @endif

    <!-- HERO HEADER (Glow Dashboard Theme) -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 p-6 sm:p-8 rounded-2xl border border-slate-800 shadow-xl relative overflow-hidden group">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none transition-all duration-700 group-hover:bg-emerald-500/20"></div>
        
        <div class="relative z-10 space-y-1">
            <span class="inline-flex items-center gap-1.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-[10px] font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wider">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span> Live Master Data
            </span>
            <h2 class="text-xl sm:text-2xl font-extrabold tracking-tight text-white">
                Daftar Anak Terdata
            </h2>
            <p class="text-xs sm:text-sm text-slate-400 font-medium max-w-xl opacity-90">
                Sistem kendali manajemen berkas fisik anak & Program Makan Bergizi Gratis secara presisi.
            </p>
        </div>
        
        <button onclick="toggleModal('modalTambah', true)" class="w-full sm:w-auto bg-emerald-500 hover:bg-emerald-400 active:scale-[0.97] text-slate-950 px-5 py-2.5 rounded-xl text-xs font-extrabold shadow-lg shadow-emerald-500/20 transition-all duration-200 flex items-center justify-center gap-2 group relative z-10">
            <i class="fa-solid fa-plus text-[10px] group-hover:rotate-90 transition-transform duration-300"></i>
            Tambah Peserta Baru
        </button>
    </div>

    <!-- STATS WIDGET CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5">
        <div class="group bg-white p-5 rounded-2xl border border-slate-100 flex items-center justify-between shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="space-y-1">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Total Anak Terdaftar</p>
                <h3 class="text-2xl font-black text-slate-800">{{ count($dataSiswa) }} <span class="text-xs font-medium text-slate-400">Jiwa</span></h3>
            </div>
            <div class="w-9 h-9 bg-slate-50 border border-slate-100 text-slate-400 group-hover:bg-slate-900 group-hover:text-white group-hover:border-slate-900 rounded-xl flex items-center justify-center text-sm transition-all duration-300"><i class="fa-solid fa-children"></i></div>
        </div>

        <div class="group bg-white p-5 rounded-2xl border border-slate-100 flex items-center justify-between shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="space-y-1">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Rata-Rata Usia</p>
                <h3 class="text-2xl font-black text-slate-800">{{ count($dataSiswa) > 0 ? round($dataSiswa->avg('usia'), 1) : 0 }} <span class="text-xs font-medium text-slate-400">Tahun</span></h3>
            </div>
            <div class="w-9 h-9 bg-slate-50 border border-slate-100 text-slate-400 group-hover:bg-slate-900 group-hover:text-white group-hover:border-slate-900 rounded-xl flex items-center justify-center text-sm transition-all duration-300"><i class="fa-solid fa-calendar-day"></i></div>
        </div>

        <div class="group bg-white p-5 rounded-2xl border border-slate-100 flex items-center justify-between shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="space-y-1">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Cakupan Sekolah</p>
                <h3 class="text-2xl font-black text-slate-800">{{ count($dataSiswa) > 0 ? $dataSiswa->unique('asal_sekolah')->count() : 0 }} <span class="text-xs font-medium text-slate-400">Lembaga</span></h3>
            </div>
            <div class="w-9 h-9 bg-slate-50 border border-slate-100 text-slate-400 group-hover:bg-slate-900 group-hover:text-white group-hover:border-slate-900 rounded-xl flex items-center justify-center text-sm transition-all duration-300"><i class="fa-solid fa-school"></i></div>
        </div>
    </div>

    <!-- FILTER SEARCH BAR -->
    <div class="bg-white p-3 rounded-xl border border-slate-100 shadow-sm flex flex-col sm:flex-row gap-3 items-center justify-between">
        <div class="relative w-full sm:w-80 group">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </span>
            <input type="text" id="tableSearch" onkeyup="searchTable()" placeholder="Cari nama anak, sekolah atau NISN..." class="w-full pl-9 pr-4 py-2 text-xs bg-slate-50 border border-slate-200 rounded-lg outline-none focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 transition-all font-medium placeholder:text-slate-400">
        </div>
        <div class="flex items-center gap-1.5 text-[10px] text-slate-400 font-bold uppercase tracking-wider bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-100 select-none">
            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
            Terhubung Database
        </div>
    </div>

    <!-- MAIN DATA TABLE (Rapi, Berwarna Pro, Beranimasi Hidup) -->
    <div class="bg-white rounded-xl shadow-md border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[950px]" id="siswaTable">
                <thead>
                    <tr class="bg-slate-900 text-[10px] font-bold uppercase tracking-wider text-slate-300 select-none">
                        <th class="py-3.5 px-5 font-semibold w-[140px]">NISN Pokok</th>
                        <th class="py-3.5 px-5 font-semibold">Identitas & Gender</th>
                        <th class="py-3.5 px-5 font-semibold w-[110px]">Usia Anak</th>
                        <th class="py-3.5 px-5 font-semibold w-[220px]">Kondisi Fisik Antropometri</th>
                        <th class="py-3.5 px-5 font-semibold">Sektor Pendidikan</th>
                        <th class="py-3.5 px-5 font-semibold text-center w-[120px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                    @forelse($dataSiswa as $siswa)
                    <tr class="hover:bg-emerald-50/40 transition-all duration-200 table-row-item group">
                        
                        <!-- NISN (Clean & Bold Mono) -->
                        <td class="py-4 px-5 font-mono text-slate-500 tracking-tight font-medium">
                            {{ $siswa->nisn }}
                        </td>
                        
                        <!-- IDENTITAS & GENDER (Sangat Rapi & Berwarna Harmonis) -->
                        <td class="py-4 px-5">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-slate-800 text-[13px] tracking-tight group-hover:text-slate-950 transition-colors">{{ $siswa->nama_lengkap }}</span>
                                
                                @if(($siswa->jenis_kelamin ?? '') == 'Laki-laki')
                                    <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-100 px-2 py-0.5 rounded-md flex items-center gap-1"><i class="fa-solid fa-mars text-[9px]"></i> Laki-laki</span>
                                @elseif(($siswa->jenis_kelamin ?? '') == 'Perempuan')
                                    <span class="text-[10px] font-bold text-pink-600 bg-pink-50 border border-pink-100 px-2 py-0.5 rounded-md flex items-center gap-1"><i class="fa-solid fa-venus text-[9px]"></i> Perempuan</span>
                                @endif
                            </div>
                        </td>
                        
                        <!-- USIA (Soft Amber Accent) -->
                        <td class="py-4 px-5">
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 border border-amber-100 px-2 py-0.5 rounded-md">
                                {{ $siswa->usia }} Tahun
                            </span>
                        </td>
                        
                        <!-- KONDISI FISIK (Rapi dengan Ikon Berwarna Lembut) -->
                        <td class="py-4 px-5">
                            <div class="flex items-center gap-4 text-slate-600 font-medium">
                                <span class="flex items-center gap-1.5"><i class="fa-solid fa-weight-scale text-emerald-500 text-[11px]"></i> <span class="text-slate-900 font-bold">{{ $siswa->berat_badan ?? '-' }}</span> kg</span>
                                <span class="text-slate-200">|</span>
                                <span class="flex items-center gap-1.5"><i class="fa-solid fa-ruler-vertical text-indigo-500 text-[11px]"></i> <span class="text-slate-900 font-bold">{{ $siswa->tinggi_badan ?? '-' }}</span> cm</span>
                            </div>
                        </td>
                        
                        <!-- SEKTOR PENDIDIKAN -->
                        <td class="py-4 px-5">
                            <div class="flex items-center gap-2.5">
                                <span class="text-slate-800 font-semibold flex items-center gap-1.5"><i class="fa-solid fa-school text-slate-400"></i> {{ $siswa->asal_sekolah }}</span>
                                <span class="text-[10px] font-bold text-slate-600 bg-slate-100 border border-slate-200 px-2 py-0.5 rounded-md">Kelas {{ $siswa->kelas ?? '-' }}</span>
                            </div>
                        </td>
                        
                        <!-- AKSI INTERAKTIF (Tersembunyi, Muncul Beranimasi Saat Hover) -->
                        <td class="py-4 px-5 text-center">
                            <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 -translate-x-2 transition-all duration-300">
                                <button type="button" onclick="openEditModal({{ json_encode($siswa) }})" class="w-7 h-7 rounded-lg text-slate-600 bg-slate-100 hover:bg-slate-900 hover:text-white flex items-center justify-center shadow-sm transition-all hover:-translate-y-0.5 active:scale-95" title="Ubah">
                                    <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                                </button>
                                
                                <form action="{{ route('peserta.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin bermaksud menghapus data permanen {{ $siswa->nama_lengkap }}?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-7 h-7 rounded-lg text-rose-600 bg-rose-50 hover:bg-rose-600 hover:text-white flex items-center justify-center shadow-sm transition-all hover:-translate-y-0.5 active:scale-95" title="Hapus">
                                        <i class="fa-solid fa-trash text-[11px]"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-16 text-center text-slate-400">
                            <div class="flex flex-col items-center justify-center gap-2 py-4">
                                <i class="fa-solid fa-folder-open text-2xl text-slate-200"></i>
                                <p class="text-xs font-semibold text-slate-700">Belum Ada Berkas Peserta</p>
                                <p class="text-[11px] text-slate-400">Klik tombol tambah peserta baru untuk mengisi data.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL TAMBAH PESERTA -->
    <div id="modalTambah" class="hidden fixed inset-0 bg-slate-950/40 backdrop-blur-sm flex items-center justify-center p-4 z-50 transition-all duration-300 opacity-0">
        <div class="bg-white rounded-2xl shadow-xl max-w-xl w-full border border-slate-100 flex flex-col transform scale-95 opacity-0 transition-all duration-300 max-h-[90vh]">
            <form action="{{ route('peserta.store') }}" method="POST" class="flex flex-col h-full m-0">
                @csrf
                <div class="flex justify-between items-center px-6 py-4 border-b border-slate-100 bg-slate-50 rounded-t-2xl">
                    <h3 class="text-sm font-bold text-slate-800 tracking-tight">Pendaftaran Peserta Baru</h3>
                    <button type="button" onclick="toggleModal('modalTambah', false)" class="w-7 h-7 rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all flex items-center justify-center active:scale-90"><i class="fa-solid fa-xmark text-xs"></i></button>
                </div>
                
                <div class="p-6 space-y-4 overflow-y-auto max-h-[calc(90vh-140px)]">
                    @if ($errors->any())
                    <div class="p-3 text-xs rounded-xl bg-rose-50 border border-rose-100 text-rose-800 font-medium animate-shake">
                        <ul class="list-disc pl-4 space-y-0.5 text-rose-700">
                            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">NISN <span class="text-rose-500">*</span></label>
                            <input type="text" name="nisn" value="{{ old('nisn') }}" placeholder="10 Digit angka aktif" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 bg-slate-50 focus:bg-white transition-all placeholder:text-slate-300" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Nama Lengkap Siswa <span class="text-rose-500">*</span></label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Sesuai akta kelahiran" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 bg-slate-50 focus:bg-white transition-all placeholder:text-slate-300" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Jenis Kelamin <span class="text-rose-500">*</span></label>
                            <select name="jenis_kelamin" class="w-full border border-slate-200 bg-slate-50 focus:bg-white rounded-lg px-3 py-2 text-xs font-bold text-slate-700 outline-none focus:border-emerald-500 transition-all" required>
                                <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih Gender</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Usia (Tahun) <span class="text-rose-500">*</span></label>
                            <input type="number" name="usia" value="{{ old('usia') }}" min="1" max="25" placeholder="Contoh: 8" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 bg-slate-50 focus:bg-white transition-all placeholder:text-slate-300" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Lembaga Sekolah <span class="text-rose-500">*</span></label>
                            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" placeholder="Contoh: SDN 01" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 bg-slate-50 focus:bg-white transition-all placeholder:text-slate-300" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Kelas Tingkatan <span class="text-rose-500">*</span></label>
                            <input type="text" name="kelas" value="{{ old('kelas') }}" placeholder="Contoh: 3-B atau 4" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 bg-slate-50 focus:bg-white transition-all placeholder:text-slate-300" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Berat Badan (kg) <span class="text-rose-500">*</span></label>
                            <input type="number" step="0.1" name="berat_badan" value="{{ old('berat_badan') }}" placeholder="Contoh: 28.4" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 bg-slate-50 focus:bg-white transition-all placeholder:text-slate-300" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Tinggi Badan (cm) <span class="text-rose-500">*</span></label>
                            <input type="number" step="0.1" name="tinggi_badan" value="{{ old('tinggi_badan') }}" placeholder="Contoh: 132.5" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 bg-slate-50 focus:bg-white transition-all placeholder:text-slate-300" required>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-2 px-6 py-3.5 border-t border-slate-100 bg-slate-50 rounded-b-2xl">
                    <button type="button" onclick="toggleModal('modalTambah', false)" class="px-3.5 py-1.5 border border-slate-200 rounded-lg text-xs font-bold text-slate-600 hover:bg-slate-100 transition-colors">Batal</button>
                    <button type="submit" class="px-4 py-1.5 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-bold transition-all shadow-sm">Simpan Berkas</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT PESERTA -->
    <div id="modalEdit" class="hidden fixed inset-0 bg-slate-950/40 backdrop-blur-sm flex items-center justify-center p-4 z-50 transition-all duration-300 opacity-0">
        <div class="bg-white rounded-2xl shadow-xl max-w-xl w-full border border-slate-100 flex flex-col transform scale-95 opacity-0 transition-all duration-300 max-h-[90vh]">
            <form id="formEditPeserta" method="POST" class="flex flex-col h-full m-0">
                @csrf
                @method('PUT')
                <div class="flex justify-between items-center px-6 py-4 border-b border-slate-100 bg-slate-50 rounded-t-2xl">
                    <h3 class="text-sm font-bold text-slate-800 tracking-tight">Koreksi Informasi Anak</h3>
                    <button type="button" onclick="toggleModal('modalEdit', false)" class="w-7 h-7 rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all flex items-center justify-center active:scale-90"><i class="fa-solid fa-xmark text-xs"></i></button>
                </div>
                
                <div class="p-6 space-y-4 overflow-y-auto max-h-[calc(90vh-140px)]">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">NISN Terkunci (Sistem)</label>
                            <input type="text" id="edit_nisn" name="nisn" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs bg-slate-100 text-slate-500 outline-none cursor-not-allowed font-mono font-bold" readonly>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                            <input type="text" id="edit_nama_lengkap" name="nama_lengkap" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Jenis Kelamin <span class="text-rose-500">*</span></label>
                            <select id="edit_jenis_kelamin" name="jenis_kelamin" class="w-full border border-slate-200 bg-white rounded-lg px-3 py-2 text-xs font-bold text-slate-700 outline-none focus:border-emerald-500 transition-all" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Usia Terkini (Tahun) <span class="text-rose-500">*</span></label>
                            <input type="number" id="edit_usia" name="usia" min="1" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Instansi Sekolah <span class="text-rose-500">*</span></label>
                            <input type="text" id="edit_asal_sekolah" name="asal_sekolah" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Kelas Tingkat <span class="text-rose-500">*</span></label>
                            <input type="text" id="edit_kelas" name="kelas" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Berat Badan (kg) <span class="text-rose-500">*</span></label>
                            <input type="number" step="0.1" id="edit_berat_badan" name="berat_badan" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Tinggi Badan (cm) <span class="text-rose-500">*</span></label>
                            <input type="number" step="0.1" id="edit_tinggi_badan" name="tinggi_badan" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 outline-none focus:border-emerald-500 transition-all" required>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-2 px-6 py-3.5 border-t border-slate-100 bg-slate-50 rounded-b-2xl">
                    <button type="button" onclick="toggleModal('modalEdit', false)" class="px-3.5 py-1.5 border border-slate-200 rounded-lg text-xs font-bold text-slate-600 hover:bg-slate-100 transition-colors">Batal</button>
                    <button type="submit" class="px-4 py-1.5 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-bold transition-all shadow-sm">Terapkan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideIn {
        from { transform: translateX(110%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-4px); }
        75% { transform: translateX(4px); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .animate-slide-in { animation: slideIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .animate-shake { animation: shake 0.2s ease-in-out; }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if ($errors->any())
            toggleModal('modalTambah', true);
        @endif
    });

    function toggleModal(modalId, show) {
        const modal = document.getElementById(modalId);
        const modalBox = modal.querySelector('.transform');
        
        if (show) {
            modal.classList.remove('hidden');
            void modal.offsetWidth; 
            modal.classList.remove('opacity-0');
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        } else {
            modal.classList.add('opacity-0');
            modalBox.classList.remove('scale-100', 'opacity-100');
            modalBox.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 250);
        }
    }

    function openEditModal(siswa) {
        document.getElementById('edit_nisn').value = siswa.nisn || '';
        document.getElementById('edit_nama_lengkap').value = siswa.nama_lengkap || '';
        document.getElementById('edit_jenis_kelamin').value = siswa.jenis_kelamin || 'Laki-laki';
        document.getElementById('edit_usia').value = siswa.usia || '';
        document.getElementById('edit_asal_sekolah').value = siswa.asal_sekolah || '';
        document.getElementById('edit_kelas').value = siswa.kelas || '';
        document.getElementById('edit_berat_badan').value = siswa.berat_badan || '';
        document.getElementById('edit_tinggi_badan').value = siswa.tinggi_badan || '';

        const formEdit = document.getElementById('formEditPeserta');
        formEdit.action = `/peserta/${siswa.id}`;

        toggleModal('modalEdit', true);
    }

    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.style.transform = 'translateY(-10px)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }

    function searchTable() {
        const input = document.getElementById("tableSearch");
        const filter = input.value.toUpperCase();
        const rows = document.querySelectorAll("#siswaTable .table-row-item");

        rows.forEach(row => {
            const text = row.textContent || row.innerText;
            row.style.display = text.toUpperCase().includes(filter) ? "" : "none";
        });
    }
</script>
@endpush