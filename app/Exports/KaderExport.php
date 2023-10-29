<?php

namespace App\Exports;

use App\Models\Kader;
use Maatwebsite\Excel\Concerns\FromCollection;

class KaderExport implements FromCollection
{
    protected $j;

    public function __construct($j)
    {
        $this->j = $j;
    }

    public function collection()
    {
        return Kader::query()
            ->select(
                'kader.nama', 'kader.nim', 'kader.angkatan', 'kader.tempat_tanggal_lahir', 'jurusan.nama as nama_jurusan',
                'kader.jenis_kelamin', 'kader.no_telp', 'kader.alamat', 'kader.nama_bapak', 'kader.nama_ibu', 'kader.tahun_berkader', 
                'kader.jabatan', 'komisariat.nama_komisariat as nama_komisariat', 'kader.foto'
            )
            ->leftJoin('komisariat', 'kader.komisariat_id', '=', 'komisariat.id')
            ->where('kader.komisariat_id', $this->j)
            ->leftJoin('jurusan', 'kader.jurusan_id', '=', 'jurusan.id')
            ->get();  
    }
}

    

