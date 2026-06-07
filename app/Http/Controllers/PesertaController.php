<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Exception;

class PesertaController extends Controller
{
    /**
     * Menampilkan daftar peserta
     */
    public function index()
    {
        // Menggunakan latest() untuk menampilkan data terbaru di paling atas
        $dataSiswa = Siswa::latest()->get();

        return view('peserta', compact('dataSiswa'));
    }

    /**
     * Menyimpan data peserta baru
     */
    public function store(Request $request)
    {
        // Validasi Input secara ketat demi keamanan database
        $request->validate([
            'nisn'          => 'required|numeric|digits_between:8,12|unique:siswa,nisn',
            'nama_lengkap'  => 'required|string|max:150',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kelas'         => 'required|string|max:50',
            'usia'          => 'required|integer|min:1|max:25',
            'asal_sekolah'  => 'required|string|max:150',
            'berat_badan'   => 'required|numeric|min:1|max:200',
            'tinggi_badan'  => 'required|numeric|min:30|max:250',
        ], [
            'nisn.required'          => 'NISN wajib diisi!',
            'nisn.numeric'           => 'NISN harus berupa angka!',
            'nisn.digits_between'    => 'NISN harus berukuran 8 sampai 12 digit!',
            'nisn.unique'            => 'Maaf, NISN sudah terdaftar di sistem!',
            'nama_lengkap.required'  => 'Nama lengkap wajib diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih!',
            'jenis_kelamin.in'       => 'Pilihan jenis kelamin tidak valid!',
            'kelas.required'         => 'Kelas wajib diisi!',
            'usia.required'          => 'Usia wajib diisi!',
            'asal_sekolah.required'  => 'Asal sekolah wajib diisi!',
            'berat_badan.required'   => 'Berat badan wajib diisi!',
            'tinggi_badan.required'  => 'Tinggi badan wajib diisi!',
        ]);

        // Memulai Database Transaction agar aman total
        DB::beginTransaction();
        try {
            // Hitung BMI dan tentukan status gizi menggunakan private method di bawah
            $statusGizi = $this->hitungStatusGizi($request->berat_badan, $request->tinggi_badan);

            // Simpan data ke database
            Siswa::create([
                'nisn'          => $request->nisn,
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kelas'         => $request->kelas,
                'usia'          => $request->usia,
                'asal_sekolah'  => $request->asal_sekolah,
                'berat_badan'   => $request->berat_badan,
                'tinggi_badan'  => $request->tinggi_badan,
                'status_gizi'   => $statusGizi,
            ]);

            DB::commit();
            return redirect()
                ->route('peserta.index')
                ->with('success', 'Berhasil! Data peserta baru telah ditambahkan ke sistem.');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data! Terjadi kesalahan internal server.');
        }
    }

    /**
     * Memperbarui data peserta (FITUR BARU UNTUK EDIT)
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        // Validasi Update (Kunci: mengabaikan keunikan NISN diri sendiri agar bisa disimpan ulang)
        $request->validate([
            'nisn'          => 'required|numeric|digits_between:8,12|unique:siswa,nisn,' . $siswa->id,
            'nama_lengkap'  => 'required|string|max:150',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kelas'         => 'required|string|max:50',
            'usia'          => 'required|integer|min:1|max:25',
            'asal_sekolah'  => 'required|string|max:150',
            'berat_badan'   => 'required|numeric|min:1|max:200',
            'tinggi_badan'  => 'required|numeric|min:30|max:250',
        ], [
            'nama_lengkap.required'  => 'Nama lengkap wajib diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih!',
            'kelas.required'         => 'Kelas wajib diisi!',
            'usia.required'          => 'Usia wajib diisi!',
            'asal_sekolah.required'  => 'Asal sekolah wajib diisi!',
            'berat_badan.required'   => 'Berat badan wajib diisi!',
            'tinggi_badan.required'  => 'Tinggi badan wajib diisi!',
        ]);

        DB::beginTransaction();
        try {
            // Hitung ulang status gizi berdasarkan input data fisik baru
            $statusGizi = $this->hitungStatusGizi($request->berat_badan, $request->tinggi_badan);

            // Update data siswa
            $siswa->update([
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kelas'         => $request->kelas,
                'usia'          => $request->usia,
                'asal_sekolah'  => $request->asal_sekolah,
                'berat_badan'   => $request->berat_badan,
                'tinggi_badan'  => $request->tinggi_badan,
                'status_gizi'   => $statusGizi,
            ]);

            DB::commit();
            return redirect()
                ->route('peserta.index')
                ->with('success', 'Sukses! Data peserta atas nama ' . $siswa->nama_lengkap . ' berhasil diperbarui.');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui data! Terjadi kesalahan internal.');
        }
    }

    /**
     * Menghapus data peserta (FITUR BARU UNTUK DELETE)
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $siswa = Siswa::findOrFail($id);
            $namaSiswa = $siswa->nama_lengkap;
            
            $siswa->delete();

            DB::commit();
            return redirect()
                ->route('peserta.index')
                ->with('success', 'Sukses! Data peserta atas nama ' . $namaSiswa . ' telah dihapus dari sistem.');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus data! Silakan coba beberapa saat lagi.');
        }
    }

    /**
     * Helper Method: Logika Pemrosesan Rumus BMI / IMT & Kategori Gizi 
     * Dibuat terpisah (Clean Code) agar tidak ada redundansi kode antara Store & Update
     */
    private function hitungStatusGizi($berat, $tinggiCm)
    {
        // Proteksi jika tinggi badan diinput 0 agar aplikasi tidak mengalami crash division by zero
        if ($tinggiCm <= 0) {
            return 'Data Tidak Valid';
        }

        // Konversi tinggi ke meter
        $tinggiM = $tinggiCm / 100;
        
        // Rumus BMI baku
        $bmi = $berat / ($tinggiM * $tinggiM);

        // Klasifikasi standar Kemenkes / WHO untuk status gizi anak/remaja
        if ($bmi < 18.5) {
            return 'Kurang Gizi';
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            return 'Gizi Normal';
        } elseif ($bmi >= 25 && $bmi < 30) {
            return 'Kelebihan Berat Badan';
        } else {
            return 'Obesitas';
        }
    }
}