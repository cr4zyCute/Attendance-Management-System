<?php
$pageTitle = 'Reports';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Attendance Management System</title>
    <link rel="stylesheet" href="../css/teacher_reports.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <div class="reports-content">
            <!-- Summary Stats -->
            <div class="summary-grid">
                <div class="summary-card highlight">
                    <div class="summary-content">
                        <span class="summary-value">89%</span>
                        <span class="summary-label">Average Attendance</span>
                        <div class="summary-trend up">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 15l-6-6-6 6"></path>
                            </svg>
                            <span>+3% from last month</span>
                        </div>
                    </div>
                    <div class="summary-chart">
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <path class="circle" stroke-dasharray="89, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                        </svg>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon students">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="summary-info">
                        <span class="summary-value">156</span>
                        <span class="summary-label">Total Students</span>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon classes">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="summary-info">
                        <span class="summary-value">5</span>
                        <span class="summary-label">Classes</span>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon sessions">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="summary-info">
                        <span class="summary-value">248</span>
                        <span class="summary-label">Sessions Recorded</span>
                    </div>
                </div>
            </div>

            <!-- Reports Grid -->
            <div class="reports-grid">
                <!-- Class Performance -->
                <div class="card class-performance-card">
                    <div class="card-header">
                        <h2 class="card-title">Class Attendance Overview</h2>
                        <select class="filter-select" id="classFilter">
                            <option value="all">All Classes</option>
                            <option value="math101">MATH101 - Mathematics</option>
                            <option value="phy201">PHY201 - Physics</option>
                            <option value="cs301">CS301 - Computer Science</option>
                            <option value="eng102">ENG102 - English</option>
                            <option value="chem201">CHEM201 - Chemistry</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <div class="class-list">
                            <div class="class-item">
                                <div class="class-info">
                                    <span class="class-name">MATH101 - Mathematics</span>
                                    <span class="class-students">32 students</span>
                                </div>
                                <div class="class-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill excellent" style="width: 94%"></div>
                                    </div>
                                    <span class="class-percentage">94%</span>
                                </div>
                            </div>
                            <div class="class-item">
                                <div class="class-info">
                                    <span class="class-name">PHY201 - Physics</span>
                                    <span class="class-students">28 students</span>
                                </div>
                                <div class="class-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill good" style="width: 87%"></div>
                                    </div>
                                    <span class="class-percentage">87%</span>
                                </div>
                            </div>
                            <div class="class-item">
                                <div class="class-info">
                                    <span class="class-name">CS301 - Computer Science</span>
                                    <span class="class-students">35 students</span>
                                </div>
                                <div class="class-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill excellent" style="width: 92%"></div>
                                    </div>
                                    <span class="class-percentage">92%</span>
                                </div>
                            </div>
                            <div class="class-item">
                                <div class="class-info">
                                    <span class="class-name">ENG102 - English</span>
                                    <span class="class-students">30 students</span>
                                </div>
                                <div class="class-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill warning" style="width: 78%"></div>
                                    </div>
                                    <span class="class-percentage">78%</span>
                                </div>
                            </div>
                            <div class="class-item">
                                <div class="class-info">
                                    <span class="class-name">CHEM201 - Chemistry</span>
                                    <span class="class-students">31 students</span>
                                </div>
                                <div class="class-stats">
                                    <div class="progress-bar">
                                        <div class="progress-fill good" style="width: 85%"></div>
                                    </div>
                                    <span class="class-percentage">85%</span>
                                </div>
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
                                    <div class="trend-bar" style="--height: 82%">
                                        <span class="trend-value">82%</span>
                                    </div>
                                    <span class="trend-label">Aug</span>
                                </div>
                                <div class="trend-bar-item">
                                    <div class="trend-bar" style="--height: 85%">
                                        <span class="trend-value">85%</span>
                                    </div>
                                    <span class="trend-label">Sep</span>
                                </div>
                                <div class="trend-bar-item">
                                    <div class="trend-bar" style="--height: 88%">
                                        <span class="trend-value">88%</span>
                                    </div>
                                    <span class="trend-label">Oct</span>
                                </div>
                                <div class="trend-bar-item">
                                    <div class="trend-bar" style="--height: 86%">
                                        <span class="trend-value">86%</span>
                                    </div>
                                    <span class="trend-label">Nov</span>
                                </div>
                                <div class="trend-bar-item active">
                                    <div class="trend-bar" style="--height: 89%">
                                        <span class="trend-value">89%</span>
                                    </div>
                                    <span class="trend-label">Dec</span>
                                </div>
                            </div>
                        </div>
                        <div class="trend-summary">
                            <div class="trend-stat">
                                <span class="stat-label">Best Month</span>
                                <span class="stat-value highlight">December (89%)</span>
                            </div>
                            <div class="trend-stat">
                                <span class="stat-label">Average</span>
                                <span class="stat-value">86%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Download Reports Section -->
            <div class="card download-reports-card">
                <div class="card-header">
                    <h2 class="card-title">Generate & Download Reports</h2>
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
                                <h3 class="report-name">Class Attendance Summary</h3>
                                <p class="report-desc">Overview of attendance for all your classes</p>
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
                                    <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="report-info">
                                <h3 class="report-name">Student-wise Report</h3>
                                <p class="report-desc">Individual attendance records per student</p>
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
                                <h3 class="report-name">Daily Attendance Log</h3>
                                <p class="report-desc">Day-by-day attendance records</p>
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
                                <p class="report-desc">Complete attendance data in spreadsheet</p>
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

            <!-- Low Attendance Alerts -->
            <div class="card alerts-card">
                <div class="card-header">
                    <h2 class="card-title">Low Attendance Alerts</h2>
                    <span class="alert-count">5 students</span>
                </div>
                <div class="card-body">
                    <div class="alerts-list">
                        <div class="alert-item warning">
                            <div class="alert-student">
                                <div class="student-avatar">JD</div>
                                <div class="student-info">
                                    <span class="student-name">John Doe</span>
                                    <span class="student-id">STU-00012</span>
                                </div>
                            </div>
                            <div class="alert-details">
                                <span class="alert-class">ENG102 - English</span>
                                <span class="alert-percentage warning">68%</span>
                            </div>
                        </div>
                        <div class="alert-item warning">
                            <div class="alert-student">
                                <div class="student-avatar">MS</div>
                                <div class="student-info">
                                    <span class="student-name">Maria Santos</span>
                                    <span class="student-id">STU-00023</span>
                                </div>
                            </div>
                            <div class="alert-details">
                                <span class="alert-class">PHY201 - Physics</span>
                                <span class="alert-percentage warning">72%</span>
                            </div>
                        </div>
                        <div class="alert-item danger">
                            <div class="alert-student">
                                <div class="student-avatar">RG</div>
                                <div class="student-info">
                                    <span class="student-name">Robert Garcia</span>
                                    <span class="student-id">STU-00045</span>
                                </div>
                            </div>
                            <div class="alert-details">
                                <span class="alert-class">MATH101 - Mathematics</span>
                                <span class="alert-percentage danger">58%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/teacher-dashboard.js"></script>
</body>
</html>
