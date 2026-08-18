<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'name',
        'cover_image',
        'description',
        'is_active',
    ];

    public function packages(){
        return $this->hasMany(Package::class);
    }
}
