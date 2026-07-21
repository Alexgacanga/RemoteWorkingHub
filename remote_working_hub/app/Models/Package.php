<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    function option(){
        return $this->belongsTo(Option::class);
    }
    function users(){
        return $this->belongsToMany(User::class);
    }
    function package_details(){
        return $this->hasMany(Package_detail::class);
    }
}
