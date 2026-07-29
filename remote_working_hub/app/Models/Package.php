<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function option(){
        return $this->belongsTo(Option::class);
    }
    public function package_details(){
        return $this->hasMany(Package_detail::class);
    }
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
