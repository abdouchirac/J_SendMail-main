<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'images',

    ];
    public function users()
    {
        return $this->hasMany(User::class, 'image_id');
    }
    protected $guarded = [];
}
