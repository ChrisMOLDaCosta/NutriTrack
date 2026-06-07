<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Menegaskan nama tabel sesuai dengan yang ada di migration Anda
    protected $table = 'siswa';

    // GERBANG IZIN DATA: Wajib mendaftarkan seluruh kolom dari migration
    // agar diizinkan masuk ke database saat proses 'Siswa::create' atau 'Siswa::update'
    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'jenis_kelamin',
        'kelas',
        'usia',
        'asal_sekolah',
        'berat_badan',
        'tinggi_badan',
        'status_gizi',
    ];

    /**
     * Optional Pro Tip: Cast nilai berat dan tinggi badan menjadi float 
     * agar saat dibaca di Blade tipenya tetap konsisten berangka (bukan string)
     */
    protected $casts = [
        'berat_badan' => 'float',
        'tinggi_badan' => 'float',
        'usia' => 'integer',
    ];
}