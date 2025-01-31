<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Crear un admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Crear 5 profesores
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Teacher $i",
                'email' => "teacher$i@example.com",
                'password' => Hash::make('password'),
                'role' => 'teacher',
            ]);
        }

        // Crear 20 estudiantes
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => "Student $i",
                'email' => "student$i@example.com",
                'password' => Hash::make('password'),
                'role' => 'student',
            ]);
        }
    }
}