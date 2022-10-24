<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $fillable = [
        'permission_libele',

    ];
    use HasFactory;

    public function user()
    {
        return $this->BelonsToMany(user::class,'user_permissions','user_id','permission_id');
    }
}
