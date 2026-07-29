<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    'name',
    'description',
    'price',
    'time_options',
    'is_active',
    'options'
];
    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

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
