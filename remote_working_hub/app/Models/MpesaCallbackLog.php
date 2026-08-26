<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MpesaCallbackLog extends Model
{
    protected $fillable = [
            'transaction_id',
            'bill_reference',
            'transaction_time',
            'transaction_amount',
            'phone_number',
            'fname',
            'lname',
            'status',
            'payload'
    ];
}
