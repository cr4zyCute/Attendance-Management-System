<!-- Add Course Modal -->
<div class="modal-overlay" id="addCourseModal">
    <div class="modal-container">
        <div class="modal-header">
            <div class="modal-course-info">
                <div class="modal-course-icon add-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M5 12h14"></path>
                    </svg>
                </div>
                <div class="modal-course-title">
                    <h2>Add New Course</h2>
                    <span class="modal-course-code">Create a new course for your students</span>
                </div>
            </div>
            <button class="modal-close" id="closeAddCourseModal">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div class="modal-body">
            <form id="addCourseForm" class="add-course-form">
                <!-- Course Name -->
                <div class="form-group">
                    <label class="form-label" for="courseName">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 016.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"></path>
                        </svg>
                        Course Name
                    </label>
                    <input type="text" id="courseName" class="form-input" placeholder="e.g., Mathematics" required>
                </div>

                <!-- Course Code -->
                <div class="form-group">
                    <label class="form-label" for="courseCode">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 18l6-6-6-6M8 6l-6 6 6 6"></path>
                        </svg>
                        Course Code
                    </label>
                    <input type="text" id="courseCode" class="form-input" placeholder="e.g., MATH101" required>
                </div>

                <!-- Schedule Row -->
                <div class="form-row">
                    <!-- Days -->
                    <div class="form-group">
                        <label class="form-label">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            Days
                        </label>
                        <div class="days-selector">
                            <label class="day-checkbox">
                                <input type="checkbox" name="days" value="Mon">
                                <span class="day-label">Mon</span>
                            </label>
                            <label class="day-checkbox">
                                <input type="checkbox" name="days" value="Tue">
                                <span class="day-label">Tue</span>
                            </label>
                            <label class="day-checkbox">
                                <input type="checkbox" name="days" value="Wed">
                                <span class="day-label">Wed</span>
                            </label>
                            <label class="day-checkbox">
                                <input type="checkbox" name="days" value="Thu">
                                <span class="day-label">Thu</span>
                            </label>
                            <label class="day-checkbox">
                                <input type="checkbox" name="days" value="Fri">
                                <span class="day-label">Fri</span>
                            </label>
                            <label class="day-checkbox">
                                <input type="checkbox" name="days" value="Sat">
                                <span class="day-label">Sat</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Time Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="courseTime">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            Time
                        </label>
                        <input type="time" id="courseTime" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="courseRoom">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Room
                        </label>
                        <input type="text" id="courseRoom" class="form-input" placeholder="e.g., Room 101">
                    </div>
                </div>

                <!-- Course Color -->
                <div class="form-group">
                    <label class="form-label">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                        Course Color
                    </label>
                    <div class="color-selector">
                        <label class="color-option">
                            <input type="radio" name="courseColor" value="#3b82f6" checked>
                            <span class="color-circle" style="background: #3b82f6;"></span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="courseColor" value="#8b5cf6">
                            <span class="color-circle" style="background: #8b5cf6;"></span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="courseColor" value="#84cc16">
                            <span class="color-circle" style="background: #84cc16;"></span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="courseColor" value="#f59e0b">
                            <span class="color-circle" style="background: #f59e0b;"></span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="courseColor" value="#fb923c">
                            <span class="color-circle" style="background: #fb923c;"></span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="courseColor" value="#ef4444">
                            <span class="color-circle" style="background: #ef4444;"></span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="courseColor" value="#ec4899">
                            <span class="color-circle" style="background: #ec4899;"></span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="courseColor" value="#6b7280">
                            <span class="color-circle" style="background: #6b7280;"></span>
                        </label>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="form-label" for="courseDescription">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="17" y1="10" x2="3" y2="10"></line>
                            <line x1="21" y1="6" x2="3" y2="6"></line>
                            <line x1="21" y1="14" x2="3" y2="14"></line>
                            <line x1="17" y1="18" x2="3" y2="18"></line>
                        </svg>
                        Description (Optional)
                    </label>
                    <textarea id="courseDescription" class="form-textarea" placeholder="Brief description of the course..." rows="3"></textarea>
                </div>

                <!-- Generated Class Code -->
                <div class="class-code-section">
                    <div class="class-code-header">
                        <span class="class-code-label">Class Code for Students</span>
                        <button type="button" class="regenerate-btn" id="regenerateCode" title="Generate new code">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M23 4v6h-6M1 20v-6h6"></path>
                                <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="class-code-display">
                        <span id="generatedClassCode">ABC123</span>
                        <button type="button" class="copy-btn" id="copyClassCode" title="Copy code">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="class-code-hint">Share this code with students to join your class</p>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="cancelAddCourse">Cancel</button>
            <button type="submit" form="addCourseForm" class="btn btn-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14"></path>
                </svg>
                Create Course
            </button>
        </div>
    </div>
</div>