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
        </div>
        <div class="user-profile">
            <div class="user-avatar">JT</div>
            <div class="user-info">
                <span class="user-name">Jane Teacher</span>
                <span class="user-role">Teacher</span>
            </div>
        </div>
    </div>
</header>
