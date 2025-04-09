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
        DB::table('category')->insert([
            ['category_name' => 'Paintings'],
            ['category_name' => 'Drawings'],
            ['category_name' => 'Sculpture'],
            ['category_name' => 'Portrait'],
            ['category_name' => 'Landscape'],
            ['category_name' => 'Still Life'],
            ['category_name' => 'Conceptual'],
            ['category_name' => 'Photography'],
        ]);
        
    }
}
