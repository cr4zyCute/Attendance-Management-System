// Student Dashboard JavaScript

// Laravel backend API URL - adjust based on your setup
const API_BASE_URL = 'http://localhost:8000';

// Logout function
async function logout(e) {
    e.preventDefault();
    
    try {
        const response = await fetch(`${API_BASE_URL}/logout`, {
            method: 'POST',
            credentials: 'include',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        // Redirect to login page
        window.location.href = '../../../../components/login.php';
    } catch (error) {
        console.error('Logout error:', error);
        // Still redirect to login on error
        window.location.href = '../../../../components/login.php';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebarClose = document.querySelector('.sidebar-close');

    // Toggle sidebar on mobile
    function toggleSidebar() {
        sidebar.classList.toggle('active');
        sidebarOverlay.classList.toggle('active');
        document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
    }

    // Open sidebar
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleSidebar);
    }

    // Close sidebar
    if (sidebarClose) {
        sidebarClose.addEventListener('click', toggleSidebar);
    }

    // Close sidebar when clicking overlay
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', toggleSidebar);
    }

    // Close sidebar on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && sidebar.classList.contains('active')) {
            toggleSidebar();
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    // Active nav item handling
    const navItems = document.querySelectorAll('.nav-item:not(.logout)');
    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            navItems.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
            
            // Close sidebar on mobile after navigation
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        });
    });

    // Filter Dropdown Functionality
    initFilterDropdowns();
    initNotificationDropdown();
});

// Initialize Filter Dropdowns
function initFilterDropdowns() {
    const datePickerBtn = document.getElementById('datePickerBtn');
    const filterBtn = document.getElementById('filterBtn');
    const dateDropdown = document.getElementById('dateDropdown');
    const filterDropdown = document.getElementById('filterDropdown');

    // Toggle date dropdown
    if (datePickerBtn && dateDropdown) {
        datePickerBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            closeAllDropdowns();
            dateDropdown.classList.toggle('show');
            datePickerBtn.classList.toggle('active', dateDropdown.classList.contains('show'));
            if (dateDropdown.classList.contains('show')) {
                showDropdownOverlay();
            }
        });
    }

    // Toggle filter dropdown
    if (filterBtn && filterDropdown) {
        filterBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            closeAllDropdowns();
            filterDropdown.classList.toggle('show');
            filterBtn.classList.toggle('active', filterDropdown.classList.contains('show'));
            if (filterDropdown.classList.contains('show')) {
                showDropdownOverlay();
            }
        });
    }

    // Handle filter tabs
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.stopPropagation();
            const tabName = this.dataset.tab;
            
            // Update active tab
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Show corresponding content
            document.querySelectorAll('.filter-tab-content').forEach(content => {
                content.classList.remove('active');
            });
            const targetContent = document.getElementById('tab-' + tabName);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });

    // Handle dropdown item clicks
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = this.closest('.dropdown-menu');
            const tabContent = this.closest('.filter-tab-content');
            const filterType = this.dataset.filter;
            
            // If it's inside a tab content
            if (tabContent) {
                tabContent.querySelectorAll('.dropdown-item').forEach(i => i.classList.remove('active'));
            } else {
                dropdown.querySelectorAll('.dropdown-item').forEach(i => i.classList.remove('active'));
            }
            
            this.classList.add('active');
            
            // Apply filter logic here
            const value = this.dataset.value;
            console.log('Filter applied:', filterType || 'date', '=', value);
            
            // Close dropdown after selection for date dropdown only
            if (!tabContent) {
                closeAllDropdowns();
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.filter-icon-btn')) {
            closeAllDropdowns();
        }
    });

    // Close dropdowns when clicking overlay
    const dropdownOverlay = document.querySelector('.dropdown-overlay');
    if (dropdownOverlay) {
        dropdownOverlay.addEventListener('click', function() {
            closeAllDropdowns();
        });
    }

    // Close dropdowns on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAllDropdowns();
        }
    });
}

// Close all dropdowns
function closeAllDropdowns() {
    document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
        dropdown.classList.remove('show');
    });
    document.querySelectorAll('.filter-icon-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    // Hide dropdown overlay on mobile
    const dropdownOverlay = document.querySelector('.dropdown-overlay');
    if (dropdownOverlay) {
        dropdownOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// Show dropdown overlay on mobile
function showDropdownOverlay() {
    if (window.innerWidth <= 576) {
        const dropdownOverlay = document.querySelector('.dropdown-overlay');
        if (dropdownOverlay) {
            dropdownOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
}

// Notification bell dropdown
function initNotificationDropdown() {
    const bellBtn = document.querySelector('.notification-btn');
    const dropdown = document.querySelector('.notification-dropdown');

    if (!bellBtn || !dropdown) return;

    function closeDropdown() {
        dropdown.classList.remove('show');
        bellBtn.classList.remove('active');
    }

    bellBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        const willShow = !dropdown.classList.contains('show');
        closeDropdown();
        closeAllDropdowns();
        if (willShow) {
            dropdown.classList.add('show');
            bellBtn.classList.add('active');
        }
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.notification-wrapper')) {
            closeDropdown();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDropdown();
        }
    });
}
