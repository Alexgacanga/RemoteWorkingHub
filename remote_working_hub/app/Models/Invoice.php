<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'due_date',
        'subscription_id',
        'customer_id',
        'total_amount',
        'status',
        'balance_amount',
        'paid_amount',
        'total_amount',
        'invoice_number'
    ];
    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function receipts(){
        return $this->hasMany(Receipt::class);
    }
}
