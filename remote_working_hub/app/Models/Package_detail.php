<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package_detail extends Model
{
    function package(){
        return $this->belongsTo(Package::class);
    }
}
