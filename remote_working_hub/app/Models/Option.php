<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'name',
        'picture',
        'description',
        'is_active'
    ];
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function packages(){
        return $this->hasMany(Package::class);
    }
}
