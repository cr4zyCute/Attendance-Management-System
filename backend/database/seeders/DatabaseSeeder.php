<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Student 1 (ID starts at 00001)
        Student::updateOrCreate(
            ['student_id' => '00001'],
            [
                'first_name' => 'John',
                'last_name' => 'Student',
                'email' => 'john.student@example.com',
                'password' => Hash::make('password123'),
            ]
        );

        // Create Teacher 1 (ID starts at 10001)
        Teacher::updateOrCreate(
            ['email' => 'teacher@example.com'],
            [
                'teacher_id' => '10001',
                'first_name' => 'Jane',
                'last_name' => 'Teacher',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
