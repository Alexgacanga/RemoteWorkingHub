<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
