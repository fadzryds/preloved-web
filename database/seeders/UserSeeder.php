<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Customer 1
        User::create([
            'name' => 'Sarah Parker',
            'email' => 'sarah@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
        ]);

        // Customer 2
        User::create([
            'name' => 'Emily Rose',
            'email' => 'emily@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
        ]);

        // Customer 3
        User::create([
            'name' => 'Jessica Smith',
            'email' => 'jessica@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
        ]);
    }
}