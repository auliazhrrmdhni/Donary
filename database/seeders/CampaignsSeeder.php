<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campaigns')->insert([
            'id_penggalang' => 1, 
            'judul' => 'Bantu Banjir Lamandau, Kalimantan Tengah',
            'deskripsi' => 'Penggalangan dana untuk masyarakat yang terkena dampak banjir di Lamandau, Kalimantan Tengah.',
            'target_donasi' => 15000000,
            'donasi_sekarang' => 0,
            'status' => 'pending',
            'image_url' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
