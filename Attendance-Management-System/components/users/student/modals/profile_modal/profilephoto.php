<!-- Profile Photo Modal -->
<div class="modal-overlay" id="profilePhotoModal">
    <div class="modal-container">
        <div class="modal-header">
            <h2>Change Profile Photo</h2>
            <button class="modal-close" id="closeProfilePhotoModal">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Modal Tabs -->
        <div class="modal-tabs">
            <button class="modal-tab active" data-tab="avatar-colors">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
                Avatar Color
            </button>
            <button class="modal-tab" data-tab="avatar-upload">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" y1="3" x2="12" y2="15"></line>
                </svg>
                Upload Photo
            </button>
        </div>

        <div class="modal-body">
            <!-- Avatar Preview -->
            <div class="avatar-preview-container">
                <div class="avatar-preview" id="avatarPreview">
                    <span class="avatar-initials">JS</span>
                    <img class="avatar-image" id="avatarImagePreview" style="display: none;">
                </div>
                <p class="preview-hint">Preview</p>
            </div>

            <!-- Avatar Colors Tab -->
            <div class="tab-content active" id="tab-avatar-colors">
                <p class="tab-description">Choose a background color for your avatar</p>
                <div class="avatar-color-grid">
                    <button class="avatar-color-option selected" data-color="#84cc16" style="background: #84cc16;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#22c55e" style="background: #22c55e;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#14b8a6" style="background: #14b8a6;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#06b6d4" style="background: #06b6d4;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#3b82f6" style="background: #3b82f6;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#6366f1" style="background: #6366f1;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#8b5cf6" style="background: #8b5cf6;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#a855f7" style="background: #a855f7;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#ec4899" style="background: #ec4899;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#f43f5e" style="background: #f43f5e;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#ef4444" style="background: #ef4444;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#f97316" style="background: #f97316;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#f59e0b" style="background: #f59e0b;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#eab308" style="background: #eab308;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#1a1a1a" style="background: #1a1a1a;">
                        <span>JS</span>
                    </button>
                    <button class="avatar-color-option" data-color="#374151" style="background: #374151;">
                        <span>JS</span>
                    </button>
                </div>
            </div>

            <!-- Upload Photo Tab -->
            <div class="tab-content" id="tab-avatar-upload">
                <p class="tab-description">Upload a photo from your device</p>
                <div class="upload-area" id="avatarUploadArea">
                    <input type="file" id="avatarImageInput" accept="image/jpeg,image/png" hidden>
                    <div class="upload-placeholder">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <p>Click to upload or drag and drop</p>
                        <span>PNG, JPG up to 1GB</span>
                    </div>
                </div>
                
                <!-- Image Adjustment Controls -->
                <div class="image-adjust-controls" id="avatarAdjustControls" style="display: none;">
                    <div class="adjust-control">
                        <label>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                <line x1="11" y1="8" x2="11" y2="14"></line>
                                <line x1="8" y1="11" x2="14" y2="11"></line>
                            </svg>
                            Zoom
                        </label>
                        <input type="range" id="avatarZoom" min="100" max="200" value="100">
                        <span id="avatarZoomValue">100%</span>
                    </div>
                    <div class="adjust-control">
                        <label>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                            Position X
                        </label>
                        <input type="range" id="avatarPosX" min="-50" max="50" value="0">
                        <span id="avatarPosXValue">0%</span>
                    </div>
                    <div class="adjust-control">
                        <label>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <polyline points="19 12 12 19 5 12"></polyline>
                            </svg>
                            Position Y
                        </label>
                        <input type="range" id="avatarPosY" min="-50" max="50" value="0">
                        <span id="avatarPosYValue">0%</span>
                    </div>
                    <button class="btn btn-sm btn-secondary" id="resetAvatarAdjust">Reset</button>
                </div>
                
                <div class="upload-actions" id="uploadActions" style="display: none;">
                    <button class="btn btn-secondary btn-sm" id="removeAvatar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                        </svg>
                        Remove Photo
                    </button>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary" id="cancelProfilePhoto">Cancel</button>
            <button class="btn btn-primary" id="saveProfilePhoto">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                Apply
            </button>
        </div>
    </div>
</div>
