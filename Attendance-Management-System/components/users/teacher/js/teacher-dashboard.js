const API_BASE_URL = 'http://localhost:8000';

async function logout(e) {
    e.preventDefault();

    try {
        await fetch(`${API_BASE_URL}/logout`, {
            method: 'POST',
            credentials: 'include',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        window.location.href = '../../../../components/login.php';
    } catch (error) {
        console.error('Logout error:', error);
        window.location.href = '../../../../components/login.php';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebarClose = document.querySelector('.sidebar-close');

    function toggleSidebar() {
        if (!sidebar || !sidebarOverlay) return;
        sidebar.classList.toggle('active');
        sidebarOverlay.classList.toggle('active');
        document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
    }

    if (menuToggle) {
        menuToggle.addEventListener('click', toggleSidebar);
    }

    if (sidebarClose) {
        sidebarClose.addEventListener('click', toggleSidebar);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', toggleSidebar);
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && sidebar && sidebar.classList.contains('active')) {
            toggleSidebar();
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && sidebar && sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
            if (sidebarOverlay) sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    const navItems = document.querySelectorAll('.nav-item:not(.logout)');
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            navItems.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');

            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        });
    });

    initFilterDropdowns();
    initNotificationDropdown();
});

function initFilterDropdowns() {
    const filterBtn = document.getElementById('filterBtn');
    const filterDropdown = document.getElementById('filterDropdown');

    // Only handle filter dropdown here - calendar/time pickers are handled separately
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

    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.stopPropagation();
            const tabName = this.dataset.tab;

            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            document.querySelectorAll('.filter-tab-content').forEach(content => {
                content.classList.remove('active');
            });
            const targetContent = document.getElementById('tab-' + tabName);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });

    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = this.closest('.dropdown-menu');
            const tabContent = this.closest('.filter-tab-content');
            const filterType = this.dataset.filter;

            if (tabContent) {
                tabContent.querySelectorAll('.dropdown-item').forEach(i => i.classList.remove('active'));
            } else if (dropdown) {
                dropdown.querySelectorAll('.dropdown-item').forEach(i => i.classList.remove('active'));
            }

            this.classList.add('active');

            const value = this.dataset.value;
            console.log('Filter applied:', filterType || 'date', '=', value);

            if (!tabContent) {
                closeAllDropdowns();
            }
        });
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.filter-icon-btn') && !e.target.closest('.picker-wrapper')) {
            closeAllDropdowns();
        }
    });

    const dropdownOverlay = document.querySelector('.dropdown-overlay');
    if (dropdownOverlay) {
        dropdownOverlay.addEventListener('click', function() {
            closeAllDropdowns();
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAllDropdowns();
        }
    });
}

function closeAllDropdowns() {
    document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
        dropdown.classList.remove('show');
    });
    document.querySelectorAll('.filter-icon-btn').forEach(btn => {
        btn.classList.remove('active');
    });

    const dropdownOverlay = document.querySelector('.dropdown-overlay');
    if (dropdownOverlay) {
        dropdownOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }
}

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

// Calendar Picker for Mark Attendance
function initCalendarPicker() {
    const datePickerBtn = document.getElementById('datePickerBtn');
    const calendarDropdown = document.getElementById('calendarDropdown');
    const dateDisplay = document.getElementById('dateDisplay');
    const dateInput = document.getElementById('dateSelect');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const calendarMonthYear = document.getElementById('calendarMonthYear');
    const calendarDays = document.getElementById('calendarDays');
    const todayBtn = document.getElementById('todayBtn');

    if (!datePickerBtn || !calendarDropdown) return;

    let currentDate = new Date();
    let selectedDate = new Date(2026, 0, 1); // January 1, 2026

    const months = ['January', 'February', 'March', 'April', 'May', 'June', 
                    'July', 'August', 'September', 'October', 'November', 'December'];

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        
        calendarMonthYear.textContent = `${months[month]} ${year}`;
        
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const daysInPrevMonth = new Date(year, month, 0).getDate();
        
        let html = '';
        
        // Previous month days
        for (let i = firstDay - 1; i >= 0; i--) {
            const day = daysInPrevMonth - i;
            html += `<button type="button" class="calendar-day other-month" data-date="${year}-${month}-${day}">${day}</button>`;
        }
        
        // Current month days
        const today = new Date();
        for (let day = 1; day <= daysInMonth; day++) {
            const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const isToday = today.getFullYear() === year && today.getMonth() === month && today.getDate() === day;
            const isSelected = selectedDate.getFullYear() === year && selectedDate.getMonth() === month && selectedDate.getDate() === day;
            
            let classes = 'calendar-day';
            if (isToday) classes += ' today';
            if (isSelected) classes += ' selected';
            
            html += `<button type="button" class="${classes}" data-date="${dateStr}">${day}</button>`;
        }
        
        // Next month days
        const totalCells = firstDay + daysInMonth;
        const remainingCells = totalCells <= 35 ? 35 - totalCells : 42 - totalCells;
        for (let day = 1; day <= remainingCells; day++) {
            html += `<button type="button" class="calendar-day other-month" data-date="${year}-${month + 2}-${day}">${day}</button>`;
        }
        
        calendarDays.innerHTML = html;
        
        // Add click handlers to days
        calendarDays.querySelectorAll('.calendar-day:not(.other-month)').forEach(dayBtn => {
            dayBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const dateStr = this.dataset.date;
                const [y, m, d] = dateStr.split('-').map(Number);
                selectedDate = new Date(y, m - 1, d);
                updateDateDisplay();
                renderCalendar();
                closeCalendar();
            });
        });
    }

    function updateDateDisplay() {
        const day = selectedDate.getDate();
        const month = months[selectedDate.getMonth()];
        const year = selectedDate.getFullYear();
        dateDisplay.textContent = `${month} ${day}, ${year}`;
        dateInput.value = `${year}-${String(selectedDate.getMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    }

    function openCalendar() {
        // Close time picker if open
        const timeDropdown = document.getElementById('timeDropdown');
        const timePickerBtn = document.getElementById('timePickerBtn');
        if (timeDropdown) timeDropdown.classList.remove('show');
        if (timePickerBtn) timePickerBtn.classList.remove('active');
        
        calendarDropdown.classList.add('show');
        datePickerBtn.classList.add('active');
        currentDate = new Date(selectedDate);
        renderCalendar();
        if (window.innerWidth <= 576) {
            showPickerOverlay();
        }
    }

    function closeCalendar() {
        calendarDropdown.classList.remove('show');
        datePickerBtn.classList.remove('active');
        hidePickerOverlay();
    }
    
    // Make closeCalendar available globally
    window.closeCalendarPicker = closeCalendar;

    datePickerBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (calendarDropdown.classList.contains('show')) {
            closeCalendar();
        } else {
            openCalendar();
        }
    });

    if (prevMonthBtn) {
        prevMonthBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });
    }

    if (nextMonthBtn) {
        nextMonthBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });
    }

    if (todayBtn) {
        todayBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            selectedDate = new Date();
            currentDate = new Date();
            updateDateDisplay();
            renderCalendar();
            closeCalendar();
        });
    }

    document.addEventListener('click', function(e) {
        if (!e.target.closest('#datePickerWrapper') && !e.target.closest('.calendar-dropdown')) {
            closeCalendar();
        }
    });

    // Initialize display
    updateDateDisplay();
    renderCalendar();
}

// Time Picker for Mark Attendance
function initTimePicker() {
    const timePickerBtn = document.getElementById('timePickerBtn');
    const timeDropdown = document.getElementById('timeDropdown');
    const timeDisplay = document.getElementById('timeDisplay');
    const timeInput = document.getElementById('timeSelect');
    const nowBtn = document.getElementById('nowBtn');
    const hourScroll = document.getElementById('hourScroll');
    const minuteScroll = document.getElementById('minuteScroll');
    const periodScroll = document.getElementById('periodScroll');

    if (!timePickerBtn || !timeDropdown) return;

    let selectedHour = 1;
    let selectedMinute = 0;
    let selectedPeriod = 'PM';

    function updateTimeDisplay() {
        const hourStr = String(selectedHour).padStart(2, '0');
        const minuteStr = String(selectedMinute).padStart(2, '0');
        timeDisplay.textContent = `${hourStr}:${minuteStr} ${selectedPeriod}`;
        
        // Convert to 24-hour format for hidden input
        let hour24 = selectedHour;
        if (selectedPeriod === 'PM' && selectedHour !== 12) {
            hour24 = selectedHour + 12;
        } else if (selectedPeriod === 'AM' && selectedHour === 12) {
            hour24 = 0;
        }
        timeInput.value = `${String(hour24).padStart(2, '0')}:${minuteStr}`;
    }

    function updateSelection() {
        // Update hour selection
        hourScroll.querySelectorAll('.time-option').forEach(opt => {
            opt.classList.toggle('selected', parseInt(opt.dataset.value) === selectedHour);
        });
        
        // Update minute selection
        minuteScroll.querySelectorAll('.time-option').forEach(opt => {
            opt.classList.toggle('selected', parseInt(opt.dataset.value) === selectedMinute);
        });
        
        // Update period selection
        periodScroll.querySelectorAll('.time-option').forEach(opt => {
            opt.classList.toggle('selected', opt.dataset.value === selectedPeriod);
        });
    }

    function openTimePicker() {
        // Close calendar if open
        const calendarDropdown = document.getElementById('calendarDropdown');
        const datePickerBtn = document.getElementById('datePickerBtn');
        if (calendarDropdown) calendarDropdown.classList.remove('show');
        if (datePickerBtn) datePickerBtn.classList.remove('active');
        
        timeDropdown.classList.add('show');
        timePickerBtn.classList.add('active');
        updateSelection();
        if (window.innerWidth <= 576) {
            showPickerOverlay();
        }
    }

    function closeTimePicker() {
        timeDropdown.classList.remove('show');
        timePickerBtn.classList.remove('active');
        hidePickerOverlay();
    }

    // Make closeTimePicker available globally
    window.closeTimePicker = closeTimePicker;

    timePickerBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (timeDropdown.classList.contains('show')) {
            closeTimePicker();
        } else {
            openTimePicker();
        }
    });

    // Hour selection
    if (hourScroll) {
        hourScroll.querySelectorAll('.time-option').forEach(opt => {
            opt.addEventListener('click', function(e) {
                e.stopPropagation();
                selectedHour = parseInt(this.dataset.value);
                updateSelection();
                updateTimeDisplay();
            });
        });
    }

    // Minute selection
    if (minuteScroll) {
        minuteScroll.querySelectorAll('.time-option').forEach(opt => {
            opt.addEventListener('click', function(e) {
                e.stopPropagation();
                selectedMinute = parseInt(this.dataset.value);
                updateSelection();
                updateTimeDisplay();
            });
        });
    }

    // Period selection
    if (periodScroll) {
        periodScroll.querySelectorAll('.time-option').forEach(opt => {
            opt.addEventListener('click', function(e) {
                e.stopPropagation();
                selectedPeriod = this.dataset.value;
                updateSelection();
                updateTimeDisplay();
            });
        });
    }

    // Now button
    if (nowBtn) {
        nowBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const now = new Date();
            let hours = now.getHours();
            selectedMinute = Math.floor(now.getMinutes() / 15) * 15; // Round to nearest 15
            
            if (hours >= 12) {
                selectedPeriod = 'PM';
                selectedHour = hours === 12 ? 12 : hours - 12;
            } else {
                selectedPeriod = 'AM';
                selectedHour = hours === 0 ? 12 : hours;
            }
            
            updateSelection();
            updateTimeDisplay();
            closeTimePicker();
        });
    }

    document.addEventListener('click', function(e) {
        if (!e.target.closest('#timePickerWrapper') && !e.target.closest('.time-dropdown')) {
            closeTimePicker();
        }
    });

    // Initialize display
    updateTimeDisplay();
}

function showPickerOverlay() {
    let overlay = document.querySelector('.picker-overlay');
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'picker-overlay';
        document.body.appendChild(overlay);
        overlay.addEventListener('click', function() {
            if (window.closeCalendarPicker) window.closeCalendarPicker();
            if (window.closeTimePicker) window.closeTimePicker();
            if (window.closeClassPicker) window.closeClassPicker();
        });
    }
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function hidePickerOverlay() {
    const overlay = document.querySelector('.picker-overlay');
    if (overlay) {
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// Initialize pickers on page load
document.addEventListener('DOMContentLoaded', function() {
    initCalendarPicker();
    initTimePicker();
    initClassPicker();
});

// Class Picker for Mark Attendance
function initClassPicker() {
    const classPickerBtn = document.getElementById('classPickerBtn');
    const classDropdown = document.getElementById('classDropdown');
    const classDisplay = document.getElementById('classDisplay');
    const classInput = document.getElementById('classSelect');

    if (!classPickerBtn || !classDropdown) return;

    function openClassPicker() {
        // Close other pickers
        if (window.closeCalendarPicker) window.closeCalendarPicker();
        if (window.closeTimePicker) window.closeTimePicker();
        
        classDropdown.classList.add('show');
        classPickerBtn.classList.add('active');
        if (window.innerWidth <= 576) {
            showPickerOverlay();
        }
    }

    function closeClassPicker() {
        classDropdown.classList.remove('show');
        classPickerBtn.classList.remove('active');
        hidePickerOverlay();
    }

    // Make closeClassPicker available globally
    window.closeClassPicker = closeClassPicker;

    classPickerBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (classDropdown.classList.contains('show')) {
            closeClassPicker();
        } else {
            openClassPicker();
        }
    });

    // Class option selection
    classDropdown.querySelectorAll('.class-option').forEach(option => {
        option.addEventListener('click', function(e) {
            e.stopPropagation();
            const value = this.dataset.value;
            const label = this.dataset.label;
            
            // Update selection
            classDropdown.querySelectorAll('.class-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            this.classList.add('selected');
            
            // Update display and hidden input
            classDisplay.textContent = label;
            classInput.value = value;
            
            closeClassPicker();
        });
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('#classPickerWrapper') && !e.target.closest('.class-dropdown')) {
            closeClassPicker();
        }
    });
}


// Attendance Modal Functions
function showAttendanceSuccessModal(courseName, presentCount, absentCount, lateCount) {
    const modal = document.getElementById('attendanceSuccessModal');
    const message = document.getElementById('attendanceSuccessMessage');
    
    if (modal) {
        // Update message with course name
        if (message && courseName) {
            message.innerHTML = `Attendance for <strong>${courseName}</strong> has been recorded successfully.`;
        }
        
        // Update summary stats
        const presentStat = modal.querySelector('.stat-value.present');
        const absentStat = modal.querySelector('.stat-value.absent');
        const lateStat = modal.querySelector('.stat-value.late');
        
        if (presentStat) presentStat.textContent = presentCount || 0;
        if (absentStat) absentStat.textContent = absentCount || 0;
        if (lateStat) lateStat.textContent = lateCount || 0;
        
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
}

function hideAttendanceSuccessModal() {
    const modal = document.getElementById('attendanceSuccessModal');
    if (modal) {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }
}

function showAttendanceFailedModal(errorMessage) {
    const modal = document.getElementById('attendanceFailedModal');
    const message = document.getElementById('attendanceFailedMessage');
    
    if (modal) {
        if (message && errorMessage) {
            message.textContent = errorMessage;
        }
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
}

function hideAttendanceFailedModal() {
    const modal = document.getElementById('attendanceFailedModal');
    if (modal) {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }
}

// Initialize modal event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Success modal OK button
    const successOkBtn = document.getElementById('attendanceSuccessOkBtn');
    if (successOkBtn) {
        successOkBtn.addEventListener('click', hideAttendanceSuccessModal);
    }
    
    // Failed modal buttons
    const failedCancelBtn = document.getElementById('attendanceFailedCancelBtn');
    const failedRetryBtn = document.getElementById('attendanceFailedRetryBtn');
    
    if (failedCancelBtn) {
        failedCancelBtn.addEventListener('click', hideAttendanceFailedModal);
    }
    
    if (failedRetryBtn) {
        failedRetryBtn.addEventListener('click', function() {
            hideAttendanceFailedModal();
            // Trigger save attendance again
            const saveBtn = document.getElementById('saveAttendance');
            if (saveBtn) saveBtn.click();
        });
    }
    
    // Close modals on overlay click
    const successModal = document.getElementById('attendanceSuccessModal');
    const failedModal = document.getElementById('attendanceFailedModal');
    
    if (successModal) {
        successModal.addEventListener('click', function(e) {
            if (e.target === this) hideAttendanceSuccessModal();
        });
    }
    
    if (failedModal) {
        failedModal.addEventListener('click', function(e) {
            if (e.target === this) hideAttendanceFailedModal();
        });
    }
    
    // Save attendance button handler (demo)
    const saveAttendanceBtn = document.getElementById('saveAttendance');
    if (saveAttendanceBtn) {
        saveAttendanceBtn.addEventListener('click', function() {
            // Get current class name
            const classDisplay = document.getElementById('classDisplay');
            const courseName = classDisplay ? classDisplay.textContent : 'Unknown Class';
            
            // Count attendance (demo - counts from current UI)
            let presentCount = document.querySelectorAll('.status-btn.present.active').length;
            let absentCount = document.querySelectorAll('.status-btn.absent.active').length;
            let lateCount = document.querySelectorAll('.status-btn.late.active').length;
            
            // Demo: Show success modal (in real app, this would be after API call)
            showAttendanceSuccessModal(courseName, presentCount, absentCount, lateCount);
        });
    }
});
