<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Attendance Management System</title>
    <link rel="stylesheet" href="../css/teacher_dashboard.css">
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
            <a href="teacher_dashboard.php" class="nav-item active">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="teacher_attendance.php" class="nav-item">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Attendance</span>
            </a>
            <a href="teacher_courses.php" class="nav-item">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span>Courses</span>
            </a>
            <a href="#" class="nav-item">
                <svg class="nav-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Reports</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="#" class="nav-item logout" onclick="logout(event)">
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
                <h1 class="page-title">Dashboard</h1>
            </div>
            <div class="header-right">
                <div class="notification-wrapper">
                    <button class="notification-btn" aria-label="Notifications">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"></path>
                            <path d="M13 21a2 2 0 01-4 0"></path>
                        </svg>
                        <span class="notification-badge"></span>
                    </button>
                    <div class="notification-dropdown">
                        <div class="dropdown-header">
                            <span class="title">Notifications</span>
                            <span class="status-pill">3 new</span>
                        </div>
                        <div class="notification-item">
                            <div class="notification-icon info">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">Attendance update: Physics dropped below 85%</p>
                                <span class="notification-time">2h ago</span>
                            </div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-icon success">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">Attendance marked for Mathematics class</p>
                                <span class="notification-time">Today, 8:05 AM</span>
                            </div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-icon warning">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">Reminder: English attendance at 78%</p>
                                <span class="notification-time">Yesterday</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-profile">
                    <div class="user-avatar">JS</div>
                    <div class="user-info">
                        <span class="user-name">John Teacher</span>
                        <span class="user-role">Teacher</span>
                    </div>
                </div>
            </div>
        </header>

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
                        <span class="stat-label">Courses</span>
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
                    <div class="card-header">
                        <h2 class="card-title">Today's Schedule</h2>
                        <span class="card-date">December 21, 2025</span>
                    </div>
                    <div class="card-body">
                        <div class="schedule-list">
                            <div class="schedule-item">
                                <div class="schedule-time">
                                    <span class="time">08:00</span>
                                    <span class="period">AM</span>
                                </div>
                                <div class="schedule-details">
                                    <span class="subject">Mathematics</span>
                                    <span class="room">Room 101</span>
                                </div>
                                <span class="schedule-status present">Present</span>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">
                                    <span class="time">10:00</span>
                                    <span class="period">AM</span>
                                </div>
                                <div class="schedule-details">
                                    <span class="subject">Physics</span>
                                    <span class="room">Room 203</span>
                                </div>
                                <span class="schedule-status present">Present</span>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">
                                    <span class="time">01:00</span>
                                    <span class="period">PM</span>
                                </div>
                                <div class="schedule-details">
                                    <span class="subject">Computer Science</span>
                                    <span class="room">Lab 3</span>
                                </div>
                                <span class="schedule-status upcoming">Upcoming</span>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">
                                    <span class="time">03:00</span>
                                    <span class="period">PM</span>
                                </div>
                                <div class="schedule-details">
                                    <span class="subject">English</span>
                                    <span class="room">Room 105</span>
                                </div>
                                <span class="schedule-status upcoming">Upcoming</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance Summary -->
                <div class="card attendance-card">
                    <div class="card-header">
                        <h2 class="card-title">Attendance by Course</h2>
                    </div>
                    <div class="card-body">
                        <div class="course-attendance-list">
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">Mathematics</span>
                                    <span class="course-progress">90%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 90%;"></div>
                                </div>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">Physics</span>
                                    <span class="course-progress">85%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 85%;"></div>
                                </div>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">Computer Science</span>
                                    <span class="course-progress">95%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill high" style="width: 95%;"></div>
                                </div>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">English</span>
                                    <span class="course-progress">78%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill warning" style="width: 78%;"></div>
                                </div>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <span class="course-name">Chemistry</span>
                                    <span class="course-progress">82%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 82%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Notifications -->
            <div class="card notifications-card">
                <div class="card-header">
                    <h2 class="card-title">Recent Notifications</h2>
                    <a href="#" class="view-all">View All</a>
                </div>
                <div class="card-body">
                    <div class="notification-list">
                        <div class="notification-item">
                            <div class="notification-icon info">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">Attendance update: Physics dropped below 85%</p>
                                <span class="notification-time">2 hours ago</span>
                            </div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-icon success">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">Attendance marked for Mathematics class</p>
                                <span class="notification-time">Today, 8:05 AM</span>
                            </div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-icon warning">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">Reminder: English class attendance is at 78%</p>
                                <span class="notification-time">Yesterday</span>
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