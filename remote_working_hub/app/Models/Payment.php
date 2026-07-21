<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    function user(){
        return $this->belongsToMany(User::class);
    }
}
