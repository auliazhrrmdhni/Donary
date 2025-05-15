<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengguna')->insert([
            [
                'nama' => 'admin1',
                'email' => 'admin1@donary.com',
                'password' => bcrypt('iniadmin1'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'penggalang1',
                'email' => 'penggalang@donary.com',
                'password' => bcrypt('inipenggalang1'),
                'role' => 'penggalang',
                'creted_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'donatur1', 
                'email' => 'donatur1@donary.com',
                'password' => bcrypt('inidonatur1'),
                'role' => 'donatur',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
