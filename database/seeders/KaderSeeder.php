<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kader')->insert([
            'nama'=>'mukammil',
            'nim'=>2196141,
            'angkatan'=>2019,
            'tempat_tanggal_lahir'=> 'bambaea 26 november 2000',
            'jurusan'=> 'pendidikan teknologi informasi',
            'jenis_kelamin' => 'laki-laki',  
            'no_telp'=>2236786534, 
            'alamat' => 'kendari',
            'nama_bapak'=>'hasking',
            'nama_ibu'=>'hasni',
            'tahun_berkader'=>2019,
            'jabatan'=>'ketua umun',
            'foto'=>'kamil.pnj',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),

        ]);
    }
}
