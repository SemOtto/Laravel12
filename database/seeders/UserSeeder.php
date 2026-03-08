<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create student user
        $student = User::firstOrCreate(
            ['email' => 'student@school.nl'],
            [
                'name' => 'student',
                'password' => Hash::make('student'),
            ]
        );
        $student->assignRole('student');

        // Create teacher user
        $teacher = User::firstOrCreate(
            ['email' => 'teacher@school.nl'],
            [
                'name' => 'teacher',
                'password' => Hash::make('teacher'),
            ]
        );
        $teacher->assignRole('teacher');

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@school.nl'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin'),
            ]
        );
        $admin->assignRole('admin');
    }
}
