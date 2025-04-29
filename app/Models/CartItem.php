<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items'; 
    
    protected $fillable = [
        'cart_id',
        'artwork_id'
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function artwork()
    {
        return $this->belongsTo(Artworks::class);
    }
}
