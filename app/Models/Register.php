<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{

    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
    ];

}