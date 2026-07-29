<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{   // FILLABLES TO BE ADDED LATER
    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
