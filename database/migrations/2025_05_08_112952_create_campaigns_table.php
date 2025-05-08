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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penggalang')->constrained('pengguna')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->decimal('target_donasi', 12, 2);
            $table->decimal('donasi_sekarang', 12, 2)->default(0);
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
