@extends('layouts.student')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="dashboard-content">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon attendance">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $overallAttendance }}%</span>
                <span class="stat-label">Overall Attendance</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon courses">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $courses->count() }}</span>
                <span class="stat-label">Enrolled Courses</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon present">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $presentCount }}</span>
                <span class="stat-label">Days Present</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon absent">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $absentCount }}</span>
                <span class="stat-label">Days Absent</span>
            </div>
        </div>
    </div>

    <div class="dashboard-grid">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Recent Attendance</h2>
            </div>
            <div class="card-body">
                <div class="schedule-list">
                    @forelse($recentAttendance as $record)
                    <div class="schedule-item">
                        <div class="schedule-time">
                            <span class="time">{{ $record->date->format('d') }}</span>
                            <span class="period">{{ $record->date->format('M') }}</span>
                        </div>
                        <div class="schedule-details">
                            <span class="subject">{{ $record->course->name }}</span>
                            <span class="room">{{ $record->course->room }}</span>
                        </div>
                        <span class="schedule-status {{ $record->status }}">{{ ucfirst($record->status) }}</span>
                    </div>
                    @empty
                    <p class="text-muted">No attendance records yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">My Courses</h2>
            </div>
            <div class="card-body">
                <div class="course-attendance-list">
                    @foreach($courses as $course)
                    <div class="course-item">
                        <div class="course-info">
                            <span class="course-name">{{ $course->name }}</span>
                            <span class="course-progress">{{ $course->code }}</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 85%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
