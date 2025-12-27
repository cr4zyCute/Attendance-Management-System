/**
 * Student Notification Page JavaScript
 */

const NotificationPage = {
    apiBaseUrl: typeof API_BASE_URL !== 'undefined' ? API_BASE_URL : 'http://192.168.1.9:8000',
    currentPage: 1,
    totalPages: 1,
    currentFilter: 'all',
    notifications: [],

    async init() {
        this.bindEvents();
        await this.fetchNotifications();
    },

    bindEvents() {
        // Mark all as read button
        const markAllBtn = document.getElementById('markAllReadPageBtn');
        if (markAllBtn) {
            markAllBtn.addEventListener('click', () => this.markAllAsRead());
        }

        // Filter dropdown
        const filterBtn = document.getElementById('filterBtn');
        const filterMenu = document.getElementById('filterMenu');
        
        if (filterBtn && filterMenu) {
            filterBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                filterMenu.classList.toggle('show');
            });

            document.addEventListener('click', () => {
                filterMenu.classList.remove('show');
            });

            filterMenu.querySelectorAll('.filter-item').forEach(item => {
                item.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const filter = item.dataset.filter;
                    this.setFilter(filter);
                    filterMenu.classList.remove('show');
                });
            });
        }

        // Pagination
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        if (prevBtn) {
            prevBtn.addEventListener('click', () => this.goToPage(this.currentPage - 1));
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', () => this.goToPage(this.currentPage + 1));
        }
    },

    async fetchNotifications() {
        this.showLoading();

        try {
            const response = await fetch(`${this.apiBaseUrl}/api/notifications?page=${this.currentPage}`, {
                method: 'GET',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) throw new Error('Failed to fetch notifications');

            const result = await response.json();
            this.notifications = result.data.data || [];
            this.currentPage = result.data.current_page || 1;
            this.totalPages = result.data.last_page || 1;
            
            this.renderNotifications();
            this.updatePagination();
            this.updateCount(result.data.total || 0);
        } catch (error) {
            console.error('Error fetching notifications:', error);
            this.renderFallbackNotifications();
        }
    },

    showLoading() {
        const list = document.getElementById('notificationsListPage');
        const emptyState = document.getElementById('emptyState');
        const pagination = document.getElementById('pagination');

        if (list) {
            list.innerHTML = `
                <div class="loading-state">
                    <div class="spinner"></div>
                    <p>Loading notifications...</p>
                </div>
            `;
        }
        if (emptyState) emptyState.style.display = 'none';
        if (pagination) pagination.style.display = 'none';
    },

    renderNotifications() {
        const list = document.getElementById('notificationsListPage');
        const emptyState = document.getElementById('emptyState');
        const pagination = document.getElementById('pagination');

        if (!list) return;

        let filteredNotifications = this.notifications;

        // Apply filter
        if (this.currentFilter !== 'all') {
            if (this.currentFilter === 'unread') {
                filteredNotifications = this.notifications.filter(n => !n.read_at);
            } else {
                filteredNotifications = this.notifications.filter(n => n.type === this.currentFilter);
            }
        }

        if (filteredNotifications.length === 0) {
            list.innerHTML = '';
            if (emptyState) emptyState.style.display = 'flex';
            if (pagination) pagination.style.display = 'none';
            return;
        }

        if (emptyState) emptyState.style.display = 'none';
        if (pagination) pagination.style.display = 'flex';

        list.innerHTML = filteredNotifications.map(n => this.createNotificationItem(n)).join('');

        // Bind click events for notification items
        list.querySelectorAll('.notification-item-full').forEach(item => {
            const id = item.dataset.id;
            
            item.addEventListener('click', () => this.markAsRead(id));

            const deleteBtn = item.querySelector('.action-btn.delete');
            if (deleteBtn) {
                deleteBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.deleteNotification(id);
                });
            }
        });
    },

    renderFallbackNotifications() {
        const list = document.getElementById('notificationsListPage');
        const emptyState = document.getElementById('emptyState');
        const pagination = document.getElementById('pagination');

        if (!list) return;

        // Show fallback static notifications
        const fallbackNotifications = [
            {
                id: 1,
                type: 'info',
                title: 'Attendance Alert',
                message: 'Your attendance for Physics dropped below 85%. Please ensure regular attendance to maintain your academic standing.',
                created_at: '2 hours ago',
                read_at: null
            },
            {
                id: 2,
                type: 'success',
                title: 'Attendance Marked',
                message: 'Your attendance has been successfully marked for Mathematics class.',
                created_at: 'Today, 8:05 AM',
                read_at: '2025-12-26'
            },
            {
                id: 3,
                type: 'warning',
                title: 'Attendance Reminder',
                message: 'Your English class attendance is at 78%. Consider attending more classes to improve your attendance percentage.',
                created_at: 'Yesterday',
                read_at: null
            }
        ];

        this.notifications = fallbackNotifications;
        
        list.innerHTML = fallbackNotifications.map(n => this.createNotificationItem(n)).join('');
        
        if (emptyState) emptyState.style.display = 'none';
        if (pagination) pagination.style.display = 'none';
        
        this.updateCount(fallbackNotifications.length);
    },

    createNotificationItem(notification) {
        const isUnread = !notification.read_at;
        const iconSvg = this.getIconSvg(notification.type);
        const timeDisplay = notification.created_at;

        return `
            <div class="notification-item-full ${isUnread ? 'unread' : ''}" data-id="${notification.id}">
                <div class="notification-icon-large ${notification.type}">
                    ${iconSvg}
                </div>
                <div class="notification-body">
                    <h4 class="notification-title">${notification.title}</h4>
                    <p class="notification-message">${notification.message}</p>
                    <div class="notification-meta">
                        <span class="notification-time">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            ${timeDisplay}
                        </span>
                    </div>
                </div>
                <div class="notification-actions">
                    <button class="action-btn delete" title="Delete">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                        </svg>
                    </button>
                </div>
            </div>
        `;
    },

    getIconSvg(type) {
        const icons = {
            info: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            success: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            warning: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
            danger: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
        };
        return icons[type] || icons.info;
    },

    setFilter(filter) {
        this.currentFilter = filter;
        
        // Update active state
        document.querySelectorAll('.filter-item').forEach(item => {
            item.classList.toggle('active', item.dataset.filter === filter);
        });

        this.renderNotifications();
    },

    updatePagination() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const paginationInfo = document.getElementById('paginationInfo');

        if (prevBtn) prevBtn.disabled = this.currentPage <= 1;
        if (nextBtn) nextBtn.disabled = this.currentPage >= this.totalPages;
        if (paginationInfo) paginationInfo.textContent = `Page ${this.currentPage} of ${this.totalPages}`;
    },

    updateCount(total) {
        const countEl = document.getElementById('totalCount');
        if (countEl) {
            countEl.textContent = `${total} notification${total !== 1 ? 's' : ''}`;
        }
    },

    goToPage(page) {
        if (page < 1 || page > this.totalPages) return;
        this.currentPage = page;
        this.fetchNotifications();
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

            // Update local state
            const notification = this.notifications.find(n => n.id == id);
            if (notification) {
                notification.read_at = new Date().toISOString();
            }
            this.renderNotifications();
            
            // Update navbar notification count
            if (typeof NotificationManager !== 'undefined') {
                NotificationManager.fetchDropdownNotifications();
            }
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

            // Update local state
            this.notifications.forEach(n => {
                n.read_at = new Date().toISOString();
            });
            this.renderNotifications();
            
            // Update navbar notification count
            if (typeof NotificationManager !== 'undefined') {
                NotificationManager.fetchDropdownNotifications();
            }
        } catch (error) {
            console.error('Error marking all notifications as read:', error);
        }
    },

    async deleteNotification(id) {
        if (!confirm('Are you sure you want to delete this notification?')) return;

        try {
            await fetch(`${this.apiBaseUrl}/api/notifications/${id}`, {
                method: 'DELETE',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            // Remove from local state
            this.notifications = this.notifications.filter(n => n.id != id);
            this.renderNotifications();
            
            // Update navbar notification count
            if (typeof NotificationManager !== 'undefined') {
                NotificationManager.fetchDropdownNotifications();
            }
        } catch (error) {
            console.error('Error deleting notification:', error);
        }
    }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    NotificationPage.init();
});