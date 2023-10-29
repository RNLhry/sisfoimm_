<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Komisariat extends Model
{
    protected $table = 'komisariat';
    protected $primaryKey = 'id';
    protected $fillable = ['id','kode_komisariat','nama_komisariat', 'kader_id','akun_media_sosial', 'asal_fakultas','struktur_organisasi','foto', 'created_by', 'updated_by'];

    public function informasi(): HasMany
    {
        return $this->hasMany(Informasi::class);
    }

    public function kader()
    {
        return $this->hasMany('App\Models\Kader');
    }
    public function kaderr()
{
    return $this->belongsTo('App\Models\Komisariat');
}

    // public function informasi()
    // {
    //     return $this->belongsTo('App\Models\Informasi');
    // }

}