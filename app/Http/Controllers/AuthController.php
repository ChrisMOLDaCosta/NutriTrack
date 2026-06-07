<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Menangani Proses Validasi & Login Masuk
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi untuk mengotentikasi akun.',
            'email.email' => 'Format alamat email yang Anda masukkan tidak valid.',
            'password.required' => 'Kata sandi keamanan wajib diisi.',
            'password.min' => 'Kata sandi minimal harus terdiri dari 6 karakter.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // DARI LOGIN BARU KE DASHBOARD (SUDAH BENAR)
            return redirect()->route('dashboard');
        }

        // Jika data tidak ditemukan di database MySQL
        return back()->withErrors([
            'email' => 'Kredensial tersebut tidak cocok dengan data pendaftaran kami.',
        ])->onlyInput('email');
    }

    // 2. Menangani Proses Registrasi Akun Baru Petugas (PERBAIKAN ALUR UAT)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nip_sip' => 'required|string|max:50',
            'instansi' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Nama lengkap wajib dicantumkan.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar di sistem NutriTrack.',
            'nip_sip.required' => 'Nomor NIP / SIP resmi wajib diisi.',
            'instansi.required' => 'Nama instansi pelayanan kesehatan wajib diisi.',
            'password.required' => 'Kata sandi baru wajib dibuat.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        // Menyimpan data secara permanen ke database MySQL
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip_sip' => $request->nip_sip,
            'instansi' => $request->instansi,
            'password' => Hash::make($request->password), // Enkripsi BCrypt Aman
            'role' => 'Petugas Gizi',
        ]);

        /* 
         * KUNCI PERBAIKAN DI SINI:
         * Kode lama "Auth::login($user);" KITA HAPUS TOTAL!
         * Sekarang dialihkan kembali ke form LOGIN dengan Flash Session 'success'
         */
        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil! Akun Anda telah terdaftar. Silakan masuk di sini.');
    }

    // 3. Menangani Proses Keluar Sistem
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}