<?php
$pageTitle = 'Mark Attendance';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance - Attendance Management System</title>
    <link rel="stylesheet" href="../css/teacher_mark_attendance.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <div class="mark-attendance-content">
            <!-- Class Selection -->
            <div class="class-selection-card">
                <div class="selection-header">
                    <h2>Select Class & Date</h2>
                </div>
                <div class="selection-body">
                    <div class="selection-row">
                        <div class="selection-group">
                            <label for="classSelect">Class / Subject</label>
                            <div class="picker-wrapper" id="classPickerWrapper">
                                <div class="picker-input" id="classPickerBtn">
                                    <span class="picker-value" id="classDisplay">CS301 - Computer Science (35 students)</span>
                                    <svg class="picker-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </div>
                                <input type="hidden" id="classSelect" value="cs301">
                                <!-- Class Dropdown -->
                                <div class="class-dropdown" id="classDropdown">
                                    <div class="class-dropdown-header">
                                        <span>Select Class</span>
                                    </div>
                                    <div class="class-dropdown-body">
                                        <div class="class-option" data-value="" data-label="-- Select Class --">
                                            <span class="class-option-text">-- Select Class --</span>
                                        </div>
                                        <div class="class-option" data-value="math101" data-label="MATH101 - Mathematics (32 students)">
                                            <span class="class-option-code">MATH101</span>
                                            <span class="class-option-text">Mathematics</span>
                                            <span class="class-option-count">32 students</span>
                                        </div>
                                        <div class="class-option" data-value="phy201" data-label="PHY201 - Physics (28 students)">
                                            <span class="class-option-code">PHY201</span>
                                            <span class="class-option-text">Physics</span>
                                            <span class="class-option-count">28 students</span>
                                        </div>
                                        <div class="class-option selected" data-value="cs301" data-label="CS301 - Computer Science (35 students)">
                                            <span class="class-option-code">CS301</span>
                                            <span class="class-option-text">Computer Science</span>
                                            <span class="class-option-count">35 students</span>
                                        </div>
                                        <div class="class-option" data-value="eng102" data-label="ENG102 - English (30 students)">
                                            <span class="class-option-code">ENG102</span>
                                            <span class="class-option-text">English</span>
                                            <span class="class-option-count">30 students</span>
                                        </div>
                                        <div class="class-option" data-value="chem201" data-label="CHEM201 - Chemistry (31 students)">
                                            <span class="class-option-code">CHEM201</span>
                                            <span class="class-option-text">Chemistry</span>
                                            <span class="class-option-count">31 students</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="selection-group">
                            <label for="dateSelect">Date</label>
                            <div class="picker-wrapper" id="datePickerWrapper">
                                <div class="picker-input" id="datePickerBtn">
                                    <span class="picker-value" id="dateDisplay">January 1, 2026</span>
                                    <svg class="picker-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <input type="hidden" id="dateSelect" value="2026-01-01">
                                <!-- Calendar Dropdown -->
                                <div class="calendar-dropdown" id="calendarDropdown">
                                    <div class="calendar-header">
                                        <button type="button" class="calendar-nav-btn" id="prevMonth">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <span class="calendar-month-year" id="calendarMonthYear">January 2026</span>
                                        <button type="button" class="calendar-nav-btn" id="nextMonth">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="calendar-weekdays">
                                        <span>Su</span>
                                        <span>Mo</span>
                                        <span>Tu</span>
                                        <span>We</span>
                                        <span>Th</span>
                                        <span>Fr</span>
                                        <span>Sa</span>
                                    </div>
                                    <div class="calendar-days" id="calendarDays">
                                        <!-- Days will be generated by JavaScript -->
                                    </div>
                                    <div class="calendar-footer">
                                        <button type="button" class="calendar-today-btn" id="todayBtn">Today</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="selection-group">
                            <label for="timeSelect">Time</label>
                            <div class="picker-wrapper" id="timePickerWrapper">
                                <div class="picker-input" id="timePickerBtn">
                                    <span class="picker-value" id="timeDisplay">01:00 PM</span>
                                    <svg class="picker-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 6v6l4 2"></path>
                                    </svg>
                                </div>
                                <input type="hidden" id="timeSelect" value="13:00">
                                <!-- Time Picker Dropdown -->
                                <div class="time-dropdown" id="timeDropdown">
                                    <div class="time-picker-header">
                                        <span>Select Time</span>
                                    </div>
                                    <div class="time-picker-body">
                                        <div class="time-column">
                                            <label>Hour</label>
                                            <div class="time-scroll" id="hourScroll">
                                                <div class="time-option" data-value="01">01</div>
                                                <div class="time-option" data-value="02">02</div>
                                                <div class="time-option" data-value="03">03</div>
                                                <div class="time-option" data-value="04">04</div>
                                                <div class="time-option" data-value="05">05</div>
                                                <div class="time-option" data-value="06">06</div>
                                                <div class="time-option" data-value="07">07</div>
                                                <div class="time-option" data-value="08">08</div>
                                                <div class="time-option" data-value="09">09</div>
                                                <div class="time-option" data-value="10">10</div>
                                                <div class="time-option" data-value="11">11</div>
                                                <div class="time-option selected" data-value="12">12</div>
                                            </div>
                                        </div>
                                        <div class="time-column">
                                            <label>Minute</label>
                                            <div class="time-scroll" id="minuteScroll">
                                                <div class="time-option selected" data-value="00">00</div>
                                                <div class="time-option" data-value="15">15</div>
                                                <div class="time-option" data-value="30">30</div>
                                                <div class="time-option" data-value="45">45</div>
                                            </div>
                                        </div>
                                        <div class="time-column">
                                            <label>Period</label>
                                            <div class="time-scroll" id="periodScroll">
                                                <div class="time-option" data-value="AM">AM</div>
                                                <div class="time-option selected" data-value="PM">PM</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="time-picker-footer">
                                        <button type="button" class="time-now-btn" id="nowBtn">Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary load-btn" id="loadStudents">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Load Students
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="action-left">
                    <span class="student-count">35 Students</span>
                    <div class="attendance-summary">
                        <span class="summary-item present"><span class="count">28</span> Present</span>
                        <span class="summary-item absent"><span class="count">4</span> Absent</span>
                        <span class="summary-item late"><span class="count">3</span> Late</span>
                    </div>
                </div>
            </div>

            <!-- Students List -->
            <div class="card students-card">
                <div class="card-header">
                    <h2 class="card-title">CS301 - Computer Science</h2>
                    <div class="header-actions">
                        <div class="search-box">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="M21 21l-4.35-4.35"></path>
                            </svg>
                            <input type="text" placeholder="Search student..." class="search-input">
                        </div>
                        <div class="action-buttons">
                            <button class="btn btn-outline mark-all-btn" data-status="present" title="Mark All Present">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>All Present</span>
                            </button>
                            <button class="btn btn-outline mark-all-btn" data-status="absent" title="Mark All Absent">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>All Absent</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="students-list">
                        <!-- Student Row 1 -->
                        <div class="student-row" data-student="1">
                            <div class="student-info">
                                <div class="student-avatar">JS</div>
                                <div class="student-details">
                                    <span class="student-name">John Smith</span>
                                    <span class="student-id">STU-00001</span>
                                </div>
                            </div>
                            <div class="attendance-buttons">
                                <button class="status-btn present active" data-status="present" title="Present">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Present</span>
                                </button>
                                <button class="status-btn absent" data-status="absent" title="Absent">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Absent</span>
                                </button>
                                <button class="status-btn late" data-status="late" title="Late">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 6v6l4 2"></path>
                                    </svg>
                                    <span>Late</span>
                                </button>
                            </div>
                        </div>

                        <!-- Student Row 2 -->
                        <div class="student-row" data-student="2">
                            <div class="student-info">
                                <div class="student-avatar">MJ</div>
                                <div class="student-details">
                                    <span class="student-name">Maria Johnson</span>
                                    <span class="student-id">STU-00002</span>
                                </div>
                            </div>
                            <div class="attendance-buttons">
                                <button class="status-btn present active" data-status="present" title="Present">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Present</span>
                                </button>
                                <button class="status-btn absent" data-status="absent" title="Absent">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Absent</span>
                                </button>
                                <button class="status-btn late" data-status="late" title="Late">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 6v6l4 2"></path>
                                    </svg>
                                    <span>Late</span>
                                </button>
                            </div>
                        </div>

                        <!-- Student Row 3 -->
                        <div class="student-row" data-student="3">
                            <div class="student-info">
                                <div class="student-avatar">RG</div>
                                <div class="student-details">
                                    <span class="student-name">Robert Garcia</span>
                                    <span class="student-id">STU-00003</span>
                                </div>
                            </div>
                            <div class="attendance-buttons">
                                <button class="status-btn present" data-status="present" title="Present">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Present</span>
                                </button>
                                <button class="status-btn absent active" data-status="absent" title="Absent">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Absent</span>
                                </button>
                                <button class="status-btn late" data-status="late" title="Late">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 6v6l4 2"></path>
                                    </svg>
                                    <span>Late</span>
                                </button>
                            </div>
                        </div>

                        <!-- Student Row 4 -->
                        <div class="student-row" data-student="4">
                            <div class="student-info">
                                <div class="student-avatar">EW</div>
                                <div class="student-details">
                                    <span class="student-name">Emily Wilson</span>
                                    <span class="student-id">STU-00004</span>
                                </div>
                            </div>
                            <div class="attendance-buttons">
                                <button class="status-btn present" data-status="present" title="Present">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Present</span>
                                </button>
                                <button class="status-btn absent" data-status="absent" title="Absent">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Absent</span>
                                </button>
                                <button class="status-btn late active" data-status="late" title="Late">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 6v6l4 2"></path>
                                    </svg>
                                    <span>Late</span>
                                </button>
                            </div>
                        </div>

                        <!-- Student Row 5 -->
                        <div class="student-row" data-student="5">
                            <div class="student-info">
                                <div class="student-avatar">DL</div>
                                <div class="student-details">
                                    <span class="student-name">David Lee</span>
                                    <span class="student-id">STU-00005</span>
                                </div>
                            </div>
                            <div class="attendance-buttons">
                                <button class="status-btn present active" data-status="present" title="Present">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Present</span>
                                </button>
                                <button class="status-btn absent" data-status="absent" title="Absent">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Absent</span>
                                </button>
                                <button class="status-btn late" data-status="late" title="Late">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 6v6l4 2"></path>
                                    </svg>
                                    <span>Late</span>
                                </button>
                            </div>
                        </div>

                        <!-- Student Row 6 -->
                        <div class="student-row" data-student="6">
                            <div class="student-info">
                                <div class="student-avatar">SB</div>
                                <div class="student-details">
                                    <span class="student-name">Sarah Brown</span>
                                    <span class="student-id">STU-00006</span>
                                </div>
                            </div>
                            <div class="attendance-buttons">
                                <button class="status-btn present active" data-status="present" title="Present">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Present</span>
                                </button>
                                <button class="status-btn absent" data-status="absent" title="Absent">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Absent</span>
                                </button>
                                <button class="status-btn late" data-status="late" title="Late">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 6v6l4 2"></path>
                                    </svg>
                                    <span>Late</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="save-section">
                <button class="btn btn-secondary" id="cancelBtn">
                    Cancel
                </button>
                <button class="btn btn-primary save-btn" id="saveAttendance">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                    Save Attendance
                </button>
            </div>
        </div>
    </main>

    <!-- Include Modals -->
    <?php include '../modals/mark_attendance_modal/success_modal.php'; ?>
    <?php include '../modals/mark_attendance_modal/failed_modal.php'; ?>

    <script src="../js/teacher-dashboard.js"></script>
</body>
</html>
