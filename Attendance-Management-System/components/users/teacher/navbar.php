<?php
/**
 * Teacher Navbar Component
 * Include this file in teacher pages to render the header
 * Usage: <?php include '../navbar.php'; ?>
 * 
 * Required: Set $pageTitle before including this file
 */

if (!isset($pageTitle)) {
    $pageTitle = 'Dashboard';
}
?>

<!-- Header -->
<header class="header">
    <div class="header-left">
        <button class="menu-toggle" aria-label="Toggle menu">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <h1 class="page-title"><?php echo htmlspecialchars($pageTitle); ?></h1>
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
