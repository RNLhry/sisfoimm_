<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan baris ini untuk mengimpor fasad DB

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kader')->insert([
            'judul' => 'darul arqam dasar',
            'isi informasi' => 'DAD Adalah perkaderan IMM',
            'tanggal' => '26 september 2023',
            'foto' => 'kamil.pnj',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}






