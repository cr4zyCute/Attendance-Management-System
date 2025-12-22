<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login_type' => 'required|in:student,teacher',
            'password' => 'required',
        ]);

        if ($request->login_type === 'student') {
            $request->validate(['student_id' => 'required']);
            
            $student = Student::where('student_id', $request->student_id)->first();
            
            if (!$student) {
                return response()->json([
                    'success' => false,
                    'errors' => ['student_id' => 'Student ID not found']
                ], 401);
            }
            
            if (!Hash::check($request->password, $student->password)) {
                return response()->json([
                    'success' => false,
                    'errors' => ['password' => 'Invalid password']
                ], 401);
            }
            
            $token = $student->createToken('auth-token')->plainTextToken;
            
            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $student,
                'user_type' => 'student'
            ]);
        } else {
            $request->validate(['email' => 'required|email']);
            
            $teacher = Teacher::where('email', $request->email)->first();
            
            if (!$teacher) {
                return response()->json([
                    'success' => false,
                    'errors' => ['email' => 'Email not found']
                ], 401);
            }
            
            if (!Hash::check($request->password, $teacher->password)) {
                return response()->json([
                    'success' => false,
                    'errors' => ['password' => 'Invalid password']
                ], 401);
            }
            
            $token = $teacher->createToken('auth-token')->plainTextToken;
            
            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $teacher,
                'user_type' => 'teacher'
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        
        return response()->json(['success' => true]);
    }

    public function user(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => $request->user()
        ]);
    }
}
