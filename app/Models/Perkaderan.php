<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkaderan extends Model
{
    protected $table = 'perkaderan';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama'];

    public function perkaderan_kader()
    {
        return $this->hasMany('App\Models\Perkaderan_kader');
    }
}
