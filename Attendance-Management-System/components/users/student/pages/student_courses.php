<?php
$pageTitle = 'My Courses';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - Attendance Management System</title>
    <link rel="stylesheet" href="./css/student_courses.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <!-- Courses Content -->
        <div class="courses-content">
            <!-- Course Stats -->
            <div class="course-stats">
                <div class="stat-item">
                    <div class="stat-icon enrolled">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-number">6</span>
                        <span class="stat-text">Enrolled Courses</span>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon active">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-number">5</span>
                        <span class="stat-text">Active</span>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon completed">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-number">1</span>
                        <span class="stat-text">Completed</span>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon attendance">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-number">87%</span>
                        <span class="stat-text">Avg. Attendance</span>
                    </div>
                </div>
            </div>
                   <div class="search-filter-bar">
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Search courses...">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                <div class="filter-actions">
                    <div class="filter-icon-btn" id="filterBtn" title="Filter">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                        <div class="dropdown-menu filter-dropdown" id="filterDropdown">
                            <div class="dropdown-header">Filter Courses</div>
                            <div class="dropdown-item active" data-filter="all">All Courses</div>
                            <div class="dropdown-item" data-filter="active">Active</div>
                            <div class="dropdown-item" data-filter="completed">Completed</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Courses Grid -->
            <div class="courses-grid">
                <!-- Course Card 1 -->
                <div class="course-card">
                    <div class="course-header">
                        <div class="course-icon math">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16v16H4z"></path>
                                <path d="M4 12h16M12 4v16"></path>
                            </svg>
                        </div>
                        <span class="course-status active">Active</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Mathematics</h3>
                        <p class="course-code">MATH101</p>
                        <div class="course-teacher">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Mr. Johnson</span>
                        </div>
                        <div class="course-schedule">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            <span>Mon, Wed, Fri - 8:00 AM</span>
                        </div>
                    </div>
                    <div class="course-footer">
                        <div class="attendance-info">
                            <span class="attendance-label">Attendance</span>
                            <span class="attendance-value">90%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 90%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="course-card">
                    <div class="course-header">
                        <div class="course-icon physics">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 2v4M12 18v4M2 12h4M18 12h4"></path>
                            </svg>
                        </div>
                        <span class="course-status active">Active</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Physics</h3>
                        <p class="course-code">PHY201</p>
                        <div class="course-teacher">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Dr. Smith</span>
                        </div>
                        <div class="course-schedule">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            <span>Tue, Thu - 10:00 AM</span>
                        </div>
                    </div>
                    <div class="course-footer">
                        <div class="attendance-info">
                            <span class="attendance-label">Attendance</span>
                            <span class="attendance-value">85%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 85%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Course Card 3 -->
                <div class="course-card">
                    <div class="course-header">
                        <div class="course-icon cs">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 18l6-6-6-6M8 6l-6 6 6 6"></path>
                            </svg>
                        </div>
                        <span class="course-status active">Active</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Computer Science</h3>
                        <p class="course-code">CS301</p>
                        <div class="course-teacher">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Ms. Davis</span>
                        </div>
                        <div class="course-schedule">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            <span>Mon, Wed - 1:00 PM</span>
                        </div>
                    </div>
                    <div class="course-footer">
                        <div class="attendance-info">
                            <span class="attendance-label">Attendance</span>
                            <span class="attendance-value high">95%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill high" style="width: 95%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Course Card 4 -->
                <div class="course-card">
                    <div class="course-header">
                        <div class="course-icon english">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 19.5A2.5 2.5 0 016.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"></path>
                            </svg>
                        </div>
                        <span class="course-status active">Active</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">English</h3>
                        <p class="course-code">ENG102</p>
                        <div class="course-teacher">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Mrs. Wilson</span>
                        </div>
                        <div class="course-schedule">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            <span>Tue, Thu - 3:00 PM</span>
                        </div>
                    </div>
                    <div class="course-footer">
                        <div class="attendance-info">
                            <span class="attendance-label">Attendance</span>
                            <span class="attendance-value warning">78%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill warning" style="width: 78%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Course Card 5 -->
                <div class="course-card">
                    <div class="course-header">
                        <div class="course-icon chemistry">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 3h6v6l3 9H6l3-9V3z"></path>
                                <path d="M9 3h6"></path>
                            </svg>
                        </div>
                        <span class="course-status active">Active</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">Chemistry</h3>
                        <p class="course-code">CHEM201</p>
                        <div class="course-teacher">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Dr. Brown</span>
                        </div>
                        <div class="course-schedule">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            <span>Wed, Fri - 9:00 AM</span>
                        </div>
                    </div>
                    <div class="course-footer">
                        <div class="attendance-info">
                            <span class="attendance-label">Attendance</span>
                            <span class="attendance-value">82%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 82%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Course Card 6 - Completed -->
                <div class="course-card completed">
                    <div class="course-header">
                        <div class="course-icon history">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                        </div>
                        <span class="course-status completed">Completed</span>
                    </div>
                    <div class="course-body">
                        <h3 class="course-title">History</h3>
                        <p class="course-code">HIST101</p>
                        <div class="course-teacher">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Mr. Anderson</span>
                        </div>
                        <div class="course-schedule">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            <span>Completed - Fall 2025</span>
                        </div>
                    </div>
                    <div class="course-footer">
                        <div class="attendance-info">
                            <span class="attendance-label">Final Attendance</span>
                            <span class="attendance-value high">92%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill high" style="width: 92%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating Add Button -->
            <button class="fab-add" id="addClassBtn" title="Add Class">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14"></path>
                </svg>
            </button>
        </div>

        <!-- Add Class Modal -->
        <div class="modal-overlay" id="addClassModal">
            <div class="modal-container">
                <div class="modal-header">
                    <div class="modal-course-info">
                        <div class="modal-course-icon" style="background: #3b82f6;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14M5 12h14"></path>
                            </svg>
                        </div>
                        <div class="modal-course-title">
                            <h2>Join a Class</h2>
                            <span class="modal-course-code">Enter class code to enroll</span>
                        </div>
                    </div>
                    <button class="modal-close" id="closeAddClassModal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 6L6 18M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="modal-section">
                        <h3 class="modal-section-title">Class Code</h3>
                        <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem;">
                            Ask your teacher for the class code, then enter it here.
                        </p>
                        <div class="add-class-form">
                            <input type="text" id="classCodeInput" class="class-code-input" placeholder="Enter class code (e.g., ABC123)" maxlength="10">
                            <p class="input-hint" id="inputHint"></p>
                        </div>
                    </div>
                    
                    <div class="modal-section">
                        <h3 class="modal-section-title">How to join</h3>
                        <ul class="join-instructions">
                            <li>Get the class code from your teacher</li>
                            <li>Enter the code above</li>
                            <li>Click "Join Class" to enroll</li>
                        </ul>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="cancelAddClass">Cancel</button>
                    <button class="btn btn-primary" id="joinClassBtn">Join Class</button>
                </div>
            </div>
        </div>

        <!-- Course Detail Modal -->
        <div class="modal-overlay" id="courseModal">
            <div class="modal-container">
                <div class="modal-header">
                    <div class="modal-course-info">
                        <div class="modal-course-icon" id="modalCourseIcon">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16v16H4z"></path>
                            </svg>
                        </div>
                        <div class="modal-course-title">
                            <h2 id="modalCourseName">Mathematics</h2>
                            <span class="modal-course-code" id="modalCourseCode">MATH101</span>
                        </div>
                    </div>
                    <button class="modal-close" id="closeModal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 6L6 18M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="modal-body">
                    <!-- Course Details Section -->
                    <div class="modal-section">
                        <h3 class="modal-section-title">Course Details</h3>
                        <div class="modal-details-grid">
                            <div class="modal-detail-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <div class="detail-content">
                                    <span class="detail-label">Teacher</span>
                                    <span class="detail-value" id="modalTeacher">Mr. Johnson</span>
                                </div>
                            </div>
                            <div class="modal-detail-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M12 6v6l4 2"></path>
                                </svg>
                                <div class="detail-content">
                                    <span class="detail-label">Schedule</span>
                                    <span class="detail-value" id="modalSchedule">Mon, Wed, Fri - 8:00 AM</span>
                                </div>
                            </div>
                            <div class="modal-detail-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                                <div class="detail-content">
                                    <span class="detail-label">Attendance Rate</span>
                                    <span class="detail-value" id="modalAttendance">90%</span>
                                </div>
                            </div>
                            <div class="modal-detail-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <div class="detail-content">
                                    <span class="detail-label">Status</span>
                                    <span class="detail-value status-badge" id="modalStatus">Active</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Attendance History Section -->
                    <div class="modal-section">
                        <h3 class="modal-section-title">Attendance History</h3>
                        <div class="modal-attendance-list" id="modalAttendanceList">
                            <div class="attendance-row">
                                <div class="attendance-date">
                                    <span class="att-day">21</span>
                                    <span class="att-month">Dec</span>
                                </div>
                                <div class="attendance-time">08:00 AM</div>
                                <span class="attendance-status present">Present</span>
                            </div>
                            <div class="attendance-row">
                                <div class="attendance-date">
                                    <span class="att-day">19</span>
                                    <span class="att-month">Dec</span>
                                </div>
                                <div class="attendance-time">08:00 AM</div>
                                <span class="attendance-status present">Present</span>
                            </div>
                            <div class="attendance-row">
                                <div class="attendance-date">
                                    <span class="att-day">17</span>
                                    <span class="att-month">Dec</span>
                                </div>
                                <div class="attendance-time">08:00 AM</div>
                                <span class="attendance-status late">Late</span>
                            </div>
                            <div class="attendance-row">
                                <div class="attendance-date">
                                    <span class="att-day">15</span>
                                    <span class="att-month">Dec</span>
                                </div>
                                <div class="attendance-time">08:00 AM</div>
                                <span class="attendance-status present">Present</span>
                            </div>
                            <div class="attendance-row">
                                <div class="attendance-date">
                                    <span class="att-day">13</span>
                                    <span class="att-month">Dec</span>
                                </div>
                                <div class="attendance-time">08:00 AM</div>
                                <span class="attendance-status absent">Absent</span>
                            </div>
                            <div class="attendance-row">
                                <div class="attendance-date">
                                    <span class="att-day">11</span>
                                    <span class="att-month">Dec</span>
                                </div>
                                <div class="attendance-time">08:00 AM</div>
                                <span class="attendance-status present">Present</span>
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
