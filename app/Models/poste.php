<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poste extends Model
{
    use HasFactory;
    protected $fillable = [
        'poste_libele',
    ];
    public function users()
    {
        return $this->hasMany(User::class,'poste_id');
    }


}
