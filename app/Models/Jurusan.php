<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama'];
    
    
    public function kader()
{
    return $this->hasMany('App\Models\Kader');
}
}
