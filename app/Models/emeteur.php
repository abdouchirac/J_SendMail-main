<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emeteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'emeteur_noms',
    ];
    public function courriers()
    {
        return $this->hasMany(courrier::class, 'emeteur_id');
    }

}
