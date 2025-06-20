<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TodoSeeder extends Seeder
{
    public function run(): void
    {
        // Dummy Pegawai
        DB::table('tb_pegawai')->insert([
            ['id' => 1, 'nama' => 'Admin', 'jabatan' => 'admin'],
            ['id' => 2, 'nama' => 'Pemberi Tugas', 'jabatan' => 'pemberi'],
            ['id' => 3, 'nama' => 'Penerima Tugas', 'jabatan' => 'penerima'],
        ]);

        // Login (password = "password")
        DB::table('tb_login')->insert([
            ['pegawai_id' => 1, 'kata_sandi' => bcrypt('password')],
            ['pegawai_id' => 2, 'kata_sandi' => bcrypt('password')],
            ['pegawai_id' => 3, 'kata_sandi' => bcrypt('password')],
        ]);

        // Tugas
        DB::table('tb_todo')->insert([
            [
                'tugas' => 'Membuat laporan mingguan',
                'waktu_selesai' => Carbon::now()->addDays(3),
                'tugas_dari' => 2,
                'tugas_untuk' => 3,
                'status' => 'Pending',
                'keterangan' => 'Jangan lupa lampirkan data penjualan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}