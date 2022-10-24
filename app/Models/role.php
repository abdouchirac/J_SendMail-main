<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_libele',

    ];

    public function user()
    {
        return $this->BelonsToMany(user::class,'userrole','user_id','role_id');
    }

}
