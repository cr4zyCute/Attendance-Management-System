<!-- Edit Profile Modal -->
<div class="modal-overlay" id="editProfileModal">
    <div class="modal-container">
        <div class="modal-header">
            <h2>Edit Profile</h2>
            <button class="modal-close" id="closeEditModal">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Modal Tabs -->
        <div class="modal-tabs">
            <button class="modal-tab active" data-tab="profile">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                Profile
            </button>
            <button class="modal-tab" data-tab="security">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0110 0v4"></path>
                </svg>
                Security
            </button>
        </div>

        <div class="modal-body">
            <!-- Profile Tab Content -->
            <div class="tab-content active" id="tab-profile">
                <form id="editProfileForm">
                    <div class="form-group">
                        <label for="editName">Full Name</label>
                        <input type="text" id="editName" value="John Michael Student" placeholder="Enter your full name">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="editPhone">Phone</label>
                            <input type="tel" id="editPhone" value="+1 (555) 123-4567" placeholder="Enter your phone">
                        </div>
                        <div class="form-group">
                            <label for="editDob">Date of Birth</label>
                            <input type="date" id="editDob" value="2005-03-15">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editDepartment">Department</label>
                        <select id="editDepartment">
                            <option value="cs" selected>Computer Science</option>
                            <option value="math">Mathematics</option>
                            <option value="physics">Physics</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="english">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Address</label>
                        <textarea id="editAddress" rows="2" placeholder="Enter your address">123 Student Lane, College Town, ST 12345</textarea>
                    </div>
                </form>
            </div>

            <!-- Security Tab Content -->
            <div class="tab-content" id="tab-security">
                <form id="securityForm">
                    <!-- Change Email Section -->
                    <div class="security-section">
                        <h3 class="section-title">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            Change Email
                        </h3>
                        <div class="form-group">
                            <label for="currentEmail">Current Email</label>
                            <input type="email" id="currentEmail" value="john.student@school.edu" disabled>
                        </div>
                        <div class="form-group">
                            <label for="newEmail">New Email</label>
                            <input type="email" id="newEmail" placeholder="Enter new email address">
                        </div>
                        <div class="form-group">
                            <label for="confirmEmail">Confirm New Email</label>
                            <input type="email" id="confirmEmail" placeholder="Confirm new email address">
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <!-- Change Password Section -->
                    <div class="security-section">
                        <h3 class="section-title">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0110 0v4"></path>
                            </svg>
                            Change Password
                        </h3>
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <div class="password-input-wrapper">
                                <input type="password" id="currentPassword" placeholder="Enter current password">
                                <button type="button" class="toggle-password" data-target="currentPassword" title="Show password">
                                    <svg class="eye-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <svg class="eye-closed" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;">
                                        <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"></path>
                                        <line x1="1" y1="1" x2="23" y2="23"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <div class="password-input-wrapper">
                                <input type="password" id="newPassword" placeholder="Enter new password">
                                <button type="button" class="toggle-password" data-target="newPassword" title="Show password">
                                    <svg class="eye-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <svg class="eye-closed" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;">
                                        <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"></path>
                                        <line x1="1" y1="1" x2="23" y2="23"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="password-strength" id="passwordStrength"></div>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm New Password</label>
                            <div class="password-input-wrapper">
                                <input type="password" id="confirmPassword" placeholder="Confirm new password">
                                <button type="button" class="toggle-password" data-target="confirmPassword" title="Show password">
                                    <svg class="eye-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <svg class="eye-closed" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;">
                                        <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"></path>
                                        <line x1="1" y1="1" x2="23" y2="23"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary" id="cancelEdit">Cancel</button>
            <button class="btn btn-primary" id="saveProfile">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                    <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                Save Changes
            </button>
        </div>
    </div>
</div>
