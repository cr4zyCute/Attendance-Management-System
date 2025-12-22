<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Teachers
        $teacher1 = Teacher::create([
            'teacher_id' => '10001',
            'first_name' => 'John',
            'last_name' => 'Johnson',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('teacher@gmail.com'),
        ]);

        $teacher2 = Teacher::create([
            'teacher_id' => '10002',
            'first_name' => 'Sarah',
            'last_name' => 'Smith',
            'email' => 'sarah.smith@school.com',
            'password' => Hash::make('password123'),
        ]);

        // Create Students
        $student1 = Student::create([
            'student_id' => '00001',
            'first_name' => 'John',
            'last_name' => 'Student',
            'email' => 'john.student@email.com',
            'password' => Hash::make('123123'),
        ]);

        // Create Courses
        $math = Course::create([
            'code' => 'MATH101',
            'name' => 'Mathematics',
            'teacher_id' => $teacher1->id,
            'schedule' => 'Mon, Wed, Fri - 8:00 AM',
            'room' => 'Room 101',
            'status' => 'active',
        ]);

        $physics = Course::create([
            'code' => 'PHY201',
            'name' => 'Physics',
            'teacher_id' => $teacher2->id,
            'schedule' => 'Tue, Thu - 10:00 AM',
            'room' => 'Room 203',
            'status' => 'active',
        ]);

        $cs = Course::create([
            'code' => 'CS301',
            'name' => 'Computer Science',
            'teacher_id' => $teacher1->id,
            'schedule' => 'Mon, Wed - 1:00 PM',
            'room' => 'Lab 3',
            'status' => 'active',
        ]);

        $english = Course::create([
            'code' => 'ENG102',
            'name' => 'English',
            'teacher_id' => $teacher2->id,
            'schedule' => 'Tue, Thu - 3:00 PM',
            'room' => 'Room 105',
            'status' => 'active',
        ]);

        $chemistry = Course::create([
            'code' => 'CHEM201',
            'name' => 'Chemistry',
            'teacher_id' => $teacher1->id,
            'schedule' => 'Wed, Fri - 9:00 AM',
            'room' => 'Lab 1',
            'status' => 'active',
        ]);

        // Enroll student in courses
        $student1->courses()->attach([$math->id, $physics->id, $cs->id, $english->id, $chemistry->id]);

        // Create sample attendance records
        $statuses = ['present', 'present', 'present', 'present', 'absent', 'late', 'present', 'excused'];
        $courses = [$math, $physics, $cs, $english, $chemistry];
        
        for ($i = 0; $i < 20; $i++) {
            $date = now()->subDays($i);
            foreach ($courses as $course) {
                if (rand(0, 1)) {
                    Attendance::create([
                        'student_id' => $student1->id,
                        'course_id' => $course->id,
                        'date' => $date,
                        'time' => '08:00:00',
                        'status' => $statuses[array_rand($statuses)],
                    ]);
                }
            }
        }
    }
}
