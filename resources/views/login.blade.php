<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - NutriTrack Portal</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        nutri: {
                            dark: '#0B111E',   // Background super dark elegan
                            card: '#161F30',   // Warna box card presisi
                            emerald: '#10B981',// Warna utama emerald glow
                            glow: '#059669'    // Hover state emerald
                        }
                    },
                    animation: {
                        'float-slow': 'float 4.5s ease-in-out infinite',
                        'slide-in': 'slideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-5px)' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateY(-10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-nutri-dark min-h-screen flex items-center justify-center p-4 font-sans antialiased selection:bg-nutri-emerald selection:text-nutri-dark">

    <div class="w-full max-w-[420px] bg-nutri-card border border-slate-800/80 rounded-[32px] p-9 shadow-2xl transition-all duration-300 hover:border-slate-700/50 relative overflow-hidden">
        
        <!-- Ambient Background Glow -->
        <div class="absolute -top-10 -left-10 w-24 h-24 bg-nutri-emerald/5 rounded-full blur-2xl pointer-events-none"></div>

        <!-- Header Brand -->
        <div class="text-center mb-8">
            <div class="inline-block relative group animate-float-slow">
                <div class="absolute -inset-1 bg-gradient-to-r from-nutri-emerald to-teal-400 rounded-2xl blur-md opacity-20 group-hover:opacity-40 transition duration-500"></div>
                
                <div class="relative w-20 h-20 bg-white border border-slate-100 rounded-2xl p-2.5 flex items-center justify-center shadow-lg transform group-hover:scale-[1.03] transition-all duration-300">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="Logo NutriTrack" 
                         class="w-full h-full object-contain filter drop-shadow-[0_2px_4px_rgba(0,0,0,0.05)]">
                </div>
            </div>
            
            <h2 class="text-2xl font-black text-white tracking-tight mt-5">Selamat Datang</h2>
            <p class="text-xs text-slate-400 font-medium mt-1">Sistem Otentikasi Monitoring Gizi - NutriTrack</p>
        </div>

        <!-- Session Flash Success -->
        @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold p-4 rounded-xl mb-6 flex items-start gap-3 animate-slide-in shadow-sm">
            <i class="fa-solid fa-circle-check text-emerald-500 text-base mt-0.5 transform scale-110"></i>
            <span class="leading-relaxed">{{ session('success') }}</span>
        </div>
        @endif

        <!-- Error Validation Alert -->
        @if($errors->any())
        <div class="bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs font-semibold p-4 rounded-xl mb-6 flex items-center gap-3 animate-pulse">
            <i class="fa-solid fa-circle-exclamation text-rose-500 text-base"></i>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif

        <!-- Login Form Element -->
        <form action="{{ route('login.proses') }}" method="POST" autocomplete="off" class="space-y-5">
            @csrf 
            
            <!-- Input Email Resmi -->
            <div class="space-y-1.5">
                <label class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Alamat Email Resmi</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-nutri-emerald transition-colors">
                        <i class="fa-solid fa-envelope text-xs"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                        placeholder="nama@email.com" 
                        class="w-full pl-11 pr-4 py-3 bg-slate-900/60 border border-slate-800/80 rounded-xl text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:border-nutri-emerald focus:bg-slate-900 transition-all">
                </div>
            </div>

            <!-- Input Kata Sandi -->
            <div class="space-y-1.5">
                <label class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Kata Sandi Akun</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-nutri-emerald transition-colors">
                        <i class="fa-solid fa-lock text-xs"></i>
                    </div>
                    
                    <input type="password" id="passwordField" name="password" required 
                        placeholder="••••••••" 
                        class="w-full pl-11 pr-12 py-3 bg-slate-900/60 border border-slate-800/80 rounded-xl text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:border-nutri-emerald focus:bg-slate-900 transition-all">
                    
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-nutri-emerald transition-colors focus:outline-none">
                        <i class="fa-solid fa-eye text-xs" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <!-- Action Button Submit -->
            <button type="submit" class="w-full py-3.5 bg-nutri-emerald hover:bg-nutri-glow text-slate-950 font-bold text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-nutri-emerald/10 hover:shadow-nutri-emerald/25 transition-all duration-300 flex items-center justify-center gap-2 transform active:scale-[0.99] mt-2 cursor-pointer">
                <i class="fa-solid fa-right-to-bracket text-sm"></i> Masuk ke Dashboard
            </button>
        </form>

        <!-- Footer Link Direct to Register -->
        <div class="mt-8 pt-5 border-t border-slate-800 text-center">
            <p class="text-xs text-slate-400 font-medium">
                Belum memiliki akun petugas gizi?
            </p>
            <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-nutri-emerald hover:text-teal-400 mt-2.5 transition-colors duration-200 group/link">
                Daftar Akun Baru Sekarang 
                <i class="fa-solid fa-arrow-right text-[10px] transform group-hover/link:translate-x-1 transition-transform"></i>
            </a>
        </div>

    </div>

    <!-- Script Toggling Password Visibility -->
    <script>
        const passwordField = document.getElementById('passwordField');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>