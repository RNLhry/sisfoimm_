<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id';
    protected $fillable = ['id','judul', 'keterangan', 'foto', 'created_by', 'updated_by' ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
