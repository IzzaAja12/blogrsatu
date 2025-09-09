<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat user author
        User::create([
            'name' => 'Author',
            'email' => 'author@example.com',
            'password' => Hash::make('password'),
            'role' => 'author',
        ]);

        // Buat kategori contoh
        Category::create(['name' => 'Technology']);
        Category::create(['name' => 'Lifestyle']);
        Category::create(['name' => 'Travel']);        // Tambahan
        Category::create(['name' => 'Food']);          // Tambahan
        Category::create(['name' => 'Health']);        // Tambahan
        Category::create(['name' => 'Entertainment']); // Tambahan
    }
}