<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfilController extends Controller
{
    /**
     * Menampilkan halaman profil yang bersih dan minimalis pro.
     */
    public function index()
    {
        $user = Auth::user();

        // CLEAN & FIXED: Semua variabel dummy statistik dibuang total untuk menghindari crash
        return view('profil', [
            'user' => $user
        ]);
    }

    /**
     * Memproses pembaruan data biodata dan unggahan foto avatar petugas.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi inputan form biodata
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip_sip' => ['nullable', 'string', 'max:50'],
            'instansi' => ['nullable', 'string', 'max:255'],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'], // Maksimal 2MB
        ]);

        // Logika penanganan file upload avatar
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama di folder storage jika ada dan bukan bawaan
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Simpan file baru ke folder storage/app/public/avatars
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        // Simpan data text ke database
        $user->name = $request->name;
        $user->nip_sip = $request->nip_sip;
        $user->instansi = $request->instansi;
        $user->no_hp = $request->no_hp;
        $user->save();

        return redirect()->route('profil.index')->with('success', 'Biodata profil Anda berhasil diperbarui!');
    }

    /**
     * Memproses penggantian kata sandi akun petugas.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'], // Validasi otomatis password saat ini cocok
            'password' => ['required', 'confirmed', Password::defaults()], // Validasi password baru & konfirmasi wajib sama
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profil.index')->with('success', 'Kata sandi Anda berhasil diamankan!');
    }
}