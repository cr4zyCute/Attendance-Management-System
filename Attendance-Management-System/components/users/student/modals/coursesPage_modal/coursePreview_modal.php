<!-- Course Detail/Preview Modal -->
<div class="modal-overlay" id="courseModal">
    <div class="modal-container">
        <div class="modal-header">
            <div class="modal-course-info">
                <div class="modal-course-icon" id="modalCourseIcon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16v16H4z"></path>
                    </svg>
                </div>
                <div class="modal-course-title">
                    <h2 id="modalCourseName">Mathematics</h2>
                    <span class="modal-course-code" id="modalCourseCode">MATH101</span>
                </div>
            </div>
            <button class="modal-close" id="closeModal">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div class="modal-body">
            <!-- Course Details Section -->
            <div class="modal-section">
                <h3 class="modal-section-title">Course Details</h3>
                <div class="modal-details-grid">
                    <div class="modal-detail-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <div class="detail-content">
                            <span class="detail-label">Teacher</span>
                            <span class="detail-value" id="modalTeacher">Mr. Johnson</span>
                        </div>
                    </div>
                    <div class="modal-detail-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 6v6l4 2"></path>
                        </svg>
                        <div class="detail-content">
                            <span class="detail-label">Schedule</span>
                            <span class="detail-value" id="modalSchedule">Mon, Wed, Fri - 8:00 AM</span>
                        </div>
                    </div>
                    <div class="modal-detail-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                        <div class="detail-content">
                            <span class="detail-label">Attendance Rate</span>
                            <span class="detail-value" id="modalAttendance">90%</span>
                        </div>
                    </div>
                    <div class="modal-detail-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <div class="detail-content">
                            <span class="detail-label">Status</span>
                            <span class="detail-value status-badge" id="modalStatus">Active</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance History Section -->
            <div class="modal-section">
                <h3 class="modal-section-title">Attendance History</h3>
                <div class="modal-attendance-list" id="modalAttendanceList">
                    <div class="attendance-row">
                        <div class="attendance-date">
                            <span class="att-day">21</span>
                            <span class="att-month">Dec</span>
                        </div>
                        <div class="attendance-time">08:00 AM</div>
                        <span class="attendance-status present">Present</span>
                    </div>
                    <div class="attendance-row">
                        <div class="attendance-date">
                            <span class="att-day">19</span>
                            <span class="att-month">Dec</span>
                        </div>
                        <div class="attendance-time">08:00 AM</div>
                        <span class="attendance-status present">Present</span>
                    </div>
                    <div class="attendance-row">
                        <div class="attendance-date">
                            <span class="att-day">17</span>
                            <span class="att-month">Dec</span>
                        </div>
                        <div class="attendance-time">08:00 AM</div>
                        <span class="attendance-status late">Late</span>
                    </div>
                    <div class="attendance-row">
                        <div class="attendance-date">
                            <span class="att-day">15</span>
                            <span class="att-month">Dec</span>
                        </div>
                        <div class="attendance-time">08:00 AM</div>
                        <span class="attendance-status present">Present</span>
                    </div>
                    <div class="attendance-row">
                        <div class="attendance-date">
                            <span class="att-day">13</span>
                            <span class="att-month">Dec</span>
                        </div>
                        <div class="attendance-time">08:00 AM</div>
                        <span class="attendance-status absent">Absent</span>
                    </div>
                    <div class="attendance-row">
                        <div class="attendance-date">
                            <span class="att-day">11</span>
                            <span class="att-month">Dec</span>
                        </div>
                        <div class="attendance-time">08:00 AM</div>
                        <span class="attendance-status present">Present</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
