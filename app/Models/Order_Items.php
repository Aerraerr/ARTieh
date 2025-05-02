<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Items extends Model
{
    protected $table = 'order_item'; 
    
    protected $fillable = [
        'artwork_id',
        'order_id',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function artwork()
    {
        return $this->belongsTo(Artworks::class, 'artwork_id');
    }
}
