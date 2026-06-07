<?php

namespace App\Http\Controllers;

use App\Models\Siswa; // Pastikan Model Siswa di-import

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data siswa
        $dataSiswa = Siswa::latest()->take(5)->get(); // Ambil 5 data terbaru

        // 2. Hitung statistik
        $stats = [
            'total'    => Siswa::count(),
            'normal'   => Siswa::where('status_gizi', 'Gizi Normal')->count(),
            'kurang'   => Siswa::where('status_gizi', 'Kurang Gizi')->count(),
            'obesitas' => Siswa::where('status_gizi', 'Obesitas')->count(),
        ];

        // 3. Kirim ke view
        return view('dashboard', compact('dataSiswa', 'stats'));
    }
}