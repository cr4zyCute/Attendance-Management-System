<?php
/**
 * Student Navbar Component
 * Include this file in student pages to render the header with notification bell
 * Usage: <?php include '../navbar.php'; ?> (adjust path as needed)
 * 
 * Required: Set $pageTitle before including this file
 * Example: $pageTitle = 'Dashboard';
 */

// Default page title if not set
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
                <span class="notification-badge" id="notificationBadge" style="display: none;"></span>
            </button>
            <div class="notification-dropdown" id="notificationDropdown">
                <div class="dropdown-header">
                    <span class="title">Notifications</span>
                    <span class="status-pill" id="notificationCount">0 new</span>
                </div>
                <div class="notification-list-dropdown" id="notificationList">
                    <!-- Notifications will be loaded dynamically -->
                    <div class="notification-loading">
                        <p>Loading notifications...</p>
                    </div>
                </div>
                <div class="dropdown-footer">
                    <a href="student_notification.php" class="view-all-link">View All Notifications</a>
                    <button class="mark-all-read-btn" id="markAllReadBtn">Mark all as read</button>
                </div>
            </div>
        </div>
        <div class="user-profile">
            <div class="user-avatar" id="userAvatar">JS</div>
            <div class="user-info">
                <span class="user-name" id="userName">Student</span>
                <span class="user-role">Student</span>
            </div>
        </div>
    </div>
</header>

<script>
// Notification functionality
const NotificationManager = {
    apiBaseUrl: typeof API_BASE_URL !== 'undefined' ? API_BASE_URL : 'http://192.168.1.9:8000',
    
    async fetchDropdownNotifications() {
        try {
            const response = await fetch(`${this.apiBaseUrl}/api/notifications/dropdown`, {
                method: 'GET',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            if (!response.ok) throw new Error('Failed to fetch notifications');
            
            const data = await response.json();
            this.renderDropdownNotifications(data);
        } catch (error) {
            console.error('Error fetching notifications:', error);
            this.renderFallbackNotifications();
        }
    },
    
    renderDropdownNotifications(data) {
        const badge = document.getElementById('notificationBadge');
        const countPill = document.getElementById('notificationCount');
        const list = document.getElementById('notificationList');
        
        // Update badge
        if (data.unread_count > 0) {
            badge.style.display = 'block';
            countPill.textContent = `${data.unread_count} new`;
        } else {
            badge.style.display = 'none';
            countPill.textContent = '0 new';
        }
        
        // Render notifications
        if (data.notifications && data.notifications.length > 0) {
            list.innerHTML = data.notifications.map(n => this.createNotificationItem(n)).join('');
        } else {
            list.innerHTML = '<div class="notification-empty"><p>No notifications</p></div>';
        }
    },
    
    renderFallbackNotifications() {
        // Show static fallback notifications when API is unavailable
        const list = document.getElementById('notificationList');
        list.innerHTML = `
            <div class="notification-item" data-id="1">
                <div class="notification-icon info">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="notification-content">
                    <p class="notification-text">Your attendance for Physics dropped below 85%</p>
                    <span class="notification-time">2h ago</span>
                </div>
            </div>
            <div class="notification-item" data-id="2">
                <div class="notification-icon success">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="notification-content">
                    <p class="notification-text">Attendance marked for Mathematics</p>
                    <span class="notification-time">Today, 8:05 AM</span>
                </div>
            </div>
            <div class="notification-item" data-id="3">
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
        `;
        document.getElementById('notificationBadge').style.display = 'block';
        document.getElementById('notificationCount').textContent = '3 new';
    },
    
    createNotificationItem(notification) {
        const iconSvg = this.getIconSvg(notification.type);
        return `
            <div class="notification-item ${notification.read ? 'read' : ''}" data-id="${notification.id}">
                <div class="notification-icon ${notification.type}">
                    ${iconSvg}
                </div>
                <div class="notification-content">
                    <p class="notification-text">${notification.message}</p>
                    <span class="notification-time">${notification.time}</span>
                </div>
            </div>
        `;
    },
    
    getIconSvg(type) {
        const icons = {
            info: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            success: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            warning: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
            danger: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
        };
        return icons[type] || icons.info;
    },
    
    async markAsRead(id) {
        try {
            await fetch(`${this.apiBaseUrl}/api/notifications/${id}/read`, {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            this.fetchDropdownNotifications();
        } catch (error) {
            console.error('Error marking notification as read:', error);
        }
    },
    
    async markAllAsRead() {
        try {
            await fetch(`${this.apiBaseUrl}/api/notifications/read-all`, {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            this.fetchDropdownNotifications();
        } catch (error) {
            console.error('Error marking all notifications as read:', error);
        }
    },
    
    init() {
        // Fetch notifications on load
        this.fetchDropdownNotifications();
        
        // Mark all as read button
        const markAllBtn = document.getElementById('markAllReadBtn');
        if (markAllBtn) {
            markAllBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.markAllAsRead();
            });
        }
        
        // Refresh notifications every 30 seconds
        setInterval(() => this.fetchDropdownNotifications(), 30000);
    }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    NotificationManager.init();
});
</script>

<style>
/* Additional styles for navbar notification dropdown */
.notification-list-dropdown {
    max-height: 300px;
    overflow-y: auto;
}

.notification-loading,
.notification-empty {
    padding: 20px;
    text-align: center;
    color: var(--text-secondary);
}

.notification-item.read {
    opacity: 0.6;
}

.dropdown-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 12px;
    border-top: 1px solid var(--border-color);
    margin-top: 8px;
}

.view-all-link {
    font-size: 13px;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
}

.view-all-link:hover {
    text-decoration: underline;
}

.mark-all-read-btn {
    font-size: 12px;
    color: var(--text-secondary);
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 4px;
    transition: var(--transition);
}

.mark-all-read-btn:hover {
    background: var(--bg-color);
    color: var(--text-primary);
}
</style>