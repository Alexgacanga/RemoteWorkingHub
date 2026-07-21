<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    function packages(){
        return $this->hasMany(Package::class);
    }
}
