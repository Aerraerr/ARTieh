<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = ['category_name'];
    
    // Relationship with the Artwork model
    public function artworks()
    {
        return $this->hasMany(Artworks::class, 'category_id');
    }
}
