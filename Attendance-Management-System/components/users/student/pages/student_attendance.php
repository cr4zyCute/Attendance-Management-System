<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attendance - Attendance Management System</title>
    <link rel="stylesheet" href="../css/student_attendance.css">
</head>
<body>
    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay"></div>
    
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <span class="logo-icon">📚</span>
                <span class="logo-text">AMS</span>
            </div>
            <button class="sidebar-close">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <nav class="sidebar-nav">
            <a href="student_dashboard.php" class="nav-item">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="student_attendance.php" class="nav-item active">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Attendance</span>
            </a>
            <a href="student_courses.php" class="nav-item">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span>Courses</span>
            </a>
            <a href="student_reports.php" class="nav-item">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Reports</span>
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <a href="#" class="nav-item logout">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <button class="menu-toggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h1 class="page-title">My Attendance</h1>
            </div>
            <div class="header-right">
                <div class="user-profile">
                    <div class="user-avatar">JS</div>
                    <div class="user-info">
                        <span class="user-name">John Student</span>
                        <span class="user-role">Student</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Attendance Content -->
        <div class="attendance-content">
            <!-- Filters Section -->
            <div class="filters-section">
                <div class="filter-group">
                    <label for="courseFilter">Course</label>
                    <select id="courseFilter" class="filter-select">
                        <option value="">All Courses</option>
                        <option value="math">Mathematics</option>
                        <option value="physics">Physics</option>
                        <option value="cs">Computer Science</option>
                        <option value="english">English</option>
                        <option value="chemistry">Chemistry</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="monthFilter">Month</label>
                    <select id="monthFilter" class="filter-select">
                        <option value="">All Months</option>
                        <option value="12" selected>December 2025</option>
                        <option value="11">November 2025</option>
                        <option value="10">October 2025</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="statusFilter">Status</label>
                    <select id="statusFilter" class="filter-select">
                        <option value="">All Status</option>
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                        <option value="late">Late</option>
                        <option value="excused">Excused</option>
                    </select>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-icon total">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="summary-info">
                        <span class="summary-value">50</span>
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
                        <span class="summary-value">42</span>
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
                        <span class="summary-value">5</span>
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
                        <span class="summary-value">3</span>
                        <span class="summary-label">Late</span>
                    </div>
                </div>
            </div>

            <!-- Attendance Table -->
            <div class="card attendance-table-card">
                <div class="card-header">
                    <h2 class="card-title">Attendance Records</h2>
                    <div class="card-actions">
                        <button class="btn btn-outline">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="attendance-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Course</th>
                                    <th>Time</th>
                                    <th>Teacher</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-day">21</span>
                                            <span class="date-month">Dec</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="course-cell">
                                            <span class="course-name">Mathematics</span>
                                            <span class="course-code">MATH101</span>
                                        </div>
                                    </td>
                                    <td>08:00 AM</td>
                                    <td>Mr. Johnson</td>
                                    <td><span class="status-badge present">Present</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-day">21</span>
                                            <span class="date-month">Dec</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="course-cell">
                                            <span class="course-name">Physics</span>
                                            <span class="course-code">PHY201</span>
                                        </div>
                                    </td>
                                    <td>10:00 AM</td>
                                    <td>Dr. Smith</td>
                                    <td><span class="status-badge present">Present</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-day">20</span>
                                            <span class="date-month">Dec</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="course-cell">
                                            <span class="course-name">Computer Science</span>
                                            <span class="course-code">CS301</span>
                                        </div>
                                    </td>
                                    <td>01:00 PM</td>
                                    <td>Ms. Davis</td>
                                    <td><span class="status-badge late">Late</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-day">20</span>
                                            <span class="date-month">Dec</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="course-cell">
                                            <span class="course-name">English</span>
                                            <span class="course-code">ENG102</span>
                                        </div>
                                    </td>
                                    <td>03:00 PM</td>
                                    <td>Mrs. Wilson</td>
                                    <td><span class="status-badge present">Present</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-day">19</span>
                                            <span class="date-month">Dec</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="course-cell">
                                            <span class="course-name">Chemistry</span>
                                            <span class="course-code">CHEM201</span>
                                        </div>
                                    </td>
                                    <td>09:00 AM</td>
                                    <td>Dr. Brown</td>
                                    <td><span class="status-badge absent">Absent</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-day">19</span>
                                            <span class="date-month">Dec</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="course-cell">
                                            <span class="course-name">Mathematics</span>
                                            <span class="course-code">MATH101</span>
                                        </div>
                                    </td>
                                    <td>11:00 AM</td>
                                    <td>Mr. Johnson</td>
                                    <td><span class="status-badge excused">Excused</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-day">18</span>
                                            <span class="date-month">Dec</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="course-cell">
                                            <span class="course-name">Physics</span>
                                            <span class="course-code">PHY201</span>
                                        </div>
                                    </td>
                                    <td>10:00 AM</td>
                                    <td>Dr. Smith</td>
                                    <td><span class="status-badge present">Present</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination">
                        <span class="pagination-info">Showing 1-7 of 50 records</span>
                        <div class="pagination-controls">
                            <button class="pagination-btn" disabled>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button class="pagination-btn active">1</button>
                            <button class="pagination-btn">2</button>
                            <button class="pagination-btn">3</button>
                            <button class="pagination-btn">...</button>
                            <button class="pagination-btn">8</button>
                            <button class="pagination-btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/student-dashboard.js"></script>
</body>
</html>
