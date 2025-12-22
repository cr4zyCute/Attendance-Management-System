<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard(Request $request)
    {
        $student = $request->user();
        
        $courses = $student->courses()->with('teacher')->get();
        $totalCourses = $courses->count();
        
        $attendances = Attendance::where('student_id', $student->id)->get();
        $totalClasses = $attendances->count();
        $presentCount = $attendances->where('status', 'present')->count();
        $absentCount = $attendances->where('status', 'absent')->count();
        $lateCount = $attendances->where('status', 'late')->count();
        
        $attendanceRate = $totalClasses > 0 ? round(($presentCount / $totalClasses) * 100) : 0;
        
        return response()->json([
            'success' => true,
            'data' => [
                'student' => $student,
                'stats' => [
                    'attendance_rate' => $attendanceRate,
                    'total_courses' => $totalCourses,
                    'days_present' => $presentCount,
                    'days_absent' => $absentCount,
                    'days_late' => $lateCount,
                ],
                'courses' => $courses,
            ]
        ]);
    }

    public function attendance(Request $request)
    {
        $student = $request->user();
        
        $attendances = Attendance::where('student_id', $student->id)
            ->with('course')
            ->orderBy('date', 'desc')
            ->paginate(10);
        
        return response()->json([
            'success' => true,
            'data' => $attendances
        ]);
    }

    public function courses(Request $request)
    {
        $student = $request->user();
        
        $courses = $student->courses()
            ->with('teacher')
            ->withCount(['attendances as total_classes' => function ($query) use ($student) {
                $query->where('student_id', $student->id);
            }])
            ->withCount(['attendances as present_count' => function ($query) use ($student) {
                $query->where('student_id', $student->id)->where('status', 'present');
            }])
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $courses
        ]);
    }
}
