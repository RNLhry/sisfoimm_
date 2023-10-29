<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkaderan_Kader extends Model
{
    protected $table  = 'perkaderan_kader';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kader_id', 'perkaderan_id', 'created_by', 'updated_by', 'perkaderan_kader'];

    public function perkaderan()
    {
        return $this->belongsTo('App\Models\Perkaderan');
    }
    public function kader()
    {
        return $this->belongsTo('App\Models\Kader');
    }
}
