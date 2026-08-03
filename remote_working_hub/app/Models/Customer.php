<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone_no',
        'id_no',
        'payment_id'
    ];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function receipts(){
        return $this->hasMany(Receipt::class);
    }
}
