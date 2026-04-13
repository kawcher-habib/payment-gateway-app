<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id',
        'customer_id',
        'amount',
        'currency',
        'method',
        'gateway',
        'tran_id',
        'status',
        'created_by',
        'updated_by',
    ];
}
