<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom baru setelah kolom password
            $table->string('nip_sip')->nullable()->after('password');
            $table->string('instansi')->nullable()->after('nip_sip');
            $table->string('no_hp')->nullable()->after('instansi');
            $table->string('avatar')->nullable()->after('no_hp');
            $table->string('role')->nullable()->default('Petugas Gizi')->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop kolom jika migrasi di roll-back
            $table->dropColumn(['nip_sip', 'instansi', 'no_hp', 'avatar', 'role']);
        });
    }
};