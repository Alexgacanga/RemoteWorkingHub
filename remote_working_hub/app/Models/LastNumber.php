<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LastNumber extends Model
{
    protected $fillable = [
        'doc_type',
        'last_number'
    ];
}
