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
        Schema::create('campaigns_favorit', function (Blueprint $table) {
            $table->id();
            $table->foreignid('id_donatur')->constrained('pengguna')->onDelete('cascade');
            $table->foreignid('id_campaign')->constrained('campaigns')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->unique(['id_donatur', 'id_campaign']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns_favorit');
    }
};
