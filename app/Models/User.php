<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Properti kolom tabel yang boleh diisi datanya.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nip_sip',     // Wajib didaftarkan
        'instansi',    // Wajib didaftarkan
        'no_hp',       // Wajib didaftarkan
        'avatar',      // Wajib didaftarkan
        'role',        // Wajib didaftarkan
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}