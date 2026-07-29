<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{   // FILLABLES TO BE ADDED LATER
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
