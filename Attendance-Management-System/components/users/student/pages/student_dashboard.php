<?php
$pageTitle = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Attendance Management System</title>
    <link rel="stylesheet" href="./css/student_dashboard.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon attendance">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">85%</span>
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
                        <span class="stat-value">6</span>
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
                        <span class="stat-value">42</span>
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
                        <span class="stat-value">8</span>
                        <span class="stat-label">Days Absent</span>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Schedule -->
            <div class="dashboard-grid">
                <!-- Today's Schedule -->
                <div class="card schedule-card">
                    <div class="card-header schedule-header">
                        <h2 class="card-title">Schedule</h2>
                        <!-- Compact Date Slider -->
                        <div class="date-slider-compact">
                            <button class="month-picker-btn" id="monthPickerBtn">
                                <span id="currentMonth">December</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                            <!-- Calendar Dropdown -->
                            <div class="calendar-dropdown" id="calendarDropdown">
                                <div class="calendar-header">
                                    <button class="cal-nav-btn" id="calPrevMonth">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M15 18l-6-6 6-6"></path>
                                        </svg>
                                    </button>
                                    <span class="cal-month-year" id="calMonthYear">December 2025</span>
                                    <button class="cal-nav-btn" id="calNextMonth">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M9 18l6-6-6-6"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="calendar-weekdays">
                                    <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
                                </div>
                                <div class="calendar-days" id="calendarDays"></div>
                                <div class="calendar-footer">
                                    <button class="cal-today-btn" id="calTodayBtn">Today</button>
                                </div>
                            </div>
                            <div class="date-slider" id="dateSlider">
                                <div class="date-slider-track" id="dateSliderTrack">
                                    <!-- Dates will be generated by JS -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="schedule-list" id="scheduleList">
                            <!-- Schedule items will be generated by JS -->
                        </div>
                        <div class="no-schedule" id="noSchedule" style="display: none;">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p>No classes scheduled for this day</p>
                        </div>
                    </div>
                </div>

                <!-- Attendance Summary - Bar Chart -->
                <div class="card attendance-card">
                    <div class="card-header">
                        <h2 class="card-title">Attendance by Course</h2>
                    </div>
                    <div class="card-body">
                        <div class="bar-chart-container">
                            <div class="bar-chart">
                                <div class="chart-y-axis">
                                    <span class="y-label">100%</span>
                                    <span class="y-label">75%</span>
                                    <span class="y-label">50%</span>
                                    <span class="y-label">25%</span>
                                    <span class="y-label">0%</span>
                                </div>
                                <div class="chart-area">
                                    <div class="chart-grid">
                                        <div class="grid-line"></div>
                                        <div class="grid-line"></div>
                                        <div class="grid-line"></div>
                                        <div class="grid-line"></div>
                                        <div class="grid-line"></div>
                                    </div>
                                    <div class="bars-wrapper">
                                        <div class="bar-item" data-value="90">
                                            <div class="bar" style="--bar-height: 90%;">
                                                <span class="bar-value">90%</span>
                                            </div>
                                            <span class="bar-label">Math</span>
                                        </div>
                                        <div class="bar-item" data-value="85">
                                            <div class="bar" style="--bar-height: 85%;">
                                                <span class="bar-value">85%</span>
                                            </div>
                                            <span class="bar-label">Physics</span>
                                        </div>
                                        <div class="bar-item" data-value="95">
                                            <div class="bar high" style="--bar-height: 95%;">
                                                <span class="bar-value">95%</span>
                                            </div>
                                            <span class="bar-label">CS</span>
                                        </div>
                                        <div class="bar-item" data-value="78">
                                            <div class="bar warning" style="--bar-height: 78%;">
                                                <span class="bar-value">78%</span>
                                            </div>
                                            <span class="bar-label">English</span>
                                        </div>
                                        <div class="bar-item" data-value="82">
                                            <div class="bar" style="--bar-height: 82%;">
                                                <span class="bar-value">82%</span>
                                            </div>
                                            <span class="bar-label">Chem</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chart Footer -->
                            <div class="chart-footer">
                                <div class="chart-legend">
                                    <div class="legend-item">
                                        <span class="legend-color excellent"></span>
                                        <span class="legend-text">Excellent (≥90%)</span>
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color good"></span>
                                        <span class="legend-text">Good (80-89%)</span>
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color needs-improvement"></span>
                                        <span class="legend-text">Needs Improvement (&lt;80%)</span>
                                    </div>
                                </div>
                                <div class="chart-summary">
                                    <div class="summary-item">
                                        <span class="summary-label">Average</span>
                                        <span class="summary-value">86%</span>
                                    </div>
                                    <div class="summary-item">
                                        <span class="summary-label">Highest</span>
                                        <span class="summary-value highlight">95%</span>
                                    </div>
                                    <div class="summary-item">
                                        <span class="summary-label">Lowest</span>
                                        <span class="summary-value warning">78%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Attendance -->
            <div class="card recent-attendance-card">
                <div class="card-header">
                    <h2 class="card-title">Recent Attendance</h2>
                    <a href="student_attendance.php" class="view-all">View All</a>
                </div>
                <div class="card-body">
                    <div class="attendance-timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">
                                <span class="day">21</span>
                                <span class="month">Dec</span>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-row">
                                    <span class="subject">Mathematics</span>
                                    <span class="time">08:00 AM</span>
                                    <span class="status present">Present</span>
                                </div>
                                <div class="timeline-row">
                                    <span class="subject">Physics</span>
                                    <span class="time">10:00 AM</span>
                                    <span class="status present">Present</span>
                                </div>
                                <div class="timeline-row">
                                    <span class="subject">Computer Science</span>
                                    <span class="time">01:00 PM</span>
                                    <span class="status present">Present</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">
                                <span class="day">20</span>
                                <span class="month">Dec</span>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-row">
                                    <span class="subject">Chemistry</span>
                                    <span class="time">09:00 AM</span>
                                    <span class="status present">Present</span>
                                </div>
                                <div class="timeline-row">
                                    <span class="subject">English</span>
                                    <span class="time">03:00 PM</span>
                                    <span class="status late">Late</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">
                                <span class="day">19</span>
                                <span class="month">Dec</span>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-row">
                                    <span class="subject">Mathematics</span>
                                    <span class="time">08:00 AM</span>
                                    <span class="status present">Present</span>
                                </div>
                                <div class="timeline-row">
                                    <span class="subject">Physics</span>
                                    <span class="time">10:00 AM</span>
                                    <span class="status absent">Absent</span>
                                </div>
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
