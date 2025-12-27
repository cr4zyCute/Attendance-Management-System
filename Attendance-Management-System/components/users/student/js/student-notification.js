/**
 * Student Notification Page JavaScript
 * Static UI version - no backend required
 */

const NotificationPage = {
    currentFilter: 'all',
    selectedId: null,
    
    // Static notification data for UI
    notifications: [
        {
            id: 1,
            type: 'info',
            title: 'Attendance Alert',
            message: 'Your attendance for Physics dropped below 85%. Please ensure regular attendance to maintain your academic standing.',
            time: '2 hours ago',
            read: false
        },
        {
            id: 2,
            type: 'success',
            title: 'Attendance Marked',
            message: 'Your attendance has been successfully marked for Mathematics class.',
            time: 'Today, 8:05 AM',
            read: true
        },
        {
            id: 3,
            type: 'warning',
            title: 'Attendance Reminder',
            message: 'Your English class attendance is at 78%. Consider attending more classes to improve your attendance percentage.',
            time: 'Yesterday',
            read: false
        },
        {
            id: 4,
            type: 'success',
            title: 'Course Enrolled',
            message: 'You have been successfully enrolled in Computer Science 301. Check your schedule for class timings.',
            time: '2 days ago',
            read: true
        },
        {
            id: 5,
            type: 'info',
            title: 'Schedule Update',
            message: 'Your Chemistry class has been rescheduled to 2:00 PM on Wednesdays. Please update your calendar accordingly.',
            time: '3 days ago',
            read: false
        }
    ],

    init() {
        this.bindEvents();
        this.renderNotifications();
        this.updateCount();
        
        // Auto-select first notification on desktop only
        if (!this.isMobile() && this.notifications.length > 0) {
            this.selectNotification(this.notifications[0].id);
        }
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
                    this.setFilter(item.dataset.filter);
                    filterMenu.classList.remove('show');
                });
            });
        }

        // Back button for mobile
        const backBtn = document.getElementById('backBtn');
        if (backBtn) {
            backBtn.addEventListener('click', () => this.goBack());
        }

        // Preview panel buttons
        const deleteBtn = document.getElementById('deleteBtn');
        if (deleteBtn) {
            deleteBtn.addEventListener('click', () => {
                if (this.selectedId) this.deleteNotification(this.selectedId);
            });
        }

        const markReadBtn = document.getElementById('markReadBtn');
        if (markReadBtn) {
            markReadBtn.addEventListener('click', () => {
                if (this.selectedId) this.markAsRead(this.selectedId);
            });
        }

        // Handle browser back button on mobile
        window.addEventListener('popstate', (e) => {
            if (this.isMobile() && document.querySelector('.notifications-container.preview-active')) {
                this.goBack();
            }
        });
    },

    isMobile() {
        return window.innerWidth <= 768;
    },

    goBack() {
        const container = document.querySelector('.notifications-container');
        if (container) {
            container.classList.remove('preview-active');
        }
        this.selectedId = null;
        
        // Update list selection
        document.querySelectorAll('.notification-list-item').forEach(item => {
            item.classList.remove('selected');
        });
    },

    renderNotifications() {
        const list = document.getElementById('notificationsListPage');
        if (!list) return;

        let filtered = this.notifications;

        // Apply filter
        if (this.currentFilter !== 'all') {
            if (this.currentFilter === 'unread') {
                filtered = this.notifications.filter(n => !n.read);
            } else {
                filtered = this.notifications.filter(n => n.type === this.currentFilter);
            }
        }

        if (filtered.length === 0) {
            list.innerHTML = `
                <div class="empty-list">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a2 2 0 11-4 0m4 0H9"></path>
                    </svg>
                    <p>No notifications found</p>
                </div>
            `;
            return;
        }

        list.innerHTML = filtered.map(n => this.createListItem(n)).join('');

        // Bind click events
        list.querySelectorAll('.notification-list-item').forEach(item => {
            item.addEventListener('click', () => {
                const id = parseInt(item.dataset.id);
                this.selectNotification(id);
            });
        });
    },

    createListItem(notification) {
        const isSelected = this.selectedId === notification.id;
        return `
            <div class="notification-list-item ${notification.read ? 'read' : 'unread'} ${isSelected ? 'selected' : ''}" data-id="${notification.id}">
                <div class="item-indicator ${notification.type}"></div>
                <div class="item-content">
                    <div class="item-header">
                        <span class="item-title">${notification.title}</span>
                        <span class="item-time">${notification.time}</span>
                    </div>
                    <p class="item-preview">${notification.message.substring(0, 60)}...</p>
                </div>
            </div>
        `;
    },

    selectNotification(id) {
        this.selectedId = id;
        const notification = this.notifications.find(n => n.id === id);
        
        if (!notification) return;

        // Update list selection
        document.querySelectorAll('.notification-list-item').forEach(item => {
            item.classList.toggle('selected', parseInt(item.dataset.id) === id);
        });

        // Show preview panel on mobile
        if (this.isMobile()) {
            const container = document.querySelector('.notifications-container');
            if (container) {
                container.classList.add('preview-active');
                // Add history state for back button
                history.pushState({ preview: true }, '');
            }
        }

        // Update preview content
        document.getElementById('previewIcon').innerHTML = this.getIconSvg(notification.type);
        document.getElementById('previewIcon').className = `preview-icon ${notification.type}`;
        document.getElementById('previewType').textContent = notification.type.charAt(0).toUpperCase() + notification.type.slice(1);
        document.getElementById('previewTime').textContent = notification.time;
        document.getElementById('previewTitle').textContent = notification.title;
        document.getElementById('previewMessage').textContent = notification.message;

        // Update mark as read button and footer
        const previewFooter = document.getElementById('previewFooter');
        const markReadBtn = document.getElementById('markReadBtn');
        if (previewFooter && markReadBtn) {
            previewFooter.style.display = notification.read ? 'none' : 'block';
        }

        // Mark as read when selected
        if (!notification.read) {
            notification.read = true;
            this.renderNotifications();
            this.updateCount();
        }
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
        
        document.querySelectorAll('.filter-item').forEach(item => {
            item.classList.toggle('active', item.dataset.filter === filter);
        });

        this.renderNotifications();
    },

    updateCount() {
        const countEl = document.getElementById('totalCount');
        const unreadCount = this.notifications.filter(n => !n.read).length;
        const total = this.notifications.length;
        if (countEl) {
            countEl.textContent = unreadCount > 0 ? `${unreadCount} unread` : `${total} notifications`;
        }
    },

    markAsRead(id) {
        const notification = this.notifications.find(n => n.id === id);
        if (notification) {
            notification.read = true;
            this.renderNotifications();
            this.updateCount();
            
            // Hide mark as read button
            const previewFooter = document.getElementById('previewFooter');
            if (previewFooter) previewFooter.style.display = 'none';
        }
    },

    markAllAsRead() {
        this.notifications.forEach(n => n.read = true);
        this.renderNotifications();
        this.updateCount();
        
        // Hide mark as read button if preview is open
        const previewFooter = document.getElementById('previewFooter');
        if (previewFooter) previewFooter.style.display = 'none';
    },

    deleteNotification(id) {
        this.notifications = this.notifications.filter(n => n.id !== id);
        
        // Go back to list on mobile after delete
        if (this.isMobile()) {
            this.goBack();
        } else {
            // Reset preview on desktop
            this.selectedId = null;
            document.getElementById('previewTitle').textContent = 'Select a notification';
            document.getElementById('previewMessage').textContent = 'Choose a notification from the list to view its details.';
            document.getElementById('previewFooter').style.display = 'none';
        }
        
        this.renderNotifications();
        this.updateCount();
    }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    NotificationPage.init();
});