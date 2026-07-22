<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    function permissions(){
        return $this->hasMany(Permission::class);
    }
    function users(){
        return $this->hasMany(User::class);
    }
}
