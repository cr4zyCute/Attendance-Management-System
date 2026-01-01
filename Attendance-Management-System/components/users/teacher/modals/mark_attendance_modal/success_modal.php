<!-- Attendance Success Modal -->
<div class="modal-overlay" id="attendanceSuccessModal">
    <div class="modal-container success-modal">
        <div class="success-modal-content">
            <div class="success-icon-wrapper">
                <div class="success-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                <div class="success-ripple"></div>
            </div>
            <h3 class="success-title" id="attendanceSuccessTitle">Attendance Saved!</h3>
            <p class="success-message" id="attendanceSuccessMessage">Attendance for <strong>CS301 - Computer Science</strong> has been recorded successfully.</p>
            <div class="success-summary">
                <div class="summary-stat">
                    <span class="stat-value present">28</span>
                    <span class="stat-label">Present</span>
                </div>
                <div class="summary-stat">
                    <span class="stat-value absent">4</span>
                    <span class="stat-label">Absent</span>
                </div>
                <div class="summary-stat">
                    <span class="stat-value late">3</span>
                    <span class="stat-label">Late</span>
                </div>
            </div>
            <button class="btn btn-primary success-btn" id="attendanceSuccessOkBtn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                Done
            </button>
        </div>
    </div>
</div>
