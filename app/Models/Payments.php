<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments'; 
    
    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'payment_proof',
        'payment_reference',
        'payment_date'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
