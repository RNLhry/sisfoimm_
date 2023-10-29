<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class KomisariatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komisariat')->insert([
            'kode_komisariat' => 'ADFKIP01',
            'nama_komisariat' => 'pk imm ahmad dahlan fkip umk',
            'akun_media_sosial' => 'pk imm fakultas hukum',
            'asal_fakultas' => 'fkip',
            'Struktur_organisasi' => null,
            'logo_komisariat' => null,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
