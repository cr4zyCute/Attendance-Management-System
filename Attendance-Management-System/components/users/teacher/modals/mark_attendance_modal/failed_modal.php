<!-- Attendance Failed Modal -->
<div class="modal-overlay" id="attendanceFailedModal">
    <div class="modal-container failed-modal">
        <div class="failed-modal-content">
            <div class="failed-icon-wrapper">
                <div class="failed-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                </div>
                <div class="failed-ripple"></div>
            </div>
            <h3 class="failed-title" id="attendanceFailedTitle">Failed to Save</h3>
            <p class="failed-message" id="attendanceFailedMessage">Unable to save attendance. Please check your connection and try again.</p>
            <div class="failed-actions">
                <button class="btn btn-secondary" id="attendanceFailedCancelBtn">Cancel</button>
                <button class="btn btn-danger" id="attendanceFailedRetryBtn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M23 4v6h-6"></path>
                        <path d="M1 20v-6h6"></path>
                        <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"></path>
                    </svg>
                    Try Again
                </button>
            </div>
        </div>
    </div>
</div>
