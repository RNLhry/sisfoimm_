<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kader extends Model
{
    protected $table = 'kader';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'nim', 'angkatan','tempat_tanggal_lahir', 'jurusan_id',
     'jenis_kelamin','no_telp','alamat','nama_bapak', 'nama_ibu','tahun_berkader', 
     'jabatan', 'komisariat_id','foto'];


public function komisariat()
{
    return $this->belongsTo('App\Models\Komisariat');
}
public function komisariatt()
{
    return $this->hasMany('App\Models\Komisariat');
}
public function jurusan()
{
    return $this->belongsTo('App\Models\Jurusan');
}
public function perkaderan_kader()
{
    return $this->belongsToMany(Perkaderan::class, 'perkaderan_kader', 'kader_id', 'perkaderan_id', 'created_by', 'updated_by')->withTimestamps();
}
public function pelatihan_kader()
{
    return $this->belongsToMany(Pelatihan::class, 'pelatihan_kader', 'kader_id', 'pelatihan_id', 'created_by', 'updated_by')->withTimestamps();
}


public function perkaderan()
{
    return $this->belongsToMany(Perkaderan::class, 'perkaderan_kader', 'kader_id', 'perkaderan_id');
}
public function pelatihan()
{
    return $this->belongsToMany(Pelatihan::class, 'pelatihan_kader', 'kader_id', 'pelatihan_id');
}
public function savePerkaderan($perkaderan)
{
    $this->perkaderan_kader()->sync($perkaderan);
}
public function savePelatihan($pelatihan)
{
    $this->pelatihan_kader()->sync($pelatihan);
}

}