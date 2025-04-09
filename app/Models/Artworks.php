<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artworks extends Model
{
    use HasFactory;

    protected $table = 'artworks';  // Specify the table name
    protected $fillable = [
        'user_id',
        'category_id',
        'artwork_title',
        'description',
        'price',
        'image_path',
    ];

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
