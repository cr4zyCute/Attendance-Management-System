<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::guard('student')->user();
        
        $courses = $student->courses()->with('teacher')->get();
        $totalClasses = Attendance::where('student_id', $student->id)->count();
        $presentCount = Attendance::where('student_id', $student->id)->where('status', 'present')->count();
        $absentCount = Attendance::where('student_id', $student->id)->where('status', 'absent')->count();
        $lateCount = Attendance::where('student_id', $student->id)->where('status', 'late')->count();
        
        $overallAttendance = $totalClasses > 0 ? round(($presentCount / $totalClasses) * 100) : 0;
        
        $recentAttendance = Attendance::where('student_id', $student->id)
            ->with('course')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        return view('student.dashboard', compact(
            'student', 'courses', 'totalClasses', 'presentCount', 
            'absentCount', 'lateCount', 'overallAttendance', 'recentAttendance'
        ));
    }

    public function attendance(Request $request)
    {
        $student = Auth::guard('student')->user();
        
        $query = Attendance::where('student_id', $student->id)->with('course.teacher');
        
        if ($request->course) {
            $query->where('course_id', $request->course);
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->month) {
            $query->whereMonth('date', $request->month);
        }
        
        $attendances = $query->orderBy('date', 'desc')->paginate(10);
        $courses = $student->courses;
        
        $stats = [
            'total' => Attendance::where('student_id', $student->id)->count(),
            'present' => Attendance::where('student_id', $student->id)->where('status', 'present')->count(),
            'absent' => Attendance::where('student_id', $student->id)->where('status', 'absent')->count(),
            'late' => Attendance::where('student_id', $student->id)->where('status', 'late')->count(),
        ];

        return view('student.attendance', compact('student', 'attendances', 'courses', 'stats'));
    }

    public function courses()
    {
        $student = Auth::guard('student')->user();
        $courses = $student->courses()->with('teacher')->get();
        
        foreach ($courses as $course) {
            $total = Attendance::where('student_id', $student->id)
                ->where('course_id', $course->id)->count();
            $present = Attendance::where('student_id', $student->id)
                ->where('course_id', $course->id)
                ->where('status', 'present')->count();
            $course->attendance_percentage = $total > 0 ? round(($present / $total) * 100) : 0;
        }

        return view('student.courses', compact('student', 'courses'));
    }
}
