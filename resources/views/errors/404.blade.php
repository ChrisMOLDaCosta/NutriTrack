<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan - NutriTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6 text-center">

    <div class="max-w-md space-y-6">
        <!-- Ilustrasi / Ikon -->
        <div class="inline-flex w-24 h-24 bg-rose-50 text-rose-500 text-5xl rounded-full items-center justify-center shadow-sm animate-pulse">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        
        <div class="space-y-2">
            <h1 class="text-6xl font-black text-slate-800 tracking-tight">404</h1>
            <h2 class="text-xl font-bold text-slate-700">Waduh, Halaman Hilang!</h2>
            <p class="text-sm text-slate-400 max-w-sm mx-auto">
                Halaman yang Anda cari tidak terdaftar di sistem NutriTrack atau telah dipindahkan ke alamat lain.
            </p>
        </div>

        <div class="pt-2">
            <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-cyan-500 hover:from-emerald-700 hover:to-cyan-600 text-white font-bold px-6 py-3 rounded-xl shadow-md transition transform active:scale-95">
                <i class="fa-solid fa-house text-xs"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

</body>
</html>