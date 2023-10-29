<?php

namespace App\Models;

use App\Models\Informasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriInformasi extends Model
{
    protected $table = 'categori_informasi';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama', 'created_by', 'updated_by' ];
    
    public function informasi(): HasMany
    {
        return $this->hasMany(Informasi::class);
    }

}
