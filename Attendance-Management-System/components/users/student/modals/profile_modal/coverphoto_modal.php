<!-- Cover Photo Modal -->
<div class="modal-overlay" id="coverPhotoModal">
    <div class="modal-container">
        <div class="modal-header">
            <h2>Change Cover Photo</h2>
            <button class="modal-close" id="closeCoverModal">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Modal Tabs -->
        <div class="modal-tabs">
            <button class="modal-tab active" data-tab="colors">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 2a10 10 0 0 1 0 20"></path>
                    <path d="M12 2a10 10 0 0 0 0 20"></path>
                </svg>
                Colors
            </button>
            <button class="modal-tab" data-tab="gradients">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                    <path d="M3 9h18"></path>
                    <path d="M3 15h18"></path>
                </svg>
                Gradients
            </button>
            <button class="modal-tab" data-tab="upload">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" y1="3" x2="12" y2="15"></line>
                </svg>
                Upload
            </button>
        </div>

        <div class="modal-body">
            <!-- Preview -->
            <div class="cover-preview" id="coverPreview">
                <span class="preview-label">Preview</span>
            </div>

            <!-- Colors Tab -->
            <div class="tab-content active" id="tab-colors">
                <p class="tab-description">Choose a solid color for your cover</p>
                <div class="color-grid">
                    <button class="color-option" data-color="#84cc16" style="background: #84cc16;" title="Lime"></button>
                    <button class="color-option" data-color="#22c55e" style="background: #22c55e;" title="Green"></button>
                    <button class="color-option" data-color="#14b8a6" style="background: #14b8a6;" title="Teal"></button>
                    <button class="color-option" data-color="#06b6d4" style="background: #06b6d4;" title="Cyan"></button>
                    <button class="color-option" data-color="#3b82f6" style="background: #3b82f6;" title="Blue"></button>
                    <button class="color-option" data-color="#6366f1" style="background: #6366f1;" title="Indigo"></button>
                    <button class="color-option" data-color="#8b5cf6" style="background: #8b5cf6;" title="Violet"></button>
                    <button class="color-option" data-color="#a855f7" style="background: #a855f7;" title="Purple"></button>
                    <button class="color-option" data-color="#d946ef" style="background: #d946ef;" title="Fuchsia"></button>
                    <button class="color-option" data-color="#ec4899" style="background: #ec4899;" title="Pink"></button>
                    <button class="color-option" data-color="#f43f5e" style="background: #f43f5e;" title="Rose"></button>
                    <button class="color-option" data-color="#ef4444" style="background: #ef4444;" title="Red"></button>
                    <button class="color-option" data-color="#f97316" style="background: #f97316;" title="Orange"></button>
                    <button class="color-option" data-color="#f59e0b" style="background: #f59e0b;" title="Amber"></button>
                    <button class="color-option" data-color="#eab308" style="background: #eab308;" title="Yellow"></button>
                    <button class="color-option" data-color="#1a1a1a" style="background: #1a1a1a;" title="Black"></button>
                    <button class="color-option" data-color="#374151" style="background: #374151;" title="Gray"></button>
                    <button class="color-option" data-color="#64748b" style="background: #64748b;" title="Slate"></button>
                </div>
            </div>

            <!-- Gradients Tab -->
            <div class="tab-content" id="tab-gradients">
                <p class="tab-description">Choose a gradient for your cover</p>
                <div class="gradient-grid">
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #84cc16 100%)" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #84cc16 100%);" title="Default"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #667eea 0%, #764ba2 100%)" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" title="Purple Dream"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #f093fb 0%, #f5576c 100%)" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);" title="Pink Sunset"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);" title="Ocean Blue"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);" title="Fresh Mint"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #fa709a 0%, #fee140 100%)" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);" title="Warm Flame"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #a8edea 0%, #fed6e3 100%)" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);" title="Soft Pink"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%)" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);" title="Rose Water"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%)" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);" title="Peach"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%)" style="background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);" title="Sky"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%)" style="background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);" title="Night Sky"></button>
                    <button class="gradient-option" data-gradient="linear-gradient(135deg, #11998e 0%, #38ef7d 100%)" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);" title="Forest"></button>
                </div>
            </div>

            <!-- Upload Tab -->
            <div class="tab-content" id="tab-upload">
                <p class="tab-description">Upload an image from your device</p>
                <div class="upload-area" id="uploadArea">
                    <input type="file" id="coverImageInput" accept="image/jpeg,image/png" hidden>
                    <div class="upload-placeholder">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <p>Click to upload or drag and drop</p>
                        <span>PNG, JPG up to 1GB</span>
                    </div>
                </div>
                
                <!-- Image Adjustment Controls -->
                <div class="image-adjust-controls" id="coverAdjustControls" style="display: none;">
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
                        <input type="range" id="coverZoom" min="100" max="200" value="100">
                        <span id="coverZoomValue">100%</span>
                    </div>
                    <div class="adjust-control">
                        <label>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                            Position X
                        </label>
                        <input type="range" id="coverPosX" min="-50" max="50" value="0">
                        <span id="coverPosXValue">0%</span>
                    </div>
                    <div class="adjust-control">
                        <label>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <polyline points="19 12 12 19 5 12"></polyline>
                            </svg>
                            Position Y
                        </label>
                        <input type="range" id="coverPosY" min="-50" max="50" value="0">
                        <span id="coverPosYValue">0%</span>
                    </div>
                    <button class="btn btn-sm btn-secondary" id="resetCoverAdjust">Reset</button>
                </div>
                
                <div class="upload-actions" id="coverUploadActions" style="display: none;">
                    <button class="btn btn-secondary btn-sm" id="removeCoverPhoto">
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
            <button class="btn btn-secondary" id="cancelCover">Cancel</button>
            <button class="btn btn-primary" id="saveCover">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                Apply
            </button>
        </div>
    </div>
</div>
