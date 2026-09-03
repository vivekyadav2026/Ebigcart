<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default user
        User::firstOrCreate(["email" => "test@example.com"], [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Seed admin user
        User::firstOrCreate(["email" => "admin@admin.com"], [
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'is_admin' => true,
            'password' => bcrypt('password'),
        ]);

        // Seed products, categories, and banners using MahaShringar data
        $this->call(MahaShringarSeeder::class);
    }
}
