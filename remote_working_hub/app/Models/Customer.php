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
    ];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
