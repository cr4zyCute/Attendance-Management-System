<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\Student;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();

        foreach ($students as $student) {
            // Create sample notifications for each student
            Notification::create([
                'student_id' => $student->id,
                'type' => 'info',
                'title' => 'Attendance Alert',
                'message' => 'Your attendance for Physics dropped below 85%. Please ensure regular attendance.',
            ]);

            Notification::create([
                'student_id' => $student->id,
                'type' => 'success',
                'title' => 'Attendance Marked',
                'message' => 'Your attendance has been successfully marked for Mathematics class.',
                'read_at' => now(),
            ]);

            Notification::create([
                'student_id' => $student->id,
                'type' => 'warning',
                'title' => 'Attendance Reminder',
                'message' => 'Your English class attendance is at 78%. Consider attending more classes.',
            ]);

            Notification::create([
                'student_id' => $student->id,
                'type' => 'success',
                'title' => 'Course Enrolled',
                'message' => 'You have been successfully enrolled in Computer Science 301.',
                'read_at' => now(),
            ]);

            Notification::create([
                'student_id' => $student->id,
                'type' => 'info',
                'title' => 'Schedule Update',
                'message' => 'Your Chemistry class has been rescheduled to 2:00 PM on Wednesdays.',
            ]);
        }
    }
}