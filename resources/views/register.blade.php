<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun Baru - NutriTrack Portal</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        nutri: {
                            dark: '#0B111E',   // Background super dark elegan
                            card: '#161F30',   // Warna box card presisi sesuai dashboard
                            emerald: '#10B981',// Warna utama emerald glow
                            glow: '#059669'    // Hover state emerald
                        }
                    },
                    animation: {
                        'float-slow': 'float 5s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 2s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-6px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.2', transform: 'scale(1)' },
                            '50%': { opacity: '0.4', transform: 'scale(1.02)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-nutri-dark min-h-screen flex items-center justify-center p-4 font-sans antialiased selection:bg-nutri-emerald selection:text-nutri-dark">

    <div class="w-full max-w-[550px] bg-nutri-card border border-slate-800/80 rounded-[32px] p-8 sm:p-10 shadow-2xl transition-all duration-300 hover:border-slate-700/50 relative overflow-hidden group">
        
        <!-- Ambient Background Glow -->
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-nutri-emerald/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Header Form -->
        <div class="text-center mb-8 relative z-10">
            <div class="inline-block relative group/logo animate-float-slow">
                <div class="absolute -inset-1.5 bg-gradient-to-r from-nutri-emerald to-teal-400 rounded-2xl blur-md opacity-25 group-hover/logo:opacity-50 transition duration-500 animate-pulse-glow"></div>
                
                <div class="relative w-16 h-16 bg-white border border-slate-100 rounded-2xl p-2 flex items-center justify-center shadow-xl transform group-hover/logo:scale-105 transition-all duration-300">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="Logo NutriTrack" 
                         class="w-full h-full object-contain filter drop-shadow-[0_2px_4px_rgba(0,0,0,0.05)]">
                </div>
            </div>
            
            <h2 class="text-2xl font-black text-white tracking-tight mt-4">Registrasi Akun Baru</h2>
            <p class="text-xs text-slate-400 font-medium mt-1">Registrasi Keanggotaan Tim Medis NutriTrack</p>
        </div>

        <!-- Alert Error Validation -->
        @if($errors->any())
        <div class="bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs font-semibold p-4 rounded-xl mb-6 flex flex-col gap-1.5">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation text-rose-500 text-sm"></i>
                <span>Terjadi kesalahan pengisian data:</span>
            </div>
            <ul class="list-disc list-inside pl-1 text-rose-300/90 space-y-0.5 font-medium">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Main Element -->
        <form action="{{ route('register.proses') }}" method="POST" autocomplete="off" class="space-y-5 relative z-10">
            @csrf

            <!-- Baris 1: Nama & NIP -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Nama Lengkap</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-nutri-emerald transition-colors">
                            <i class="fa-solid fa-user text-xs"></i>
                        </div>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap Anda" 
                            class="w-full pl-11 pr-4 py-3 bg-slate-900/60 border border-slate-800/80 rounded-xl text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:border-nutri-emerald focus:bg-slate-900 transition-all">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Nomor NIP / SIP</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-nutri-emerald transition-colors">
                            <i class="fa-solid fa-id-card text-xs"></i>
                        </div>
                        <input type="text" name="nip_sip" value="{{ old('nip_sip') }}" placeholder="Contoh: 198903112015041002" 
                            class="w-full pl-11 pr-4 py-3 bg-slate-900/60 border border-slate-800/80 rounded-xl text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:border-nutri-emerald focus:bg-slate-900 transition-all">
                    </div>
                </div>
            </div>

            <!-- Baris 2: Email -->
            <div class="space-y-1.5">
                <label class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Alamat Email</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-nutri-emerald transition-colors">
                        <i class="fa-solid fa-envelope text-xs"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" 
                        class="w-full pl-11 pr-4 py-3 bg-slate-900/60 border border-slate-800/80 rounded-xl text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:border-nutri-emerald focus:bg-slate-900 transition-all">
                </div>
            </div>

            <!-- Baris 3: Instansi Kesehatan -->
            <div class="space-y-1.5">
                <label class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Instansi Kesehatan Tempat Dinas</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-nutri-emerald transition-colors">
                        <i class="fa-solid fa-hospital text-xs"></i>
                    </div>
                    <input type="text" name="instansi" value="{{ old('instansi') }}" required placeholder="Contoh: Puskesmas Kebayoran Baru" 
                        class="w-full pl-11 pr-4 py-3 bg-slate-900/60 border border-slate-800/80 rounded-xl text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:border-nutri-emerald focus:bg-slate-900 transition-all">
                </div>
            </div>

            <!-- Baris 4: Password & Konfirmasi -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Kata Sandi</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-nutri-emerald transition-colors">
                            <i class="fa-solid fa-lock text-xs"></i>
                        </div>
                        <input type="password" id="password" name="password" required placeholder="••••••••" 
                            class="w-full pl-11 pr-11 py-3 bg-slate-900/60 border border-slate-800/80 rounded-xl text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:border-nutri-emerald focus:bg-slate-900 transition-all">
                        
                        <button type="button" onclick="toggleField('password', 'eye-pass')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-nutri-emerald transition-colors focus:outline-none">
                            <i class="fa-solid fa-eye text-xs" id="eye-pass"></i>
                        </button>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Konfirmasi Sandi</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-nutri-emerald transition-colors">
                            <i class="fa-solid fa-shield-halved text-xs"></i>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="••••••••" 
                            class="w-full pl-11 pr-11 py-3 bg-slate-900/60 border border-slate-800/80 rounded-xl text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:border-nutri-emerald focus:bg-slate-900 transition-all">
                        
                        <button type="button" onclick="toggleField('password_confirmation', 'eye-confirm')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-nutri-emerald transition-colors focus:outline-none">
                            <i class="fa-solid fa-eye text-xs" id="eye-confirm"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Submit Action -->
            <button type="submit" class="w-full py-4 bg-nutri-emerald hover:bg-nutri-glow text-slate-950 font-black text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-nutri-emerald/10 hover:shadow-nutri-emerald/25 transition-all duration-300 flex items-center justify-center gap-2 transform active:scale-[0.99] mt-4 cursor-pointer">
                <i class="fa-solid fa-user-plus text-sm"></i> Daftarkan Akun Petugas
            </button>
        </form>

        <!-- Footer Link Direct to Login -->
        <div class="mt-8 pt-5 border-t border-slate-800 text-center relative z-10">
            <p class="text-xs text-slate-400 font-medium">
                Sudah terdaftar sebelumnya?
            </p>
            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-nutri-emerald hover:text-teal-400 mt-2 transition-colors duration-200 group/link">
                Masuk Sini 
                <i class="fa-solid fa-arrow-right text-[10px] transform group-hover/link:translate-x-1 transition-transform"></i>
            </a>
        </div>

    </div>

    <!-- Password Visibility Trigger Script -->
    <script>
        function toggleField(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>