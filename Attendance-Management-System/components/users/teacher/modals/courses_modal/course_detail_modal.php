<!-- Course Detail Modal -->
<div class="modal-overlay" id="courseDetailModal">
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
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 010 7.75"></path>
                        </svg>
                        <div class="detail-content">
                            <span class="detail-label">Enrolled Students</span>
                            <span class="detail-value" id="modalStudentCount">32 students</span>
                        </div>
                    </div>
                    <div class="modal-detail-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                        <div class="detail-content">
                            <span class="detail-label">Avg. Attendance</span>
                            <span class="detail-value" id="modalAttendance">92%</span>
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

            <!-- Class Code Section -->
            <div class="modal-section">
                <h3 class="modal-section-title">Class Code</h3>
                <div class="preview-class-code-section">
                    <div class="preview-code-box">
                        <span class="preview-code-value" id="modalClassCode">XYZ789</span>
                        <button type="button" class="copy-code-btn" id="copyPreviewCode" title="Copy code">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"></path>
                            </svg>
                            <span class="copy-text">Copy</span>
                        </button>
                    </div>
                    <p class="preview-code-hint">Share this code with students to join your class</p>
                </div>
            </div>

            <!-- Enrolled Students Section -->
            <div class="modal-section">
                <div class="section-header">
                    <h3 class="modal-section-title">Enrolled Students</h3>
                    <div class="student-search">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                        <input type="text" id="studentSearchInput" placeholder="Search students...">
                    </div>
                </div>
                <div class="students-list" id="modalStudentsList">
                    <!-- Student items will be populated dynamically -->
                    <div class="student-item">
                        <div class="student-avatar">JS</div>
                        <div class="student-info">
                            <span class="student-name">John Smith</span>
                            <span class="student-id">STU-2024-001</span>
                        </div>
                        <div class="student-attendance good">
                            <span class="attendance-percent">95%</span>
                            <span class="attendance-label">Attendance</span>
                        </div>
                    </div>
                    <div class="student-item">
                        <div class="student-avatar">ED</div>
                        <div class="student-info">
                            <span class="student-name">Emily Davis</span>
                            <span class="student-id">STU-2024-002</span>
                        </div>
                        <div class="student-attendance good">
                            <span class="attendance-percent">92%</span>
                            <span class="attendance-label">Attendance</span>
                        </div>
                    </div>
                    <div class="student-item">
                        <div class="student-avatar">MW</div>
                        <div class="student-info">
                            <span class="student-name">Michael Wilson</span>
                            <span class="student-id">STU-2024-003</span>
                        </div>
                        <div class="student-attendance warning">
                            <span class="attendance-percent">78%</span>
                            <span class="attendance-label">Attendance</span>
                        </div>
                    </div>
                    <div class="student-item">
                        <div class="student-avatar">SJ</div>
                        <div class="student-info">
                            <span class="student-name">Sarah Johnson</span>
                            <span class="student-id">STU-2024-004</span>
                        </div>
                        <div class="student-attendance good">
                            <span class="attendance-percent">98%</span>
                            <span class="attendance-label">Attendance</span>
                        </div>
                    </div>
                    <div class="student-item">
                        <div class="student-avatar">RB</div>
                        <div class="student-info">
                            <span class="student-name">Robert Brown</span>
                            <span class="student-id">STU-2024-005</span>
                        </div>
                        <div class="student-attendance danger">
                            <span class="attendance-percent">65%</span>
                            <span class="attendance-label">Attendance</span>
                        </div>
                    </div>
                    <div class="student-item">
                        <div class="student-avatar">AT</div>
                        <div class="student-info">
                            <span class="student-name">Amanda Taylor</span>
                            <span class="student-id">STU-2024-006</span>
                        </div>
                        <div class="student-attendance good">
                            <span class="attendance-percent">88%</span>
                            <span class="attendance-label">Attendance</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary" id="closeModalBtn">Close</button>
            <button class="btn btn-primary" id="markAttendanceBtn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 11l3 3L22 4"></path>
                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                </svg>
                Mark Attendance
            </button>
        </div>
    </div>
</div>