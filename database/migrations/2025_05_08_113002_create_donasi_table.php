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
        Schema::create('donasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_campaign')->constrained('campaigns')->onDelete('cascade');
            $table->foreignId('id_donatur')->constrained('pengguna')->onDelete('cascade');
            $table->decimal('nominal', 10, 2);
            $table->string('metode_pembayaran');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};
