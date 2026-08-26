<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $fillable = [
        'start_date',
        'end_date',
        'customer_id',
        'package_id',
        'status',
        'no_of_days'
    ];

    protected $casts = [
    'end_date' => 'datetime',
];
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
