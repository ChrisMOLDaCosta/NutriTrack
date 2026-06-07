@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 animate-fade-in mb-12">
    
    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200/60 p-4 rounded-2xl shadow-sm flex items-start gap-3.5 animate-slide-in">
        <div class="w-8 h-8 rounded-xl bg-emerald-500/10 flex items-center justify-center flex-shrink-0 text-emerald-600">
            <i class="fa-solid fa-circle-check text-base"></i>
        </div>
        <div class="space-y-0.5">
            <h5 class="text-sm font-bold text-emerald-900">Operasi Berhasil</h5>
            <p class="text-xs text-emerald-700 font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    @if($errors->any())
    <div class="bg-rose-50 border border-rose-200/60 p-4 rounded-2xl shadow-sm flex items-start gap-3.5 animate-slide-in">
        <div class="w-8 h-8 rounded-xl bg-rose-500/10 flex items-center justify-center flex-shrink-0 text-rose-600">
            <i class="fa-solid fa-circle-exclamation text-base"></i>
        </div>
        <div class="space-y-1">
            <h5 class="text-sm font-bold text-rose-900">Periksa Kembali Isian Anda</h5>
            <ul class="list-disc list-inside text-xs text-rose-700 font-medium space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-100 flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left gap-6 relative overflow-hidden group">
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-brand-accent/5 rounded-full blur-xl group-hover:scale-125 transition-transform duration-500"></div>
        
        <div class="relative w-24 h-24 flex-shrink-0">
            <div class="w-full h-full rounded-2xl bg-gradient-to-tr from-brand-accent to-teal-400 p-0.5 shadow-md shadow-brand-accent/10">
                <div class="w-full h-full bg-white rounded-[14px] overflow-hidden flex items-center justify-center relative">
                    @if($user->avatar)
                        <img id="avatar-preview" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                    @else
                        <div id="avatar-placeholder" class="w-full h-full bg-slate-50 flex items-center justify-center font-black text-3xl text-slate-700 uppercase">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <img id="avatar-preview" src="" alt="Avatar" class="w-full h-full object-cover hidden">
                    @endif
                </div>
            </div>
            <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full shadow-md shadow-emerald-500/30"></span>
        </div>

        <div class="flex-1 w-full space-y-3">
            <div>
                <h2 class="text-xl font-black text-slate-900 tracking-tight leading-tight">{{ $user->name }}</h2>
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 mt-1.5">
                    <span class="text-[9px] font-extrabold text-brand-accent uppercase tracking-widest px-2.5 py-0.5 bg-brand-accent/10 rounded-md">{{ $user->role ?? 'Petugas Gizi' }}</span>
                    <span class="text-xs text-slate-400 font-semibold flex items-center gap-1">
                        <i class="fa-solid fa-building-shield text-slate-300"></i>
                        {{ $user->instansi ?? 'Instansi Belum Diatur' }}
                    </span>
                </div>
            </div>

            <div class="border-t border-slate-100 my-2"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-2 text-xs font-semibold">
                <div class="flex items-center gap-3 p-1.5 rounded-xl hover:bg-slate-50 transition-colors">
                    <div class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 flex-shrink-0"><i class="fa-solid fa-id-card text-[11px]"></i></div>
                    <span class="font-mono text-slate-700">{{ $user->nip_sip ?? 'NIP/SIP Belum Diisi' }}</span>
                </div>
                <div class="flex items-center gap-3 p-1.5 rounded-xl hover:bg-slate-50 transition-colors">
                    <div class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 flex-shrink-0"><i class="fa-solid fa-envelope text-[11px]"></i></div>
                    <span class="text-slate-500 truncate max-w-[200px]" title="{{ $user->email }}">{{ $user->email }}</span>
                </div>
                <div class="flex items-center gap-3 p-1.5 rounded-xl hover:bg-slate-50 transition-colors md:col-span-2">
                    <div class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 flex-shrink-0"><i class="fa-solid fa-phone text-[11px]"></i></div>
                    <span class="text-slate-500">{{ $user->no_hp ?? 'Belum Menambahkan Nomor Handphone' }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        
        <div class="flex border-b border-slate-100 bg-slate-50/60 p-2 gap-1.5">
            <button onclick="switchTab('biodata')" id="btn-biodata" class="tab-btn flex items-center gap-2 px-4 py-2.5 text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-200 bg-white text-slate-900 shadow-sm border border-slate-200/50">
                <i class="fa-solid fa-user-gear text-brand-accent text-sm"></i> Ubah Biodata
                <span class="w-1.5 h-1.5 rounded-full bg-brand-accent ml-0.5"></span>
            </button>
            <button onclick="switchTab('keamanan')" id="btn-keamanan" class="tab-btn flex items-center gap-2 px-4 py-2.5 text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-200 text-slate-500 hover:text-slate-900 hover:bg-slate-100/60">
                <i class="fa-solid fa-shield-halved text-sm"></i> Keamanan Sandi
            </button>
            <button onclick="switchTab('danger-zone')" id="btn-danger-zone" class="tab-btn flex items-center gap-2 px-4 py-2.5 text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-200 text-slate-400 hover:text-rose-600 hover:bg-rose-50 ml-auto">
                <i class="fa-solid fa-right-from-bracket text-sm"></i> Sesi Akun
            </button>
        </div>

        <div class="p-6 sm:p-8">
            <div id="tab-biodata" class="tab-content block space-y-6">
                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider block">Nama Lengkap Petugas</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fa-solid fa-user text-xs"></i></span>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-800 focus:outline-none focus:border-brand-accent focus:bg-white focus:ring-4 focus:ring-brand-accent/5 transition-all">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider block">Nomor NIP / SIP Resmi</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fa-solid fa-id-card text-xs"></i></span>
                                <input type="text" name="nip_sip" value="{{ old('nip_sip', $user->nip_sip) }}" placeholder="198802142010121002" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-800 focus:outline-none focus:border-brand-accent focus:bg-white focus:ring-4 focus:ring-brand-accent/5 transition-all">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider block">Nama Instansi / Puskesmas</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fa-solid fa-hospital text-xs"></i></span>
                                <input type="text" name="instansi" value="{{ old('instansi', $user->instansi) }}" placeholder="Puskesmas Sukamaju Malang" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-800 focus:outline-none focus:border-brand-accent focus:bg-white focus:ring-4 focus:ring-brand-accent/5 transition-all">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider block">Nomor HP / WhatsApp Aktif</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fa-brands fa-whatsapp text-sm font-bold"></i></span>
                                <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" placeholder="08123456789" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-800 focus:outline-none focus:border-brand-accent focus:bg-white focus:ring-4 focus:ring-brand-accent/5 transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2 p-4 border border-dashed border-slate-200 rounded-2xl bg-slate-50/50 max-w-xl">
                        <label class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider block">Ganti Foto Profil Instansi</label>
                        <input type="file" name="avatar" id="avatar-input" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:uppercase file:bg-slate-900 file:text-white hover:file:bg-slate-800 cursor-pointer">
                        <span class="text-[10px] text-slate-400 font-medium block">Ekstensi file disetujui: JPEG, PNG, JPG (Maks. 2MB).</span>
                    </div>

                    <button type="submit" class="px-5 py-3 bg-brand-accent hover:bg-emerald-600 text-slate-950 hover:text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md shadow-brand-accent/10 transition-all duration-200 flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk text-sm"></i> Simpan Pembaruan Profil
                    </button>
                </form>
            </div>

            <div id="tab-keamanan" class="tab-content hidden space-y-6">
                <form action="{{ route('profil.password') }}" method="POST" class="space-y-5 max-w-md">
                    @csrf
                    @method('PUT')

                    <div class="space-y-1.5">
                        <label class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider block">Kata Sandi Saat Ini</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fa-solid fa-lock-open text-xs"></i></span>
                            <input type="password" name="current_password" required class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-brand-accent focus:bg-white focus:ring-4 focus:ring-brand-accent/5 transition-all">
                        </div>
                    </div>
                    
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider block">Kata Sandi Baru</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fa-solid fa-key text-xs"></i></span>
                            <input type="password" name="password" required placeholder="Minimal 8 karakter unik" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-brand-accent focus:bg-white focus:ring-4 focus:ring-brand-accent/5 transition-all">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider block">Konfirmasi Kata Sandi Baru</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fa-solid fa-shield text-xs"></i></span>
                            <input type="password" name="password_confirmation" required class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-brand-accent focus:bg-white focus:ring-4 focus:ring-brand-accent/5 transition-all">
                        </div>
                    </div>

                    <button type="submit" class="px-5 py-3 bg-slate-900 hover:bg-slate-950 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-sm transition-all duration-200 flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-sm"></i> Amankan Sandi Baru
                    </button>
                </form>
            </div>

            <div id="tab-danger-zone" class="tab-content hidden space-y-6">
                <div class="p-5 border border-rose-100 rounded-2xl bg-rose-50/20 max-w-xl">
                    <h4 class="text-sm font-bold text-rose-900 flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-rose-500"></i> Dekoneksi Autentikasi Aplikasi
                    </h4>
                    <p class="text-xs text-slate-500 font-medium mt-1 leading-relaxed">
                        Menutup sesi login Anda saat ini secara paksa. Seluruh enkripsi cookie penjelajah akan dihancurkan demi mematuhi aspek kepatuhan kerahasiaan riwayat rekam medis anak.
                    </p>
                    
                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="px-4 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-sm transition-all duration-200 flex items-center gap-2">
                            <i class="fa-solid fa-right-from-bracket"></i> Keluar Sesi Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('bg-white', 'text-slate-900', 'shadow-sm', 'border', 'border-slate-200/50');
            el.classList.add('text-slate-500');
            const indicator = el.querySelector('span');
            if(indicator) indicator.remove();
        });

        const activeContent = document.getElementById('tab-' + tabId);
        activeContent.classList.remove('hidden');
        activeContent.classList.add('animate-fade-in');

        const activeBtn = document.getElementById('btn-' + tabId);
        activeBtn.classList.remove('text-slate-500');
        activeBtn.classList.add('bg-white', 'text-slate-900', 'shadow-sm', 'border', 'border-slate-200/50');
        
        if (tabId !== 'danger-zone') {
            const dot = document.createElement('span');
            dot.className = 'w-1.5 h-1.5 rounded-full bg-brand-accent ml-0.5';
            activeBtn.appendChild(dot);
        }
    }

    const avatarInput = document.getElementById('avatar-input');
    const avatarPreview = document.getElementById('avatar-preview');
    const avatarPlaceholder = document.getElementById('avatar-placeholder');

    if(avatarInput) {
        avatarInput.addEventListener('change', function() {
            const file = this.files[0];
            if(file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    if(avatarPlaceholder) avatarPlaceholder.classList.add('hidden');
                    avatarPreview.src = this.result;
                    avatarPreview.classList.remove('hidden');
                });
                reader.readAsDataURL(file);
            }
        });
    }
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(4px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideIn {
        from { opacity: 0; transform: scale(0.98); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in {
        animation: fadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .animate-slide-in {
        animation: slideIn 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>
@endsection