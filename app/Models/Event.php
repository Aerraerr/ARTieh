<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events'; 
    
    protected $fillable = [
        'user_id',
        'organizer_name',
        'event_name',
        'location',
        'event_description',
        'event_date',
        'event_img'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'event_attendees')->withTimestamps();
    }
    
}
