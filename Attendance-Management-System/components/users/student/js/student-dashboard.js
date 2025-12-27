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
    initBarChartAnimation();
    initDateSlider();
});

// Animate bar chart on load
function initBarChartAnimation() {
    const bars = document.querySelectorAll('.bar-chart .bar');
    if (!bars.length) return;

    // Initially set bars to 0 height
    bars.forEach(bar => {
        const targetHeight = bar.style.getPropertyValue('--bar-height');
        bar.style.setProperty('--bar-height', '0%');
        bar.dataset.targetHeight = targetHeight;
    });

    // Animate after a short delay
    setTimeout(() => {
        bars.forEach((bar, index) => {
            setTimeout(() => {
                bar.style.setProperty('--bar-height', bar.dataset.targetHeight);
            }, index * 100);
        });
    }, 200);

    // Show values on hover
    const barItems = document.querySelectorAll('.bar-item');
    barItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            const value = item.querySelector('.bar-value');
            if (value) value.style.opacity = '1';
        });
        item.addEventListener('mouseleave', () => {
            const value = item.querySelector('.bar-value');
            if (value) value.style.opacity = '0';
        });
    });
}

// Date Slider for Schedule
function initDateSlider() {
    const track = document.getElementById('dateSliderTrack');
    const slider = document.getElementById('dateSlider');
    const scheduleList = document.getElementById('scheduleList');
    const noSchedule = document.getElementById('noSchedule');
    const monthLabel = document.getElementById('currentMonth');
    const monthPickerBtn = document.getElementById('monthPickerBtn');
    const calendarDropdown = document.getElementById('calendarDropdown');
    const calMonthYear = document.getElementById('calMonthYear');
    const calendarDays = document.getElementById('calendarDays');
    const calPrevMonth = document.getElementById('calPrevMonth');
    const calNextMonth = document.getElementById('calNextMonth');
    const calTodayBtn = document.getElementById('calTodayBtn');

    if (!track || !slider) return;

    const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    const today = new Date();
    let selectedDate = new Date(today);
    let calendarDate = new Date(today);
    let currentOffset = 0;
    let isDragging = false;
    let startX = 0;
    let scrollLeft = 0;

    // Generate schedule data for any date based on day of week
    function getScheduleForDate(date) {
        const dayOfWeek = date.getDay();
        const isPast = date < new Date(today.getFullYear(), today.getMonth(), today.getDate());
        const isToday = formatDate(date) === formatDate(today);
        
        const schedules = {
            0: [],
            1: [
                { time: '08:00', period: 'AM', subject: 'Mathematics', room: 'Room 101' },
                { time: '10:00', period: 'AM', subject: 'Physics', room: 'Room 203' },
                { time: '01:00', period: 'PM', subject: 'Computer Science', room: 'Lab 3' },
                { time: '03:00', period: 'PM', subject: 'English', room: 'Room 105' }
            ],
            2: [
                { time: '09:00', period: 'AM', subject: 'Chemistry', room: 'Lab 1' },
                { time: '11:00', period: 'AM', subject: 'History', room: 'Room 302' },
                { time: '02:00', period: 'PM', subject: 'Biology', room: 'Lab 2' }
            ],
            3: [
                { time: '08:00', period: 'AM', subject: 'Mathematics', room: 'Room 101' },
                { time: '10:00', period: 'AM', subject: 'Physics', room: 'Room 203' },
                { time: '01:00', period: 'PM', subject: 'English', room: 'Room 105' }
            ],
            4: [
                { time: '09:00', period: 'AM', subject: 'Computer Science', room: 'Lab 3' },
                { time: '11:00', period: 'AM', subject: 'Chemistry', room: 'Lab 1' },
                { time: '02:00', period: 'PM', subject: 'History', room: 'Room 302' }
            ],
            5: [
                { time: '08:00', period: 'AM', subject: 'Biology', room: 'Lab 2' },
                { time: '10:00', period: 'AM', subject: 'Mathematics', room: 'Room 101' },
                { time: '01:00', period: 'PM', subject: 'Physics', room: 'Room 203' }
            ],
            6: []
        };

        const daySchedule = schedules[dayOfWeek] || [];
        
        return daySchedule.map((item) => {
            let status = 'upcoming';
            if (isPast) {
                const rand = Math.random();
                if (rand > 0.85) status = 'absent';
                else if (rand > 0.75) status = 'late';
                else status = 'present';
            } else if (isToday) {
                const currentHour = today.getHours();
                const classHour = parseInt(item.time.split(':')[0]) + (item.period === 'PM' && item.time !== '12:00' ? 12 : 0);
                if (currentHour > classHour) {
                    status = Math.random() > 0.1 ? 'present' : 'late';
                }
            }
            return { ...item, status };
        });
    }

    function generateDates() {
        track.innerHTML = '';
        
        for (let i = -7; i <= 7; i++) {
            const date = new Date(selectedDate);
            date.setDate(selectedDate.getDate() + i);
            
            const dateItem = document.createElement('div');
            dateItem.className = 'date-item';
            dateItem.dataset.date = formatDate(date);
            dateItem.dataset.month = monthNames[date.getMonth()];
            
            const isToday = formatDate(date) === formatDate(today);
            const isSelected = i === 0;
            
            if (isToday) dateItem.classList.add('today');
            if (isSelected) dateItem.classList.add('active');
            
            dateItem.innerHTML = `
                <span class="day-name">${dayNames[date.getDay()]}</span>
                <span class="day-num">${date.getDate()}</span>
            `;
            
            dateItem.addEventListener('click', (e) => {
                if (!isDragging) selectDateFromSlider(dateItem);
            });
            track.appendChild(dateItem);
        }
        
        centerSlider();
        updateSchedule(formatDate(selectedDate));
        updateMonthLabel();
    }

    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    function parseDate(dateStr) {
        const [year, month, day] = dateStr.split('-').map(Number);
        return new Date(year, month - 1, day);
    }

    function selectDateFromSlider(dateItem) {
        selectedDate = parseDate(dateItem.dataset.date);
        generateDates();
    }

    function selectDateFromCalendar(date) {
        selectedDate = new Date(date);
        generateDates();
        closeCalendar();
    }

    function updateMonthLabel() {
        if (monthLabel) {
            monthLabel.textContent = monthNames[selectedDate.getMonth()];
        }
    }

    function updateSchedule(dateStr) {
        const date = parseDate(dateStr);
        const schedule = getScheduleForDate(date);
        
        if (schedule.length === 0) {
            scheduleList.style.display = 'none';
            noSchedule.style.display = 'flex';
        } else {
            scheduleList.style.display = 'flex';
            noSchedule.style.display = 'none';
            
            scheduleList.innerHTML = schedule.map(item => `
                <div class="schedule-item">
                    <div class="schedule-time">
                        <span class="time">${item.time}</span>
                        <span class="period">${item.period}</span>
                    </div>
                    <div class="schedule-details">
                        <span class="subject">${item.subject}</span>
                        <span class="room">${item.room}</span>
                    </div>
                    <span class="schedule-status ${item.status}">${item.status.charAt(0).toUpperCase() + item.status.slice(1)}</span>
                </div>
            `).join('');
        }
    }

    function getItemWidth() {
        return window.innerWidth <= 576 ? 37 : 46;
    }

    function getMaxOffset() {
        const itemWidth = getItemWidth();
        return Math.max(0, (track.children.length * itemWidth) - slider.offsetWidth);
    }

    function centerSlider() {
        const itemWidth = getItemWidth();
        const centerIndex = 7; // Center item (index 7 out of 0-14)
        const offset = (centerIndex * itemWidth) - (slider.offsetWidth / 2) + (itemWidth / 2);
        currentOffset = Math.max(0, Math.min(offset, getMaxOffset()));
        track.style.transform = `translateX(-${currentOffset}px)`;
    }

    // Calendar functions
    function renderCalendar() {
        const year = calendarDate.getFullYear();
        const month = calendarDate.getMonth();
        
        calMonthYear.textContent = `${monthNames[month]} ${year}`;
        
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const daysInPrevMonth = new Date(year, month, 0).getDate();
        
        calendarDays.innerHTML = '';
        
        // Previous month days
        for (let i = firstDay - 1; i >= 0; i--) {
            const day = daysInPrevMonth - i;
            const btn = createCalendarDay(day, year, month - 1, true);
            calendarDays.appendChild(btn);
        }
        
        // Current month days
        for (let day = 1; day <= daysInMonth; day++) {
            const btn = createCalendarDay(day, year, month, false);
            calendarDays.appendChild(btn);
        }
        
        // Next month days
        const totalCells = firstDay + daysInMonth;
        const remainingCells = totalCells <= 35 ? 35 - totalCells : 42 - totalCells;
        for (let day = 1; day <= remainingCells; day++) {
            const btn = createCalendarDay(day, year, month + 1, true);
            calendarDays.appendChild(btn);
        }
    }

    function createCalendarDay(day, year, month, isOtherMonth) {
        const btn = document.createElement('button');
        btn.className = 'cal-day';
        btn.textContent = day;
        
        const date = new Date(year, month, day);
        const dateStr = formatDate(date);
        
        if (isOtherMonth) btn.classList.add('other-month');
        if (dateStr === formatDate(today)) btn.classList.add('today');
        if (dateStr === formatDate(selectedDate)) btn.classList.add('selected');
        
        btn.addEventListener('click', () => selectDateFromCalendar(date));
        return btn;
    }

    function openCalendar() {
        calendarDate = new Date(selectedDate);
        renderCalendar();
        calendarDropdown.classList.add('show');
    }

    function closeCalendar() {
        calendarDropdown.classList.remove('show');
    }

    function toggleCalendar() {
        if (calendarDropdown.classList.contains('show')) {
            closeCalendar();
        } else {
            openCalendar();
        }
    }

    // Calendar event listeners
    if (monthPickerBtn) {
        monthPickerBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleCalendar();
        });
    }

    if (calPrevMonth) {
        calPrevMonth.addEventListener('click', (e) => {
            e.stopPropagation();
            calendarDate.setMonth(calendarDate.getMonth() - 1);
            renderCalendar();
        });
    }

    if (calNextMonth) {
        calNextMonth.addEventListener('click', (e) => {
            e.stopPropagation();
            calendarDate.setMonth(calendarDate.getMonth() + 1);
            renderCalendar();
        });
    }

    if (calTodayBtn) {
        calTodayBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            selectDateFromCalendar(today);
        });
    }

    // Close calendar when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.date-slider-compact')) {
            closeCalendar();
        }
    });

    // Mouse drag support
    slider.addEventListener('mousedown', (e) => {
        isDragging = true;
        slider.classList.add('dragging');
        startX = e.pageX;
        scrollLeft = currentOffset;
        track.style.transition = 'none';
    });

    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX;
        const walk = startX - x;
        currentOffset = Math.max(0, Math.min(scrollLeft + walk, getMaxOffset()));
        track.style.transform = `translateX(-${currentOffset}px)`;
    });

    document.addEventListener('mouseup', () => {
        if (isDragging) {
            isDragging = false;
            slider.classList.remove('dragging');
            track.style.transition = 'transform 0.3s ease';
        }
    });

    // Touch drag support
    let touchStartX = 0;
    let touchScrollLeft = 0;

    slider.addEventListener('touchstart', (e) => {
        isDragging = true;
        touchStartX = e.touches[0].pageX;
        touchScrollLeft = currentOffset;
        track.style.transition = 'none';
    }, { passive: true });

    slider.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const x = e.touches[0].pageX;
        const walk = touchStartX - x;
        currentOffset = Math.max(0, Math.min(touchScrollLeft + walk, getMaxOffset()));
        track.style.transform = `translateX(-${currentOffset}px)`;
    }, { passive: true });

    slider.addEventListener('touchend', () => {
        isDragging = false;
        track.style.transition = 'transform 0.3s ease';
    }, { passive: true });

    generateDates();
    window.addEventListener('resize', centerSlider);
}

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

// Course Filter Dropdown (for courses page)
function initCourseFilterDropdown() {
    const filterBtn = document.querySelector('.courses-content #filterBtn');
    const filterDropdown = document.querySelector('.courses-content #filterDropdown');

    if (!filterBtn || !filterDropdown) return;

    // Toggle dropdown
    filterBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        closeAllDropdowns();
        filterDropdown.classList.toggle('show');
        filterBtn.classList.toggle('active', filterDropdown.classList.contains('show'));
    });

    // Handle option selection
    filterDropdown.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.stopPropagation();
            const filter = this.dataset.filter;

            // Update active state
            filterDropdown.querySelectorAll('.dropdown-item').forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');

            // Close dropdown
            filterDropdown.classList.remove('show');
            filterBtn.classList.remove('active');

            // Filter courses
            filterCourses(filter);
        });
    });
}

// Filter courses based on selection
function filterCourses(filter) {
    const courseCards = document.querySelectorAll('.course-card');

    courseCards.forEach(card => {
        if (filter === 'all') {
            card.style.display = '';
        } else if (filter === 'active') {
            card.style.display = card.classList.contains('completed') ? 'none' : '';
        } else if (filter === 'completed') {
            card.style.display = card.classList.contains('completed') ? '' : 'none';
        }
    });
}

// Initialize course filter on page load
document.addEventListener('DOMContentLoaded', function() {
    initCourseFilterDropdown();
    initCalendar();
    initCourseModal();
    initAddClassModal();
});

// Calendar functionality
function initCalendar() {
    const calendarDays = document.getElementById('calendarDays');
    const calendarMonthYear = document.getElementById('calendarMonthYear');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const todayBtn = document.getElementById('todayBtn');
    const clearBtn = document.getElementById('clearDate');

    if (!calendarDays) return;

    let currentDate = new Date();
    let selectedDate = null;

    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        // Update header
        calendarMonthYear.textContent = `${months[month]} ${year}`;

        // Get first day of month and total days
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const daysInPrevMonth = new Date(year, month, 0).getDate();

        // Clear previous days
        calendarDays.innerHTML = '';

        // Today's date for comparison
        const today = new Date();
        const todayStr = `${today.getFullYear()}-${today.getMonth()}-${today.getDate()}`;

        // Previous month days
        for (let i = firstDay - 1; i >= 0; i--) {
            const day = daysInPrevMonth - i;
            const btn = document.createElement('button');
            btn.className = 'calendar-day other-month';
            btn.textContent = day;
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                currentDate.setMonth(currentDate.getMonth() - 1);
                selectDate(year, month - 1, day);
            });
            calendarDays.appendChild(btn);
        }

        // Current month days
        for (let day = 1; day <= daysInMonth; day++) {
            const btn = document.createElement('button');
            btn.className = 'calendar-day';
            btn.textContent = day;

            const dateStr = `${year}-${month}-${day}`;
            
            // Check if today
            if (dateStr === todayStr) {
                btn.classList.add('today');
            }

            // Check if selected
            if (selectedDate && 
                selectedDate.getFullYear() === year && 
                selectedDate.getMonth() === month && 
                selectedDate.getDate() === day) {
                btn.classList.add('selected');
            }

            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                selectDate(year, month, day);
            });

            calendarDays.appendChild(btn);
        }

        // Next month days
        const totalCells = firstDay + daysInMonth;
        const remainingCells = totalCells <= 35 ? 35 - totalCells : 42 - totalCells;
        
        for (let day = 1; day <= remainingCells; day++) {
            const btn = document.createElement('button');
            btn.className = 'calendar-day other-month';
            btn.textContent = day;
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                currentDate.setMonth(currentDate.getMonth() + 1);
                selectDate(year, month + 1, day);
            });
            calendarDays.appendChild(btn);
        }
    }

    function selectDate(year, month, day) {
        selectedDate = new Date(year, month, day);
        currentDate = new Date(year, month, 1);
        renderCalendar();
        
        // Format date for display/filter
        const formattedDate = `${months[selectedDate.getMonth()]} ${day}, ${selectedDate.getFullYear()}`;
        console.log('Date selected:', formattedDate);
        
        // Apply date filter to attendance table
        filterAttendanceByDate(selectedDate);
        
        // Close dropdown
        closeAllDropdowns();
    }

    function filterAttendanceByDate(date) {
        // This would filter the attendance table by the selected date
        // For now, just log it - implement actual filtering based on your data structure
        const day = date.getDate();
        const month = months[date.getMonth()].substring(0, 3);
        
        const rows = document.querySelectorAll('.attendance-table tbody tr');
        rows.forEach(row => {
            const dateCell = row.querySelector('.date-cell');
            if (dateCell) {
                const rowDay = dateCell.querySelector('.date-day')?.textContent;
                const rowMonth = dateCell.querySelector('.date-month')?.textContent;
                
                if (rowDay === String(day) && rowMonth === month) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }

    // Navigation
    if (prevMonthBtn) {
        prevMonthBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });
    }

    if (nextMonthBtn) {
        nextMonthBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });
    }

    // Today button
    if (todayBtn) {
        todayBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const today = new Date();
            selectDate(today.getFullYear(), today.getMonth(), today.getDate());
        });
    }

    // Clear button
    if (clearBtn) {
        clearBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            selectedDate = null;
            currentDate = new Date();
            renderCalendar();
            
            // Show all rows
            const rows = document.querySelectorAll('.attendance-table tbody tr');
            rows.forEach(row => {
                row.style.display = '';
            });
            
            closeAllDropdowns();
        });
    }

    // Initial render
    renderCalendar();
}


// Course Modal functionality
function initCourseModal() {
    const modal = document.getElementById('courseModal');
    const closeBtn = document.getElementById('closeModal');
    const courseCards = document.querySelectorAll('.course-card');

    if (!modal) return;

    // Course data for modal (static data - would come from backend)
    const courseData = {
        'Mathematics': {
            code: 'MATH101',
            teacher: 'Mr. Johnson',
            schedule: 'Mon, Wed, Fri - 8:00 AM',
            attendance: '90%',
            status: 'Active',
            iconClass: 'math',
            iconBg: '#3b82f6',
            history: [
                { day: '21', month: 'Dec', time: '08:00 AM', status: 'present' },
                { day: '19', month: 'Dec', time: '08:00 AM', status: 'present' },
                { day: '17', month: 'Dec', time: '08:00 AM', status: 'late' },
                { day: '15', month: 'Dec', time: '08:00 AM', status: 'present' },
                { day: '13', month: 'Dec', time: '08:00 AM', status: 'absent' },
                { day: '11', month: 'Dec', time: '08:00 AM', status: 'present' }
            ]
        },
        'Physics': {
            code: 'PHY201',
            teacher: 'Dr. Smith',
            schedule: 'Tue, Thu - 10:00 AM',
            attendance: '85%',
            status: 'Active',
            iconClass: 'physics',
            iconBg: '#8b5cf6',
            history: [
                { day: '21', month: 'Dec', time: '10:00 AM', status: 'present' },
                { day: '19', month: 'Dec', time: '10:00 AM', status: 'present' },
                { day: '17', month: 'Dec', time: '10:00 AM', status: 'present' },
                { day: '14', month: 'Dec', time: '10:00 AM', status: 'absent' },
                { day: '12', month: 'Dec', time: '10:00 AM', status: 'late' }
            ]
        },
        'Computer Science': {
            code: 'CS301',
            teacher: 'Ms. Davis',
            schedule: 'Mon, Wed - 1:00 PM',
            attendance: '95%',
            status: 'Active',
            iconClass: 'cs',
            iconBg: '#84cc16',
            history: [
                { day: '20', month: 'Dec', time: '01:00 PM', status: 'present' },
                { day: '18', month: 'Dec', time: '01:00 PM', status: 'present' },
                { day: '16', month: 'Dec', time: '01:00 PM', status: 'present' },
                { day: '13', month: 'Dec', time: '01:00 PM', status: 'present' },
                { day: '11', month: 'Dec', time: '01:00 PM', status: 'late' }
            ]
        },
        'English': {
            code: 'ENG102',
            teacher: 'Mrs. Wilson',
            schedule: 'Tue, Thu - 3:00 PM',
            attendance: '78%',
            status: 'Active',
            iconClass: 'english',
            iconBg: '#f59e0b',
            history: [
                { day: '21', month: 'Dec', time: '03:00 PM', status: 'present' },
                { day: '19', month: 'Dec', time: '03:00 PM', status: 'absent' },
                { day: '17', month: 'Dec', time: '03:00 PM', status: 'present' },
                { day: '14', month: 'Dec', time: '03:00 PM', status: 'absent' },
                { day: '12', month: 'Dec', time: '03:00 PM', status: 'late' }
            ]
        },
        'Chemistry': {
            code: 'CHEM201',
            teacher: 'Dr. Brown',
            schedule: 'Wed, Fri - 9:00 AM',
            attendance: '82%',
            status: 'Active',
            iconClass: 'chemistry',
            iconBg: '#fb923c',
            history: [
                { day: '20', month: 'Dec', time: '09:00 AM', status: 'present' },
                { day: '18', month: 'Dec', time: '09:00 AM', status: 'present' },
                { day: '15', month: 'Dec', time: '09:00 AM', status: 'absent' },
                { day: '13', month: 'Dec', time: '09:00 AM', status: 'present' },
                { day: '11', month: 'Dec', time: '09:00 AM', status: 'late' }
            ]
        },
        'History': {
            code: 'HIST101',
            teacher: 'Mr. Anderson',
            schedule: 'Completed - Fall 2025',
            attendance: '92%',
            status: 'Completed',
            iconClass: 'history',
            iconBg: '#6b7280',
            history: [
                { day: '15', month: 'Nov', time: '11:00 AM', status: 'present' },
                { day: '13', month: 'Nov', time: '11:00 AM', status: 'present' },
                { day: '11', month: 'Nov', time: '11:00 AM', status: 'present' },
                { day: '08', month: 'Nov', time: '11:00 AM', status: 'excused' },
                { day: '06', month: 'Nov', time: '11:00 AM', status: 'present' }
            ]
        }
    };

    function openModal(courseName) {
        const data = courseData[courseName];
        if (!data) return;

        // Update modal content
        document.getElementById('modalCourseName').textContent = courseName;
        document.getElementById('modalCourseCode').textContent = data.code;
        document.getElementById('modalTeacher').textContent = data.teacher;
        document.getElementById('modalSchedule').textContent = data.schedule;
        document.getElementById('modalAttendance').textContent = data.attendance;
        
        const statusEl = document.getElementById('modalStatus');
        statusEl.textContent = data.status;
        statusEl.className = 'detail-value status-badge' + (data.status === 'Completed' ? ' completed' : '');

        // Update icon
        const iconEl = document.getElementById('modalCourseIcon');
        iconEl.style.background = data.iconBg;

        // Update attendance history
        const historyList = document.getElementById('modalAttendanceList');
        historyList.innerHTML = data.history.map(item => `
            <div class="attendance-row">
                <div class="attendance-date">
                    <span class="att-day">${item.day}</span>
                    <span class="att-month">${item.month}</span>
                </div>
                <div class="attendance-time">${item.time}</div>
                <span class="attendance-status ${item.status}">${item.status.charAt(0).toUpperCase() + item.status.slice(1)}</span>
            </div>
        `).join('');

        // Show modal
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    // Add click event to course cards
    courseCards.forEach(card => {
        card.style.cursor = 'pointer';
        card.addEventListener('click', function() {
            const courseName = this.querySelector('.course-title').textContent;
            openModal(courseName);
        });
    });

    // Close modal events
    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeModal();
        }
    });
}


// Add Class Modal functionality
function initAddClassModal() {
    const modal = document.getElementById('addClassModal');
    const addBtn = document.getElementById('addClassBtn');
    const closeBtn = document.getElementById('closeAddClassModal');
    const cancelBtn = document.getElementById('cancelAddClass');
    const joinBtn = document.getElementById('joinClassBtn');
    const codeInput = document.getElementById('classCodeInput');
    const inputHint = document.getElementById('inputHint');

    if (!modal || !addBtn) return;

    function openModal() {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        if (codeInput) {
            codeInput.value = '';
            codeInput.focus();
        }
        if (inputHint) {
            inputHint.textContent = '';
            inputHint.className = 'input-hint';
        }
    }

    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    // Open modal
    addBtn.addEventListener('click', openModal);

    // Close modal events
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', function(e) {
        if (e.target === modal) closeModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeModal();
        }
    });

    // Handle input
    if (codeInput) {
        codeInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
            if (inputHint) {
                inputHint.textContent = '';
                inputHint.className = 'input-hint';
            }
        });
    }

    // Join class
    if (joinBtn) {
        joinBtn.addEventListener('click', function() {
            const code = codeInput ? codeInput.value.trim() : '';
            
            if (!code) {
                if (inputHint) {
                    inputHint.textContent = 'Please enter a class code';
                    inputHint.className = 'input-hint error';
                }
                return;
            }

            if (code.length < 4) {
                if (inputHint) {
                    inputHint.textContent = 'Class code must be at least 4 characters';
                    inputHint.className = 'input-hint error';
                }
                return;
            }

            // TODO: Call API to join class
            console.log('Joining class with code:', code);
            
            // Show success (placeholder - replace with actual API call)
            if (inputHint) {
                inputHint.textContent = 'Joining class...';
                inputHint.className = 'input-hint success';
            }

            // Simulate API call
            setTimeout(() => {
                alert('Class code submitted: ' + code + '\n\nNote: Backend integration needed to complete enrollment.');
                closeModal();
            }, 500);
        });
    }
}
