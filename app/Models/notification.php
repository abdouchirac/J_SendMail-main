<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',

    ];
    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
}
