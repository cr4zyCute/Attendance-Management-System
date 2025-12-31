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
                            <select id="classSelect" class="form-select">
                                <option value="">-- Select Class --</option>
                                <option value="math101">MATH101 - Mathematics (32 students)</option>
                                <option value="phy201">PHY201 - Physics (28 students)</option>
                                <option value="cs301" selected>CS301 - Computer Science (35 students)</option>
                                <option value="eng102">ENG102 - English (30 students)</option>
                                <option value="chem201">CHEM201 - Chemistry (31 students)</option>
                            </select>
                        </div>
                        <div class="selection-group">
                            <label for="dateSelect">Date</label>
                            <input type="date" id="dateSelect" class="form-input" value="2025-12-31">
                        </div>
                        <div class="selection-group">
                            <label for="timeSelect">Time</label>
                            <input type="time" id="timeSelect" class="form-input" value="13:00">
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
                <div class="action-right">
                    <button class="btn btn-outline mark-all-btn" data-status="present">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Mark All Present
                    </button>
                    <button class="btn btn-outline mark-all-btn" data-status="absent">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Mark All Absent
                    </button>
                </div>
            </div>

            <!-- Students List -->
            <div class="card students-card">
                <div class="card-header">
                    <h2 class="card-title">CS301 - Computer Science</h2>
                    <div class="search-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                        <input type="text" placeholder="Search student..." class="search-input">
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

    <script src="../js/teacher-dashboard.js"></script>
</body>
</html>
