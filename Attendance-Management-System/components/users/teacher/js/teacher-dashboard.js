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
    const datePickerBtn = document.getElementById('datePickerBtn');
    const dateDropdown = document.getElementById('dateDropdown');

    // Handle date dropdown (for attendance history page)
    if (datePickerBtn && dateDropdown) {
        datePickerBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            // Close filter dropdown if open
            if (filterDropdown) filterDropdown.classList.remove('show');
            if (filterBtn) filterBtn.classList.remove('active');
            
            dateDropdown.classList.toggle('show');
            datePickerBtn.classList.toggle('active', dateDropdown.classList.contains('show'));
            if (dateDropdown.classList.contains('show')) {
                showDropdownOverlay();
            } else {
                hideDropdownOverlay();
            }
        });
    }

    // Only handle filter dropdown here - calendar/time pickers are handled separately
    if (filterBtn && filterDropdown) {
        filterBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            // Close date dropdown if open
            if (dateDropdown) dateDropdown.classList.remove('show');
            if (datePickerBtn) datePickerBtn.classList.remove('active');
            
            filterDropdown.classList.toggle('show');
            filterBtn.classList.toggle('active', filterDropdown.classList.contains('show'));
            if (filterDropdown.classList.contains('show')) {
                showDropdownOverlay();
            } else {
                hideDropdownOverlay();
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
    hideDropdownOverlay();
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

function hideDropdownOverlay() {
    const dropdownOverlay = document.querySelector('.dropdown-overlay');
    if (dropdownOverlay) {
        dropdownOverlay.classList.remove('active');
        document.body.style.overflow = '';
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

// Toggle Attendance Session Dropdown (for Attendance History page)
function toggleSession(headerElement) {
    const session = headerElement.closest('.attendance-session');
    if (session) {
        const isExpanding = !session.classList.contains('expanded');
        
        // Toggle the expanded class
        session.classList.toggle('expanded');
        
        // Handle animation for student items
        if (isExpanding) {
            const studentItems = session.querySelectorAll('.student-item');
            studentItems.forEach((item, index) => {
                item.style.animation = 'none';
                item.offsetHeight; // Trigger reflow
                item.style.animation = `slideIn 0.3s ease forwards`;
                item.style.animationDelay = `${Math.min(index * 0.05, 0.3)}s`;
            });
            
            // Check if scroll indicator should be shown
            const studentsContainer = session.querySelector('.session-students');
            const studentsList = session.querySelector('.students-list');
            const scrollIndicator = session.querySelector('.students-count');
            
            if (studentsContainer && studentsList && scrollIndicator) {
                // Wait for animation to complete
                setTimeout(() => {
                    const hasScroll = studentsList.scrollHeight > studentsContainer.clientHeight - 80;
                    scrollIndicator.style.display = hasScroll ? 'flex' : 'none';
                }, 100);
            }
        }
    }
}


// Stat Cards Filter Functionality (for Courses page)
function initStatCardFilters() {
    const statCards = document.querySelectorAll('.stat-card');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const courseCards = document.querySelectorAll('.course-card');
    
    if (!statCards.length) return;
    
    statCards.forEach(card => {
        card.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update stat card selection
            statCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            
            // Sync with filter buttons if they exist
            if (filterButtons.length) {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                filterButtons.forEach(btn => {
                    const btnText = btn.textContent.toLowerCase();
                    if ((filter === 'all' && btnText === 'all') ||
                        (filter === 'active' && btnText === 'active') ||
                        (filter === 'completed' && btnText === 'completed')) {
                        btn.classList.add('active');
                    }
                });
            }
            
            // Filter course cards
            if (courseCards.length) {
                courseCards.forEach(courseCard => {
                    const status = courseCard.querySelector('.course-status');
                    const isActive = status && status.classList.contains('active');
                    const isCompleted = status && status.classList.contains('completed');
                    
                    if (filter === 'all' || filter === 'students') {
                        courseCard.style.display = '';
                        courseCard.style.animation = 'fadeIn 0.3s ease';
                    } else if (filter === 'active' && isActive) {
                        courseCard.style.display = '';
                        courseCard.style.animation = 'fadeIn 0.3s ease';
                    } else if (filter === 'completed' && isCompleted) {
                        courseCard.style.display = '';
                        courseCard.style.animation = 'fadeIn 0.3s ease';
                    } else {
                        courseCard.style.display = 'none';
                    }
                });
            }
        });
    });
    
    // Sync filter buttons with stat cards
    if (filterButtons.length) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const btnText = this.textContent.toLowerCase();
                let filter = 'all';
                
                if (btnText === 'active') filter = 'active';
                else if (btnText === 'completed') filter = 'completed';
                
                // Find and click the corresponding stat card
                statCards.forEach(card => {
                    if (card.dataset.filter === filter) {
                        card.click();
                    }
                });
            });
        });
    }
}

// Add fadeIn animation
const styleSheet = document.createElement('style');
styleSheet.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(styleSheet);

// Initialize stat card filters on page load
document.addEventListener('DOMContentLoaded', function() {
    initStatCardFilters();
});


// Course Detail Modal Functionality
function initCourseDetailModal() {
    const courseCards = document.querySelectorAll('.course-card');
    const modal = document.getElementById('courseDetailModal');
    const closeBtn = document.getElementById('closeModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const markAttendanceBtn = document.getElementById('markAttendanceBtn');
    const studentSearchInput = document.getElementById('studentSearchInput');
    
    if (!modal || !courseCards.length) return;

    // Course card click handler
    courseCards.forEach(card => {
        card.addEventListener('click', function() {
            const courseName = this.dataset.name;
            const courseCode = this.dataset.code;
            const schedule = this.dataset.schedule;
            const students = this.dataset.students;
            const attendance = this.dataset.attendance;
            const status = this.dataset.status;
            const iconColor = this.dataset.iconColor;
            
            // Update modal content
            document.getElementById('modalCourseName').textContent = courseName;
            document.getElementById('modalCourseCode').textContent = courseCode;
            document.getElementById('modalSchedule').textContent = schedule;
            document.getElementById('modalStudentCount').textContent = students + ' students';
            document.getElementById('modalAttendance').textContent = attendance;
            document.getElementById('modalStatus').textContent = status;
            
            // Update icon color
            const modalIcon = document.getElementById('modalCourseIcon');
            if (modalIcon && iconColor) {
                modalIcon.style.background = iconColor;
            }
            
            // Copy the course icon SVG
            const courseIcon = this.querySelector('.course-icon svg');
            if (courseIcon && modalIcon) {
                modalIcon.innerHTML = courseIcon.outerHTML;
            }
            
            // Update status badge class
            const statusBadge = document.getElementById('modalStatus');
            if (statusBadge) {
                statusBadge.classList.remove('completed');
                if (status.toLowerCase() === 'completed') {
                    statusBadge.classList.add('completed');
                }
            }
            
            // Show modal
            openCourseModal();
        });
    });

    // Close modal handlers
    function closeCourseModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    function openCourseModal() {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeCourseModal);
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeCourseModal);
    }

    // Close on overlay click
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            closeCourseModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeCourseModal();
        }
    });

    // Mark Attendance button
    if (markAttendanceBtn) {
        markAttendanceBtn.addEventListener('click', function() {
            closeCourseModal();
            // Redirect to mark attendance page
            window.location.href = 'teacher_mark_attendance.php';
        });
    }

    // Student search functionality
    if (studentSearchInput) {
        studentSearchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const studentItems = document.querySelectorAll('#modalStudentsList .student-item');
            
            studentItems.forEach(item => {
                const name = item.querySelector('.student-name').textContent.toLowerCase();
                const id = item.querySelector('.student-id').textContent.toLowerCase();
                
                if (name.includes(searchTerm) || id.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
}

// Initialize course detail modal on page load
document.addEventListener('DOMContentLoaded', function() {
    initCourseDetailModal();
});


// Add Course Modal Functionality
function initAddCourseModal() {
    const fabBtn = document.querySelector('.fab-add');
    const modal = document.getElementById('addCourseModal');
    const closeBtn = document.getElementById('closeAddCourseModal');
    const cancelBtn = document.getElementById('cancelAddCourse');
    const form = document.getElementById('addCourseForm');
    const regenerateBtn = document.getElementById('regenerateCode');
    const copyBtn = document.getElementById('copyClassCode');
    const classCodeDisplay = document.getElementById('generatedClassCode');
    
    if (!modal) return;

    // Generate random class code
    function generateClassCode() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let code = '';
        for (let i = 0; i < 6; i++) {
            code += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return code;
    }

    // Open modal
    function openAddCourseModal() {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        // Generate initial class code
        if (classCodeDisplay) {
            classCodeDisplay.textContent = generateClassCode();
        }
    }

    // Close modal
    function closeAddCourseModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
        // Reset form
        if (form) form.reset();
    }

    // FAB button click
    if (fabBtn) {
        fabBtn.addEventListener('click', openAddCourseModal);
    }

    // Close button click
    if (closeBtn) {
        closeBtn.addEventListener('click', closeAddCourseModal);
    }

    // Cancel button click
    if (cancelBtn) {
        cancelBtn.addEventListener('click', closeAddCourseModal);
    }

    // Close on overlay click
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            closeAddCourseModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeAddCourseModal();
        }
    });

    // Regenerate class code
    if (regenerateBtn && classCodeDisplay) {
        regenerateBtn.addEventListener('click', function() {
            classCodeDisplay.textContent = generateClassCode();
            // Add animation
            classCodeDisplay.style.animation = 'none';
            classCodeDisplay.offsetHeight; // Trigger reflow
            classCodeDisplay.style.animation = 'fadeIn 0.3s ease';
        });
    }

    // Copy class code
    if (copyBtn && classCodeDisplay) {
        copyBtn.addEventListener('click', function() {
            const code = classCodeDisplay.textContent;
            navigator.clipboard.writeText(code).then(() => {
                // Show copied feedback
                copyBtn.classList.add('copied');
                copyBtn.innerHTML = `
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                `;
                
                setTimeout(() => {
                    copyBtn.classList.remove('copied');
                    copyBtn.innerHTML = `
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"></path>
                        </svg>
                    `;
                }, 2000);
            });
        });
    }

    // Form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const courseName = document.getElementById('courseName').value;
            const courseCode = document.getElementById('courseCode').value;
            const courseTime = document.getElementById('courseTime').value;
            const courseRoom = document.getElementById('courseRoom').value;
            const courseDescription = document.getElementById('courseDescription').value;
            const classCode = classCodeDisplay.textContent;
            
            // Get selected days
            const selectedDays = [];
            document.querySelectorAll('input[name="days"]:checked').forEach(checkbox => {
                selectedDays.push(checkbox.value);
            });
            
            // Get selected color
            const selectedColor = document.querySelector('input[name="courseColor"]:checked').value;
            
            // Create course data object
            const courseData = {
                name: courseName,
                code: courseCode,
                days: selectedDays,
                time: courseTime,
                room: courseRoom,
                description: courseDescription,
                color: selectedColor,
                classCode: classCode
            };
            
            console.log('Course Data:', courseData);
            
            // Here you would typically send this to your backend API
            // For now, show success and close modal
            alert('Course created successfully!\nClass Code: ' + classCode);
            closeAddCourseModal();
        });
    }
}

// Initialize add course modal on page load
document.addEventListener('DOMContentLoaded', function() {
    initAddCourseModal();
});


// Course Success Modal Functions
function showCourseSuccessModal(classCode, message) {
    const modal = document.getElementById('courseSuccessModal');
    const codeDisplay = document.getElementById('successClassCode');
    const messageEl = document.getElementById('successMessage');
    
    if (modal) {
        if (codeDisplay && classCode) {
            codeDisplay.textContent = classCode;
        }
        if (messageEl && message) {
            messageEl.textContent = message;
        }
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
}

function hideCourseSuccessModal() {
    const modal = document.getElementById('courseSuccessModal');
    if (modal) {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }
}

// Course Failed Modal Functions
function showCourseFailedModal(message, errorDetails) {
    const modal = document.getElementById('courseFailedModal');
    const messageEl = document.getElementById('failedMessage');
    const detailsEl = document.getElementById('errorDetails');
    
    if (modal) {
        if (messageEl && message) {
            messageEl.textContent = message;
        }
        if (detailsEl && errorDetails) {
            detailsEl.innerHTML = `
                <div class="error-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span>${errorDetails}</span>
                </div>
            `;
        }
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
}

function hideCourseFailedModal() {
    const modal = document.getElementById('courseFailedModal');
    if (modal) {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }
}

// Initialize Success & Failed Modal Event Listeners
function initCourseResultModals() {
    // Success Modal
    const successModal = document.getElementById('courseSuccessModal');
    const successOkBtn = document.getElementById('successOkBtn');
    
    if (successOkBtn) {
        successOkBtn.addEventListener('click', hideCourseSuccessModal);
    }
    
    if (successModal) {
        successModal.addEventListener('click', function(e) {
            if (e.target === this) hideCourseSuccessModal();
        });
    }
    
    // Failed Modal
    const failedModal = document.getElementById('courseFailedModal');
    const failedCancelBtn = document.getElementById('failedCancelBtn');
    const failedRetryBtn = document.getElementById('failedRetryBtn');
    
    if (failedCancelBtn) {
        failedCancelBtn.addEventListener('click', hideCourseFailedModal);
    }
    
    if (failedRetryBtn) {
        failedRetryBtn.addEventListener('click', function() {
            hideCourseFailedModal();
            // Reopen add course modal
            const addCourseModal = document.getElementById('addCourseModal');
            if (addCourseModal) {
                addCourseModal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }
        });
    }
    
    if (failedModal) {
        failedModal.addEventListener('click', function(e) {
            if (e.target === this) hideCourseFailedModal();
        });
    }
    
    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (successModal && successModal.classList.contains('show')) {
                hideCourseSuccessModal();
            }
            if (failedModal && failedModal.classList.contains('show')) {
                hideCourseFailedModal();
            }
        }
    });
}

// Update the Add Course form submission to use the new modals
function updateAddCourseFormHandler() {
    const form = document.getElementById('addCourseForm');
    const addCourseModal = document.getElementById('addCourseModal');
    const classCodeDisplay = document.getElementById('generatedClassCode');
    
    if (form) {
        // Remove existing submit handler and add new one
        form.removeEventListener('submit', form._submitHandler);
        
        form._submitHandler = function(e) {
            e.preventDefault();
            
            // Get form data
            const courseName = document.getElementById('courseName').value;
            const courseCode = document.getElementById('courseCode').value;
            const classCode = classCodeDisplay ? classCodeDisplay.textContent : 'ABC123';
            
            // Get selected days
            const selectedDays = [];
            document.querySelectorAll('input[name="days"]:checked').forEach(checkbox => {
                selectedDays.push(checkbox.value);
            });
            
            // Validate
            if (!courseName || !courseCode) {
                showCourseFailedModal('Please fill in all required fields', 'Course name and code are required');
                return;
            }
            
            if (selectedDays.length === 0) {
                showCourseFailedModal('Please select at least one day', 'Schedule days are required');
                return;
            }
            
            // Simulate API call (replace with actual API call)
            const simulateSuccess = true; // Change to false to test failed modal
            
            // Close add course modal
            if (addCourseModal) {
                addCourseModal.classList.remove('show');
            }
            
            if (simulateSuccess) {
                // Show success modal
                setTimeout(() => {
                    showCourseSuccessModal(classCode, `"${courseName}" has been created successfully.`);
                    // Reset form
                    form.reset();
                }, 300);
            } else {
                // Show failed modal
                setTimeout(() => {
                    showCourseFailedModal('Failed to create course', 'Server error. Please try again later.');
                }, 300);
            }
        };
        
        form.addEventListener('submit', form._submitHandler);
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initCourseResultModals();
    // Update form handler after a short delay to ensure other handlers are set
    setTimeout(updateAddCourseFormHandler, 100);
});


// Preview Modal Class Code Copy Functionality
function initPreviewCodeCopy() {
    const copyBtn = document.getElementById('copyPreviewCode');
    const codeDisplay = document.getElementById('modalClassCode');
    
    if (copyBtn && codeDisplay) {
        copyBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const code = codeDisplay.textContent;
            
            navigator.clipboard.writeText(code).then(() => {
                // Show copied feedback
                copyBtn.classList.add('copied');
                const copyText = copyBtn.querySelector('.copy-text');
                const originalText = copyText ? copyText.textContent : 'Copy';
                
                if (copyText) copyText.textContent = 'Copied!';
                copyBtn.innerHTML = `
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span class="copy-text">Copied!</span>
                `;
                
                setTimeout(() => {
                    copyBtn.classList.remove('copied');
                    copyBtn.innerHTML = `
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"></path>
                        </svg>
                        <span class="copy-text">Copy</span>
                    `;
                }, 2000);
            });
        });
    }
}

// Update Course Detail Modal to include class code
function updateCourseDetailModalHandler() {
    const courseCards = document.querySelectorAll('.course-card');
    
    courseCards.forEach(card => {
        // Remove existing click handler and add updated one
        const newCard = card.cloneNode(true);
        card.parentNode.replaceChild(newCard, card);
        
        newCard.addEventListener('click', function() {
            const courseName = this.dataset.name;
            const courseCode = this.dataset.code;
            const schedule = this.dataset.schedule;
            const students = this.dataset.students;
            const attendance = this.dataset.attendance;
            const status = this.dataset.status;
            const iconColor = this.dataset.iconColor;
            const classCode = this.dataset.classCode || 'N/A';
            
            // Update modal content
            document.getElementById('modalCourseName').textContent = courseName;
            document.getElementById('modalCourseCode').textContent = courseCode;
            document.getElementById('modalSchedule').textContent = schedule;
            document.getElementById('modalStudentCount').textContent = students + ' students';
            document.getElementById('modalAttendance').textContent = attendance;
            document.getElementById('modalStatus').textContent = status;
            
            // Update class code
            const classCodeEl = document.getElementById('modalClassCode');
            if (classCodeEl) {
                classCodeEl.textContent = classCode;
            }
            
            // Update icon color
            const modalIcon = document.getElementById('modalCourseIcon');
            if (modalIcon && iconColor) {
                modalIcon.style.background = iconColor;
            }
            
            // Copy the course icon SVG
            const courseIcon = this.querySelector('.course-icon svg');
            if (courseIcon && modalIcon) {
                modalIcon.innerHTML = courseIcon.outerHTML;
            }
            
            // Update status badge class
            const statusBadge = document.getElementById('modalStatus');
            if (statusBadge) {
                statusBadge.classList.remove('completed');
                if (status.toLowerCase() === 'completed') {
                    statusBadge.classList.add('completed');
                }
            }
            
            // Show modal
            const modal = document.getElementById('courseDetailModal');
            if (modal) {
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }
        });
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initPreviewCodeCopy();
    // Update course detail modal handler after a short delay
    setTimeout(updateCourseDetailModalHandler, 150);
});
