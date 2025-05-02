<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'artwork_id',
        'order_id',
        'artist_rating',
        'artwork_rating',
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function artwork(){
        return $this->belongsTo(Artworks::class);
    }
    public function order(){
        return $this->belongsTo(Orders::class);
    }
}
