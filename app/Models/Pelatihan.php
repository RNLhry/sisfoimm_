<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'pelatihan';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama'];

    public function pelatihan_kader()
    {
        return $this->hasMany('App\Models\Pelatihan_kader');
    }
}
