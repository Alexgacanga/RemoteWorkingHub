<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
