<?php
$pageTitle = 'Notifications';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Attendance Management System</title>
    <link rel="stylesheet" href="../css/student_dashboard.css">
    <link rel="stylesheet" href="../css/student_notification.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <!-- Notifications Content -->
        <div class="notifications-content">
            <!-- Header Actions -->
            <div class="notifications-header">
                <div class="header-info">
                    <h2>All Notifications</h2>
                    <span class="notification-count" id="totalCount">0 notifications</span>
                </div>
                <div class="header-actions">
                    <button class="btn btn-outline" id="markAllReadPageBtn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Mark all as read
                    </button>
                    <div class="filter-dropdown">
                        <button class="btn btn-outline filter-btn" id="filterBtn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                            Filter
                        </button>
                        <div class="filter-menu" id="filterMenu">
                            <div class="filter-item active" data-filter="all">All</div>
                            <div class="filter-item" data-filter="unread">Unread</div>
                            <div class="filter-item" data-filter="info">Info</div>
                            <div class="filter-item" data-filter="success">Success</div>
                            <div class="filter-item" data-filter="warning">Warning</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications List -->
            <div class="notifications-list-container">
                <div class="notifications-list" id="notificationsListPage">
                    <!-- Loading state -->
                    <div class="loading-state" id="loadingState">
                        <div class="spinner"></div>
                        <p>Loading notifications...</p>
                    </div>
                </div>

                <!-- Empty State -->
                <div class="empty-state" id="emptyState" style="display: none;">
                    <div class="empty-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"></path>
                            <path d="M13 21a2 2 0 01-4 0"></path>
                        </svg>
                    </div>
                    <h3>No notifications</h3>
                    <p>You're all caught up! Check back later for updates.</p>
                </div>

                <!-- Pagination -->
                <div class="pagination" id="pagination" style="display: none;">
                    <button class="pagination-btn prev" id="prevBtn" disabled>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Previous
                    </button>
                    <span class="pagination-info" id="paginationInfo">Page 1 of 1</span>
                    <button class="pagination-btn next" id="nextBtn" disabled>
                        Next
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/config.js"></script>
    <script src="../js/student-dashboard.js"></script>
    <script src="../js/student-notification.js"></script>
</body>
</html>