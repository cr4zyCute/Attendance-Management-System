<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_type' => 'required|in:student,teacher',
            'password' => 'required',
        ]);

        if ($request->login_type === 'student') {
            $request->validate(['student_id' => 'required']);
            
            $student = Student::where('student_id', $request->student_id)->first();
            
            if ($student && Hash::check($request->password, $student->password)) {
                Auth::guard('student')->login($student);
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'redirect' => route('student.dashboard'),
                        'user' => $student
                    ]);
                }
                
                return redirect()->route('student.dashboard');
            }
        } else {
            $request->validate(['email' => 'required|email']);
            
            $teacher = Teacher::where('email', $request->email)->first();
            
            if ($teacher && Hash::check($request->password, $teacher->password)) {
                Auth::guard('teacher')->login($teacher);
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'redirect' => route('teacher.dashboard'),
                        'user' => $teacher
                    ]);
                }
                
                return redirect()->route('teacher.dashboard');
            }
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'errors' => ['login' => ['Invalid credentials']]
            ], 401);
        }

        return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        } elseif (Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('login');
    }
}
