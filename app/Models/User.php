<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Chatify\Traits\ChatifyMessenger;
use Chatify\Traits\ChatifyMessengerTrait;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name', 
        'last_name',
        'name',
        'email',
        'phone',
        'password',
        'address',
        'profile_pic',
        'biography',
        'gcash_no',
        'sampleArt',
        'validId'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //para sa full name call nalang ining function --full_name--
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getNameAttribute()
    {
        return $this->full_name;
    }
    

    //Eloquent ORMs
    public function artworks()
    {
        return $this->hasMany(Artworks::class, 'user_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function attendingEvents()
    {
        return $this->belongsToMany(Event::class, 'event_attendees')->withTimestamps();
    }

    
}
