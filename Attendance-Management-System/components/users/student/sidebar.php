<?php
/**
 * Student Sidebar Component
 * Include this file in student pages to render the sidebar
 * Usage: <?php include 'sidebar.php'; ?>
 */

// Get current page for active state
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>

<!-- Sidebar Overlay for Mobile -->
<div class="sidebar-overlay"></div>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <span class="logo-icon">📚</span>
            <span class="logo-text">AMS</span>
        </div>
        <button class="sidebar-close" aria-label="Close sidebar">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    
    <nav class="sidebar-nav" role="navigation" aria-label="Main navigation">
        <a href="student_dashboard.php" class="nav-item <?php echo ($currentPage === 'student_dashboard') ? 'active' : ''; ?>">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
            <span>Dashboard</span>
        </a>
                <a href="student_notification.php" class="nav-item <?php echo ($currentPage === 'student_notification') ? 'active' : ''; ?>">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"></path>
                <path d="M13 21a2 2 0 01-4 0"></path>
            </svg>
            <span>Notifications</span>
        </a>
        <a href="student_attendance.php" class="nav-item <?php echo ($currentPage === 'student_attendance') ? 'active' : ''; ?>">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>Attendance</span>
        </a>
        <a href="student_courses.php" class="nav-item <?php echo ($currentPage === 'student_courses') ? 'active' : ''; ?>">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span>Courses</span>
        </a>
        <a href="student_reports.php" class="nav-item <?php echo ($currentPage === 'student_reports') ? 'active' : ''; ?>">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span>Reports</span>
        </a>


    </nav>
    
    <div class="sidebar-footer">
        <a href="#" class="nav-item logout" onclick="logout(event)">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span>Logout</span>
        </a>
    </div>
</aside>