<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
   
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama'];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
