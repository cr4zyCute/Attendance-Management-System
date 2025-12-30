<?php
$pageTitle = 'Reports';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reports - Attendance Management System</title>
    <link rel="stylesheet" href="./css/student_report.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <!-- Reports Content -->
        <div class="reports-content">
            <!-- Overall Summary Cards -->
            <div class="summary-grid">
                <div class="summary-card highlight">
                    <div class="summary-content">
                        <span class="summary-value">86%</span>
                        <span class="summary-label">Overall Attendance</span>
                        <div class="summary-trend up">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 15l-6-6-6 6"></path>
                            </svg>
                            <span>+2% from last month</span>
                        </div>
                    </div>
                    <div class="summary-chart">
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <path class="circle" stroke-dasharray="86, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                        </svg>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon classes">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="summary-info">
                        <span class="summary-value">124</span>
                        <span class="summary-label">Total Classes</span>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon present">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="summary-info">
                        <span class="summary-value">107</span>
                        <span class="summary-label">Present</span>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon absent">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="summary-info">
                        <span class="summary-value">12</span>
                        <span class="summary-label">Absent</span>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon late">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="summary-info">
                        <span class="summary-value">5</span>
                        <span class="summary-label">Late</span>
                    </div>
                </div>
            </div>

            <!-- Course Performance Section -->
            <div class="reports-grid">
                <!-- Course Breakdown -->
                <div class="card course-breakdown-card">
                    <div class="card-header">
                        <h2 class="card-title">Attendance by Course</h2>
                    </div>
                    <div class="card-body">
                        <div class="course-list">
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">Mathematics</span>
                                    <span class="course-code">MATH101</span>
                                </div>
                                <div class="course-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill excellent" style="width: 95%"></div>
                                    </div>
                                    <span class="course-percentage">95%</span>
                                </div>
                                <span class="course-detail">19/20 classes</span>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">Physics</span>
                                    <span class="course-code">PHY201</span>
                                </div>
                                <div class="course-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill good" style="width: 88%"></div>
                                    </div>
                                    <span class="course-percentage">88%</span>
                                </div>
                                <span class="course-detail">22/25 classes</span>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">Computer Science</span>
                                    <span class="course-code">CS301</span>
                                </div>
                                <div class="course-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill excellent" style="width: 92%"></div>
                                    </div>
                                    <span class="course-percentage">92%</span>
                                </div>
                                <span class="course-detail">23/25 classes</span>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">English</span>
                                    <span class="course-code">ENG102</span>
                                </div>
                                <div class="course-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill warning" style="width: 75%"></div>
                                    </div>
                                    <span class="course-percentage">75%</span>
                                </div>
                                <span class="course-detail">15/20 classes</span>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">Chemistry</span>
                                    <span class="course-code">CHEM201</span>
                                </div>
                                <div class="course-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill good" style="width: 82%"></div>
                                    </div>
                                    <span class="course-percentage">82%</span>
                                </div>
                                <span class="course-detail">18/22 classes</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Trend -->
                <div class="card monthly-trend-card">
                    <div class="card-header">
                        <h2 class="card-title">Monthly Attendance Trend</h2>
                    </div>
                    <div class="card-body">
                        <div class="trend-chart">
                            <div class="trend-bars">
                                <div class="trend-bar-item">
                                    <div class="trend-bar" style="--height: 78%">
                                        <span class="trend-value">78%</span>
                                    </div>
                                    <span class="trend-label">Aug</span>
                                </div>
                                <div class="trend-bar-item">
                                    <div class="trend-bar" style="--height: 82%">
                                        <span class="trend-value">82%</span>
                                    </div>
                                    <span class="trend-label">Sep</span>
                                </div>
                                <div class="trend-bar-item">
                                    <div class="trend-bar" style="--height: 85%">
                                        <span class="trend-value">85%</span>
                                    </div>
                                    <span class="trend-label">Oct</span>
                                </div>
                                <div class="trend-bar-item">
                                    <div class="trend-bar" style="--height: 80%">
                                        <span class="trend-value">80%</span>
                                    </div>
                                    <span class="trend-label">Nov</span>
                                </div>
                                <div class="trend-bar-item active">
                                    <div class="trend-bar" style="--height: 86%">
                                        <span class="trend-value">86%</span>
                                    </div>
                                    <span class="trend-label">Dec</span>
                                </div>
                            </div>
                        </div>
                        <div class="trend-summary">
                            <div class="trend-stat">
                                <span class="stat-label">Best Month</span>
                                <span class="stat-value highlight">December (86%)</span>
                            </div>
                            <div class="trend-stat">
                                <span class="stat-label">Average</span>
                                <span class="stat-value">82.2%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Downloadable Reports Section -->
            <div class="card download-reports-card">
                <div class="card-header">
                    <h2 class="card-title">Download Reports</h2>
                    <p class="card-subtitle">Generate and download your attendance reports</p>
                </div>
                <div class="card-body">
                    <div class="report-options">
                        <div class="report-option">
                            <div class="report-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="report-info">
                                <h3 class="report-name">Attendance Summary</h3>
                                <p class="report-desc">Overview of your attendance across all courses</p>
                            </div>
                            <button class="btn btn-primary download-btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>PDF</span>
                            </button>
                        </div>
                        <div class="report-option">
                            <div class="report-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="report-info">
                                <h3 class="report-name">Monthly Report</h3>
                                <p class="report-desc">Detailed attendance for the current month</p>
                            </div>
                            <button class="btn btn-primary download-btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>PDF</span>
                            </button>
                        </div>
                        <div class="report-option">
                            <div class="report-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="report-info">
                                <h3 class="report-name">Course-wise Report</h3>
                                <p class="report-desc">Attendance breakdown by each course</p>
                            </div>
                            <button class="btn btn-primary download-btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>PDF</span>
                            </button>
                        </div>
                        <div class="report-option">
                            <div class="report-icon excel">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="report-info">
                                <h3 class="report-name">Full Data Export</h3>
                                <p class="report-desc">Complete attendance data in spreadsheet format</p>
                            </div>
                            <button class="btn btn-outline download-btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Excel</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Alerts -->
            <div class="card alerts-card">
                <div class="card-header">
                    <h2 class="card-title">Attendance Alerts</h2>
                </div>
                <div class="card-body">
                    <div class="alerts-list">
                        <div class="alert-item warning">
                            <div class="alert-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="alert-content">
                                <span class="alert-title">Low Attendance Warning</span>
                                <span class="alert-message">Your English (ENG102) attendance is at 75%. Minimum required is 80%.</span>
                            </div>
                        </div>
                        <div class="alert-item info">
                            <div class="alert-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="alert-content">
                                <span class="alert-title">Attendance Goal</span>
                                <span class="alert-message">You need to attend 4 more English classes to reach 80% attendance.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/student-dashboard.js"></script>
</body>
</html>
