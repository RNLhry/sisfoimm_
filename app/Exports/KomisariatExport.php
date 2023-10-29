<?php

namespace App\Exports;

use App\Models\Komisariat;
use Maatwebsite\Excel\Concerns\FromCollection;

class KomisariatExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Komisariat::all();
        return Komisariat::query()
        ->select(
            'komisariat.nama_komisariat', 'komisariat.kode_komisariat','kader.nama as nama_kader', 'komisariat.foto'
        )
        ->leftJoin('kader', 'komisariat.kader_id', '=', 'kader.id')
        ->get();  
    }
    public function headings(): array
    {
        return [
            "Kode Komisariat",
            "Nama Komisariat",
            "Ketua Komisariat",
            "Logo"
        ];
}
}
