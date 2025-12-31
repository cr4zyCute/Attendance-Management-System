<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - Attendance Management System</title>
    <link rel="stylesheet" href="../css/teacher_courses.css">
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
            <a href="teacher_dashboard.php" class="nav-item">
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
            <a href="teacher_courses.php" class="nav-item active">
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
                <h1 class="page-title">My Courses</h1>
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
                <a href="teacher_profile.php" class="user-profile">
                    <div class="user-avatar">JT</div>
                    <div class="user-info">
                        <span class="user-name">John Teacher</span>
                        <span class="user-role">Teacher</span>
                    </div>
                </a>
            </div>
        </header>

        <!-- Courses Content -->
        <div class="courses-content">
            <!-- Search & Filter -->
            <div class="search-filter-section">
                <div class="search-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                    <input type="text" placeholder="Search courses..." class="search-input">
                </div>
                <div class="filter-buttons">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Active</button>
                    <button class="filter-btn">Completed</button>
                </div>
            </div>

            <!-- Course Stats -->
            <div class="course-stats">
                <div class="stat-item">
                    <span class="stat-number">6</span>
                    <span class="stat-text">Assigned Courses</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5</span>
                    <span class="stat-text">Active</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">1</span>
                    <span class="stat-text">Completed</span>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="courses-grid">
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
                            <span>You</span>
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
                            <span>You</span>
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
                            <span>You</span>
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
            </div>

            <button class="fab-add" title="Add Class">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14"></path>
                </svg>
            </button>
        </div>
    </main>

    <script src="../js/teacher-dashboard.js"></script>
</body>
</html>
