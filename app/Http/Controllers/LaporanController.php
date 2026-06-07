<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa; // Menggunakan model siswa sesuai image_0055a4.png

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        // 1. FITUR PENCARIAN (Searching) FIXED!
        // Mencari teks berdasarkan kolom nama_lengkap atau asal_sekolah di database
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nisn', 'like', "%{$search}%") // Mendukung cari berdasarkan nomor NISN langsung!
                ->orWhere('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('asal_sekolah', 'like', "%{$search}%");
            });
        }

        // 2. FITUR SARINGAN STATUS (Filtering) FIXED!
        // Menyaring data berdasarkan 3 status gizi utama Anda
        if ($request->has('status_gizi') && $request->status_gizi != '') {
            $query->where('status_gizi', $request->status_gizi);
        }

        // Ambil data dengan pagination (10 data per halaman)
        $logsGizi = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('laporan', compact('logsGizi'));
    }
}