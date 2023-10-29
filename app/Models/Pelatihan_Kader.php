<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan_Kader extends Model
{
    protected $table  = 'pelatihan_kader';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kader_id', 'pelatihan_id', 'created_by', 'updated_by'];

    public function pelatihan()
    {
        return $this->belongsTo('App\Models\Pelatihan');
    }
    public function kader()
    {
        return $this->belongsTo('App\Models\Kader');
    }
}
