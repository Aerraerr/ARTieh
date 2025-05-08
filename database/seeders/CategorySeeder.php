<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Paintings', 'Drawings', 'Sculpture', 'Portrait', 'Landscape', 'Still Life', 'Conceptual', 'Photography',
            'Renaissance', 'Baroque', 'Rococo', 'Neoclassicism', 'Romanticism',
            'Realism', 'Impressionism', 'Post-Impressionism', 'Expressionism', 'Fauvism',
            'Symbolism', 'Art Nouveau', 'Cubism', 'Dada', 'Surrealism',
            'Abstract', 'Abstract Expressionism', 'Pop Art', 'Minimalism', 'Conceptual Art',
            'Contemporary', 'Modernism', 'Postmodernism', 'Street Art', 'Graffiti',
            'Futurism', 'Constructivism', 'Retro', 'Indie', 'Digital Art',
            'Photorealism', 'Fantasy', 'Naïve Art', 'Outsider Art', 'Installation Art',
            'Performance Art', 'Nude Art'
        ];

        foreach ($categories as $category) {
            DB::table('category')->updateOrInsert(
                ['category_name' => $category], // Check if category already exists
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
        
    }
}
