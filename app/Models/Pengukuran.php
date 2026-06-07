<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    protected $table = 'pengukuran';
    protected $fillable = ['siswa_id', 'tanggal_ukur', 'berat_badan', 'tinggi_badan', 'bmi', 'status_gizi'];
}
