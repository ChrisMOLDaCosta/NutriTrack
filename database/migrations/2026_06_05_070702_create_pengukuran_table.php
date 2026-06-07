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
    Schema::create('pengukuran', function (Blueprint $table) {
        $table->id();
        // Menghubungkan ke tabel siswa
        $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
        $table->date('tanggal_ukur');
        $table->decimal('berat_badan', 5, 2);
        $table->decimal('tinggi_badan', 5, 2);
        $table->decimal('bmi', 5, 2)->nullable();
        $table->string('status_gizi')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukuran');
    }
};
