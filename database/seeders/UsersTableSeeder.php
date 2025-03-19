<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Administrator',
                'last_name' => '', 
                'email' => 'administrator@artieh.com',
                'password' => Hash::make('artiehadministrator'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Aeron Jead',
                'last_name' => 'Marquez',
                'email' => 'marquezaeronjead@gmail..com',
                'password' => Hash::make('marquezaeronjead'),
                'phone' => '09916668005',
                'role' => 'seller',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ron Peter',
                'last_name' => 'Mortega',
                'email' => 'mortegaronpeter@gmail.com',
                'password' => Hash::make('mortegaronpeter'),
                'phone' => '09953979935',
                'role' => 'buyer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
        ]);
    }

}
