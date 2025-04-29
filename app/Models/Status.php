<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status'; 
    
    protected $fillable = [
        'status_name'
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
