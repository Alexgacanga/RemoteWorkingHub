<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{   // FILLABLES TO BE ADDED LATER
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function package(){
        return $this->belongsTo(Package::class);
    }
    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
