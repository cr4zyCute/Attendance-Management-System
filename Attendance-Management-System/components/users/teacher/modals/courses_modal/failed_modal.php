<!-- Course Failed Modal -->
<div class="modal-overlay" id="courseFailedModal">
    <div class="modal-container modal-sm">
        <div class="modal-body text-center">
            <div class="modal-icon failed">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
            </div>
            <h2 class="modal-title">Failed to Create Course</h2>
            <p class="modal-message" id="failedMessage">Something went wrong. Please try again.</p>
            
            <div class="error-details" id="errorDetails">
                <div class="error-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span>Please check your connection and try again</span>
                </div>
            </div>
        </div>
        <div class="modal-footer centered">
            <button class="btn btn-secondary" id="failedCancelBtn">Cancel</button>
            <button class="btn btn-danger" id="failedRetryBtn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M23 4v6h-6M1 20v-6h6"></path>
                    <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"></path>
                </svg>
                Try Again
            </button>
        </div>
    </div>
</div>