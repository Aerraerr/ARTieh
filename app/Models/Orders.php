<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders'; 
    
    protected $fillable = [
        'user_id',
        'status_id',
        'total_amount',
        'ordered_at',
        'delivery_method',
        'reference_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function items()
    {
        return $this->hasMany(Order_Items::class, 'order_id');
    }

    public function payment()
    {
        return $this->hasOne(Payments::class, 'order_id');
    }
    public function review()
    {
        return $this->hasOne(Review::class, 'order_id');
    }

}
