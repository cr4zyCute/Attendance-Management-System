<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// API-only backend - no web auth routes needed
// Frontend handles authentication via API routes

// Student Routes
Route::middleware('auth:student')->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/attendance', [StudentController::class, 'attendance'])->name('attendance');
    Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
});

// Teacher Routes (placeholder)
Route::middleware('auth:teacher')->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        return view('teacher.dashboard');
    })->name('dashboard');
});
