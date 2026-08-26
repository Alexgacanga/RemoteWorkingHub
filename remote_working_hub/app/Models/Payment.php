<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{   protected $fillable = [
    'payment_method',
    'bill_reference',
    'transaction_id',
    'payment_date',
    'phone_number',
    'amount',
    'fname',
    'lname',
    'customer_id',
    'invoice_id',
    'user_id',
    'package_id'
];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    public function package(){
        return $this->belongsTo(Package::class);
    }
    public function receipt(){
        return $this->hasOne(Receipt::class);
    }
}
