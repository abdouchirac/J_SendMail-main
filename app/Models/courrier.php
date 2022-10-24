<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courrier extends Model
{

    use HasFactory;
    protected $fillable = [
        'courrier_libele',
        'courrier_date_arrive',
        'receptioniste',
        'emeteur_id',
        'user_id',
        'emplacement_id',
    ];
    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
    public function emplacement()
    {
        return $this->belongsTo(emplacement::class,'emplacement_id');
    }
    public function emeteur()
    {
        return $this->belongsTo(emeteur::class, 'emeteur_id');
    }
}
