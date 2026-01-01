<!-- Course Success Modal -->
<div class="modal-overlay" id="courseSuccessModal">
    <div class="modal-container modal-sm">
        <div class="modal-body text-center">
            <div class="modal-icon success">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <h2 class="modal-title">Course Created!</h2>
            <p class="modal-message" id="successMessage">Your course has been created successfully.</p>
            
            <div class="success-details">
                <div class="success-code-box">
                    <span class="code-label">Class Code</span>
                    <span class="code-value" id="successClassCode">ABC123</span>
                </div>
                <p class="code-hint">Share this code with your students to join the class</p>
            </div>
        </div>
        <div class="modal-footer centered">
            <button class="btn btn-primary btn-block" id="successOkBtn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                Got it
            </button>
        </div>
    </div>
</div>