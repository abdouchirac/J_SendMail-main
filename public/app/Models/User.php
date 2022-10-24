<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 /*    protected $fillable = [
        'name',
        'email',
        'password',
    ]; */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $rules = [
        'user.first_name' => 'max:15',
        'user.last_name' => 'max:20',
        'user.birthday' => 'date_format:Y-m-d',
        'user.email' => 'email',
        'user.phone' => 'numeric',
        'user.gender' => '',
        'user.address' => 'max:20',
        'user.number' => 'numeric',
        'user.city' => 'max:20',
        'user.zip' => 'numeric',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public static function search($query)
    {
        return empty($query) ? static::query()->where('user_type', 'user')
            : static::where('user_type', 'user')
                ->where(function($q) use ($query) {
                    $q
                        ->where(' first_name', 'LIKE', '%'. $query . '%')
                        ->where(' last_name', 'LIKE', '%'. $query . '%')
                        ->orWhere('email', 'LIKE', '%' . $query . '%')
                        ->orWhere('address', 'LIKE ', '%' . $query . '%');
                });
    }
}
