<?php

namespace App\Models;

use App\Models\Komisariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Informasi extends Model
{
    protected $table = 'informasi';
    protected $primaryKey = 'id';
    protected $fillable = ['id','judul', 'isi_informasi','quotes', 'isi_informasi2', 'foto', 'komisariat_id','categori_informasi_id', 'created_by', 'updated_by' ];


  
    public function komisariat()
    {
        return $this->belongsTo('App\Models\Komisariat');
    }
    public function categori_informasi()
    {
        return $this->belongsTo('App\Models\CategoriInformasi');
    }
}
