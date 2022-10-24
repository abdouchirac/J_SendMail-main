<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emplacement extends Model
{
    use HasFactory;
    protected $fillable = [
        'emplacement_noms',
        'emplacement_detail',
    ];
    public function courriers()
    {
        return $this->hasMany(courrier::class,'emplacement_id');
    }
}

