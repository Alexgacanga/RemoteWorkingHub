<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{   // FILLABLES TO BE ADDED LATER
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function packages(){
        return $this->belongsTo(Package::class);
    }
    public function receipt(){
        return $this->hasOne(Receipt::class);
    }
}
