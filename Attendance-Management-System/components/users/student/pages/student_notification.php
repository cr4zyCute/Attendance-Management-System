<?php
$pageTitle = 'Notifications';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Attendance Management System</title>
    <link rel="stylesheet" href="./css/student_dashboard.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="./css/student_notification.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <!-- Notifications Content - Split View -->
        <div class="notifications-container">
            <!-- Left Panel - Notification List -->
            <div class="notifications-list-panel">
                <div class="panel-header">
                    <div class="header-info">
                        <h2>Inbox</h2>
                        <span class="notification-count" id="totalCount">0 notifications</span>
                    </div>
                    <div class="header-actions">
                        <button class="icon-btn" id="markAllReadPageBtn" title="Mark all as read">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                        <div class="filter-dropdown">
                            <button class="icon-btn" id="filterBtn" title="Filter">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                </svg>
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
                
                <div class="notifications-list" id="notificationsListPage">
                    <!-- Notifications will be rendered here -->
                </div>
            </div>

            <!-- Right Panel - Notification Preview -->
            <div class="notification-preview-panel" id="previewPanel">
                <div class="preview-content" id="previewContent">
                    <div class="preview-header">
                        <button class="back-btn" id="backBtn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M19 12H5M12 19l-7-7 7-7"></path>
                            </svg>
                            
                        </button>
                        <div class="preview-icon" id="previewIcon"></div>
                        <div class="preview-meta">
                            <span class="preview-type" id="previewType"></span>
                            <span class="preview-time" id="previewTime"></span>
                        </div>
                        <div class="preview-actions">
                            <button class="icon-btn" id="deleteBtn" title="Delete">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="preview-body">
                        <h2 class="preview-title" id="previewTitle">Select a notification</h2>
                        <p class="preview-message" id="previewMessage">Choose a notification from the list to view its details.</p>
                    </div>
                    <div class="preview-footer" id="previewFooter" style="display: none;">
                        <button class="btn btn-outline" id="markReadBtn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"></path>
                            </svg>
                            Mark as read
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/student-dashboard.js"></script>
    <script src="../js/student-notification.js"></script>
</body>
</html>