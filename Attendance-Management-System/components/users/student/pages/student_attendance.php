<?php
$pageTitle = 'My Attendance';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attendance - Attendance Management System</title>
    <link rel="stylesheet" href="../css/student_attendance.css">
</head>
<body>
    <!-- Dropdown Overlay for Mobile -->
    <div class="dropdown-overlay"></div>
    
    <?php include '../sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <!-- Attendance Content -->
        <div class="attendance-content">
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

            <!-- Search & Filter Bar -->
            <div class="search-filter-bar">
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Search courses, teachers...">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                <div class="filter-actions">
                    <div class="filter-icon-btn" id="datePickerBtn" title="Select Date">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                            <rect x="7" y="14" width="3" height="3"></rect>
                            <rect x="14" y="14" width="3" height="3"></rect>
                        </svg>
                        <!-- Date Picker Dropdown -->
                        <div class="dropdown-menu date-dropdown" id="dateDropdown">
                            <div class="dropdown-header">Select Month</div>
                            <div class="dropdown-item active" data-value="">All Months</div>
                            <div class="dropdown-item" data-value="12">December 2025</div>
                            <div class="dropdown-item" data-value="11">November 2025</div>
                            <div class="dropdown-item" data-value="10">October 2025</div>
                            <div class="dropdown-item" data-value="9">September 2025</div>
                        </div>
                    </div>
                    <div class="filter-icon-btn" id="filterBtn" title="Filter">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                        <!-- Filter Dropdown with Tabs -->
                        <div class="dropdown-menu filter-dropdown" id="filterDropdown">
                            <div class="filter-tabs">
                                <button class="filter-tab active" data-tab="status">Status</button>
                                <button class="filter-tab" data-tab="course">Course</button>
                            </div>
                            <div class="filter-tab-content active" id="tab-status">
                                <div class="dropdown-item active" data-filter="status" data-value="">All Status</div>
                                <div class="dropdown-item" data-filter="status" data-value="present">Present</div>
                                <div class="dropdown-item" data-filter="status" data-value="absent">Absent</div>
                                <div class="dropdown-item" data-filter="status" data-value="late">Late</div>
                                <div class="dropdown-item" data-filter="status" data-value="excused">Excused</div>
                            </div>
                            <div class="filter-tab-content" id="tab-course">
                                <div class="dropdown-item active" data-filter="course" data-value="">All Courses</div>
                                <div class="dropdown-item" data-filter="course" data-value="math">Mathematics</div>
                                <div class="dropdown-item" data-filter="course" data-value="physics">Physics</div>
                                <div class="dropdown-item" data-filter="course" data-value="cs">Computer Science</div>
                                <div class="dropdown-item" data-filter="course" data-value="english">English</div>
                                <div class="dropdown-item" data-filter="course" data-value="chemistry">Chemistry</div>
                            </div>
                        </div>
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
