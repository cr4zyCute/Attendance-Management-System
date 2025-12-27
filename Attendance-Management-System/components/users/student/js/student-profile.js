// Student Profile JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initEditProfileModal();
    initModalTabs();
    initPasswordToggle();
    initPasswordStrength();
});

function initEditProfileModal() {
    const modal = document.getElementById('editProfileModal');
    const editBtn = document.getElementById('editProfileBtn');
    const closeBtn = document.getElementById('closeEditModal');
    const cancelBtn = document.getElementById('cancelEdit');
    const saveBtn = document.getElementById('saveProfile');

    if (!modal || !editBtn) return;

    function openModal() {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        // Reset to profile tab when opening
        switchTab('profile');
    }

    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    editBtn.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', function(e) {
        if (e.target === modal) closeModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeModal();
        }
    });

    // Save profile
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            const activeTab = document.querySelector('.modal-tab.active')?.dataset.tab;
            
            if (activeTab === 'profile') {
                saveProfileData();
            } else if (activeTab === 'security') {
                saveSecurityData();
            }
        });
    }
}

function saveProfileData() {
    const formData = {
        name: document.getElementById('editName')?.value,
        phone: document.getElementById('editPhone')?.value,
        dob: document.getElementById('editDob')?.value,
        department: document.getElementById('editDepartment')?.value,
        address: document.getElementById('editAddress')?.value
    };

    if (!formData.name) {
        showFailedModal('Required Field', 'Please enter your full name.');
        return;
    }

    // TODO: Call API to save profile
    console.log('Saving profile:', formData);
    closeModalById('editProfileModal');
    showSuccessModal('Profile Updated!', 'Your profile information has been saved successfully.');
}

function saveSecurityData() {
    const newEmail = document.getElementById('newEmail')?.value;
    const confirmEmail = document.getElementById('confirmEmail')?.value;
    const currentPassword = document.getElementById('currentPassword')?.value;
    const newPassword = document.getElementById('newPassword')?.value;
    const confirmPassword = document.getElementById('confirmPassword')?.value;

    // Validate email change
    if (newEmail || confirmEmail) {
        if (newEmail !== confirmEmail) {
            showFailedModal('Email Mismatch', 'Email addresses do not match.');
            return;
        }
    }

    // Validate password change
    if (newPassword || confirmPassword || currentPassword) {
        if (!currentPassword) {
            showFailedModal('Required Field', 'Please enter your current password.');
            return;
        }
        if (newPassword !== confirmPassword) {
            showFailedModal('Password Mismatch', 'New passwords do not match.');
            return;
        }
        if (newPassword && newPassword.length < 8) {
            showFailedModal('Weak Password', 'Password must be at least 8 characters.');
            return;
        }
    }

    const securityData = {
        newEmail: newEmail || null,
        currentPassword: currentPassword || null,
        newPassword: newPassword || null
    };

    // TODO: Call API to update security settings
    console.log('Saving security:', securityData);
    closeModalById('editProfileModal');
    showSuccessModal('Security Updated!', 'Your security settings have been saved successfully.');
}

function closeModalById(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }
}

function initModalTabs() {
    const tabs = document.querySelectorAll('.modal-tab');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabName = this.dataset.tab;
            switchTab(tabName);
        });
    });
}

function switchTab(tabName) {
    // Update tab buttons
    document.querySelectorAll('.modal-tab').forEach(tab => {
        tab.classList.toggle('active', tab.dataset.tab === tabName);
    });

    // Update tab content
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.toggle('active', content.id === `tab-${tabName}`);
    });
}

function initPasswordToggle() {
    const toggleBtns = document.querySelectorAll('.toggle-password');
    
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.dataset.target;
            const input = document.getElementById(targetId);
            const eyeOpen = this.querySelector('.eye-open');
            const eyeClosed = this.querySelector('.eye-closed');
            
            if (input) {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                
                // Toggle icons
                if (eyeOpen && eyeClosed) {
                    eyeOpen.style.display = isPassword ? 'none' : 'block';
                    eyeClosed.style.display = isPassword ? 'block' : 'none';
                }
                
                this.classList.toggle('active', isPassword);
                this.title = isPassword ? 'Hide password' : 'Show password';
            }
        });
    });
}

function initPasswordStrength() {
    const passwordInput = document.getElementById('newPassword');
    const strengthIndicator = document.getElementById('passwordStrength');
    
    if (!passwordInput || !strengthIndicator) return;

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strength = calculatePasswordStrength(password);
        
        strengthIndicator.className = 'password-strength';
        if (password.length > 0) {
            strengthIndicator.classList.add(strength);
        }
    });
}

function calculatePasswordStrength(password) {
    let score = 0;
    
    if (password.length >= 8) score++;
    if (password.length >= 12) score++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) score++;
    if (/\d/.test(password)) score++;
    if (/[^a-zA-Z0-9]/.test(password)) score++;
    
    if (score <= 2) return 'weak';
    if (score <= 4) return 'medium';
    return 'strong';
}


// Cover Photo Modal
document.addEventListener('DOMContentLoaded', function() {
    initCoverPhotoModal();
});

function initCoverPhotoModal() {
    const modal = document.getElementById('coverPhotoModal');
    const openBtn = document.getElementById('changeCoverBtn');
    const closeBtn = document.getElementById('closeCoverModal');
    const cancelBtn = document.getElementById('cancelCover');
    const saveBtn = document.getElementById('saveCover');
    const preview = document.getElementById('coverPreview');
    const profileCover = document.getElementById('profileCover');
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('coverImageInput');
    const adjustControls = document.getElementById('coverAdjustControls');

    if (!modal || !openBtn) return;

    let selectedCover = null;
    let selectedType = null;
    let imageAdjust = { zoom: 100, posX: 0, posY: 0 };

    // Tab switching for cover modal
    const coverTabs = modal.querySelectorAll('.modal-tab');
    coverTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabName = this.dataset.tab;
            coverTabs.forEach(t => t.classList.toggle('active', t.dataset.tab === tabName));
            modal.querySelectorAll('.tab-content').forEach(content => {
                content.classList.toggle('active', content.id === `tab-${tabName}`);
            });
        });
    });

    function openModal() {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        selectedCover = null;
        selectedType = null;
        imageAdjust = { zoom: 100, posX: 0, posY: 0 };
        clearSelections();
        resetAdjustControls();
        if (adjustControls) adjustControls.style.display = 'none';
        if (uploadArea) uploadArea.style.display = 'block'; // Reset upload area visibility
        if (fileInput) fileInput.value = ''; // Clear file input
        
        // Hide remove button
        const coverUploadActions = document.getElementById('coverUploadActions');
        if (coverUploadActions) coverUploadActions.style.display = 'none';
        
        // Remove any uploaded image from preview
        const img = preview.querySelector('img');
        if (img) img.remove();
        
        const currentBg = profileCover.style.background || 'linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #84cc16 100%)';
        preview.style.background = currentBg;
    }

    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    function clearSelections() {
        modal.querySelectorAll('.color-option, .gradient-option').forEach(opt => {
            opt.classList.remove('selected');
        });
    }

    function resetAdjustControls() {
        const zoomInput = document.getElementById('coverZoom');
        const posXInput = document.getElementById('coverPosX');
        const posYInput = document.getElementById('coverPosY');
        if (zoomInput) { zoomInput.value = 100; document.getElementById('coverZoomValue').textContent = '100%'; }
        if (posXInput) { posXInput.value = 0; document.getElementById('coverPosXValue').textContent = '0%'; }
        if (posYInput) { posYInput.value = 0; document.getElementById('coverPosYValue').textContent = '0%'; }
        imageAdjust = { zoom: 100, posX: 0, posY: 0 };
    }

    function updatePreviewImage() {
        const img = preview.querySelector('img');
        if (img && selectedType === 'image') {
            img.style.transform = `scale(${imageAdjust.zoom / 100})`;
            img.style.objectPosition = `${50 + imageAdjust.posX}% ${50 + imageAdjust.posY}%`;
        }
    }

    openBtn.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) { if (e.target === modal) closeModal(); });

    // Color selection
    modal.querySelectorAll('.color-option').forEach(option => {
        option.addEventListener('click', function() {
            clearSelections();
            this.classList.add('selected');
            selectedCover = this.dataset.color;
            selectedType = 'color';
            preview.style.background = selectedCover;
            const img = preview.querySelector('img');
            if (img) img.remove();
            if (adjustControls) adjustControls.style.display = 'none';
        });
    });

    // Gradient selection
    modal.querySelectorAll('.gradient-option').forEach(option => {
        option.addEventListener('click', function() {
            clearSelections();
            this.classList.add('selected');
            selectedCover = this.dataset.gradient;
            selectedType = 'gradient';
            preview.style.background = selectedCover;
            const img = preview.querySelector('img');
            if (img) img.remove();
            if (adjustControls) adjustControls.style.display = 'none';
        });
    });

    // Upload
    if (uploadArea && fileInput) {
        uploadArea.addEventListener('click', () => fileInput.click());
        uploadArea.addEventListener('dragover', (e) => { e.preventDefault(); uploadArea.classList.add('dragover'); });
        uploadArea.addEventListener('dragleave', () => { uploadArea.classList.remove('dragover'); });
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
                handleImageUpload(file);
            } else if (file) {
                showFailedModal('Invalid File Type', 'Please upload only JPEG or PNG images.');
            }
        });
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) handleImageUpload(this.files[0]);
        });
    }

    function handleImageUpload(file) {
        const allowedTypes = ['image/jpeg', 'image/png'];
        if (!allowedTypes.includes(file.type)) { showFailedModal('Invalid File Type', 'Please upload only JPEG or PNG images.'); return; }
        if (file.size > 1024 * 1024 * 1024) { showFailedModal('File Too Large', 'Image size must be less than 1GB.'); return; }
        const reader = new FileReader();
        reader.onload = function(e) {
            selectedCover = e.target.result;
            selectedType = 'image';
            clearSelections();
            resetAdjustControls();
            
            let img = preview.querySelector('img');
            if (!img) {
                img = document.createElement('img');
                preview.appendChild(img);
            }
            img.src = selectedCover;
            img.style.transform = 'scale(1)';
            img.style.objectPosition = '50% 50%';
            
            // Hide upload area, show controls
            if (uploadArea) uploadArea.style.display = 'none';
            if (adjustControls) adjustControls.style.display = 'block';
            
            // Show remove button
            const coverUploadActions = document.getElementById('coverUploadActions');
            if (coverUploadActions) coverUploadActions.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    // Remove cover photo
    const removeCoverBtn = document.getElementById('removeCoverPhoto');
    if (removeCoverBtn) {
        removeCoverBtn.addEventListener('click', function() {
            selectedCover = null;
            selectedType = null;
            
            // Remove image from preview
            const img = preview.querySelector('img');
            if (img) img.remove();
            
            // Reset to default gradient
            preview.style.background = 'linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #84cc16 100%)';
            
            // Show upload area, hide controls
            if (uploadArea) uploadArea.style.display = 'block';
            if (adjustControls) adjustControls.style.display = 'none';
            
            // Hide remove button
            const coverUploadActions = document.getElementById('coverUploadActions');
            if (coverUploadActions) coverUploadActions.style.display = 'none';
            
            if (fileInput) fileInput.value = '';
            resetAdjustControls();
        });
    }

    // Adjustment controls
    const zoomInput = document.getElementById('coverZoom');
    const posXInput = document.getElementById('coverPosX');
    const posYInput = document.getElementById('coverPosY');
    const resetBtn = document.getElementById('resetCoverAdjust');

    if (zoomInput) {
        zoomInput.addEventListener('input', function() {
            imageAdjust.zoom = parseInt(this.value);
            document.getElementById('coverZoomValue').textContent = this.value + '%';
            updatePreviewImage();
        });
    }
    if (posXInput) {
        posXInput.addEventListener('input', function() {
            imageAdjust.posX = parseInt(this.value);
            document.getElementById('coverPosXValue').textContent = this.value + '%';
            updatePreviewImage();
        });
    }
    if (posYInput) {
        posYInput.addEventListener('input', function() {
            imageAdjust.posY = parseInt(this.value);
            document.getElementById('coverPosYValue').textContent = this.value + '%';
            updatePreviewImage();
        });
    }
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            resetAdjustControls();
            updatePreviewImage();
        });
    }

    // Save
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            if (!selectedCover) { showFailedModal('No Selection', 'Please select a cover option.'); return; }

            if (selectedType === 'image') {
                const posX = 50 + imageAdjust.posX;
                const posY = 50 + imageAdjust.posY;
                const zoom = imageAdjust.zoom;
                profileCover.style.background = `url(${selectedCover}) ${posX}% ${posY}% / ${zoom}% no-repeat`;
            } else {
                profileCover.style.background = selectedCover;
            }

            console.log('Cover saved:', { type: selectedType, adjust: imageAdjust });
            closeModal();
        });
    }
}


// Profile Photo Modal
document.addEventListener('DOMContentLoaded', function() {
    initProfilePhotoModal();
});

function initProfilePhotoModal() {
    const modal = document.getElementById('profilePhotoModal');
    const openBtn = document.getElementById('changeAvatarBtn');
    const closeBtn = document.getElementById('closeProfilePhotoModal');
    const cancelBtn = document.getElementById('cancelProfilePhoto');
    const saveBtn = document.getElementById('saveProfilePhoto');
    const preview = document.getElementById('avatarPreview');
    const previewInitials = preview?.querySelector('.avatar-initials');
    const previewImage = document.getElementById('avatarImagePreview');
    const profileAvatar = document.getElementById('profileAvatar');
    const uploadArea = document.getElementById('avatarUploadArea');
    const fileInput = document.getElementById('avatarImageInput');
    const uploadActions = document.getElementById('uploadActions');
    const removeBtn = document.getElementById('removeAvatar');
    const adjustControls = document.getElementById('avatarAdjustControls');

    if (!modal || !openBtn) return;

    let selectedColor = '#84cc16';
    let selectedImage = null;
    let useImage = false;
    let imageAdjust = { zoom: 100, posX: 0, posY: 0 };

    // Tab switching
    const photoTabs = modal.querySelectorAll('.modal-tab');
    photoTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabName = this.dataset.tab;
            photoTabs.forEach(t => t.classList.toggle('active', t.dataset.tab === tabName));
            modal.querySelectorAll('.tab-content').forEach(content => {
                content.classList.toggle('active', content.id === `tab-${tabName}`);
            });
        });
    });

    function resetAdjustControls() {
        const zoomInput = document.getElementById('avatarZoom');
        const posXInput = document.getElementById('avatarPosX');
        const posYInput = document.getElementById('avatarPosY');
        if (zoomInput) { zoomInput.value = 100; document.getElementById('avatarZoomValue').textContent = '100%'; }
        if (posXInput) { posXInput.value = 0; document.getElementById('avatarPosXValue').textContent = '0%'; }
        if (posYInput) { posYInput.value = 0; document.getElementById('avatarPosYValue').textContent = '0%'; }
        imageAdjust = { zoom: 100, posX: 0, posY: 0 };
    }

    function updatePreviewImage() {
        if (previewImage && useImage) {
            const scale = imageAdjust.zoom / 100;
            const translateX = imageAdjust.posX;
            const translateY = imageAdjust.posY;
            previewImage.style.transform = `scale(${scale}) translate(${translateX}%, ${translateY}%)`;
        }
    }

    function openModal() {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        selectedImage = null;
        useImage = false;
        imageAdjust = { zoom: 100, posX: 0, posY: 0 };
        if (previewImage) previewImage.style.display = 'none';
        if (previewInitials) previewInitials.style.display = 'flex';
        if (uploadActions) uploadActions.style.display = 'none';
        if (adjustControls) adjustControls.style.display = 'none';
        if (uploadArea) uploadArea.style.display = 'block'; // Reset upload area visibility
        if (fileInput) fileInput.value = ''; // Clear file input
        resetAdjustControls();
        
        // Reset to first color selected
        modal.querySelectorAll('.avatar-color-option').forEach((o, i) => {
            o.classList.toggle('selected', i === 0);
            if (i === 0) {
                selectedColor = o.dataset.color;
                if (preview) preview.style.background = selectedColor;
            }
        });
    }

    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    openBtn.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) { if (e.target === modal) closeModal(); });

    // Color selection
    modal.querySelectorAll('.avatar-color-option').forEach(option => {
        option.addEventListener('click', function() {
            modal.querySelectorAll('.avatar-color-option').forEach(o => o.classList.remove('selected'));
            this.classList.add('selected');
            selectedColor = this.dataset.color;
            useImage = false;
            if (preview) preview.style.background = selectedColor;
            if (previewImage) previewImage.style.display = 'none';
            if (previewInitials) previewInitials.style.display = 'flex';
            if (adjustControls) adjustControls.style.display = 'none';
        });
    });

    // Upload
    if (uploadArea && fileInput) {
        uploadArea.addEventListener('click', () => fileInput.click());
        uploadArea.addEventListener('dragover', (e) => { e.preventDefault(); uploadArea.classList.add('dragover'); });
        uploadArea.addEventListener('dragleave', () => { uploadArea.classList.remove('dragover'); });
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
                handleAvatarUpload(file);
            } else if (file) {
                showFailedModal('Invalid File Type', 'Please upload only JPEG or PNG images.');
            }
        });
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) handleAvatarUpload(this.files[0]);
        });
    }

    function handleAvatarUpload(file) {
        const allowedTypes = ['image/jpeg', 'image/png'];
        if (!allowedTypes.includes(file.type)) { showFailedModal('Invalid File Type', 'Please upload only JPEG or PNG images.'); return; }
        if (file.size > 1024 * 1024 * 1024) { showFailedModal('File Too Large', 'Image size must be less than 1GB.'); return; }
        const reader = new FileReader();
        reader.onload = function(e) {
            selectedImage = e.target.result;
            useImage = true;
            resetAdjustControls();
            
            if (previewImage) {
                previewImage.src = selectedImage;
                previewImage.style.display = 'block';
                previewImage.style.transform = 'scale(1) translate(0%, 0%)';
            }
            if (previewInitials) previewInitials.style.display = 'none';
            modal.querySelectorAll('.avatar-color-option').forEach(o => o.classList.remove('selected'));
            
            // Hide upload area, show controls
            if (uploadArea) uploadArea.style.display = 'none';
            if (uploadActions) uploadActions.style.display = 'block';
            if (adjustControls) adjustControls.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    // Adjustment controls
    const zoomInput = document.getElementById('avatarZoom');
    const posXInput = document.getElementById('avatarPosX');
    const posYInput = document.getElementById('avatarPosY');
    const resetBtn = document.getElementById('resetAvatarAdjust');

    if (zoomInput) {
        zoomInput.addEventListener('input', function() {
            imageAdjust.zoom = parseInt(this.value);
            document.getElementById('avatarZoomValue').textContent = this.value + '%';
            updatePreviewImage();
        });
    }
    if (posXInput) {
        posXInput.addEventListener('input', function() {
            imageAdjust.posX = parseInt(this.value);
            document.getElementById('avatarPosXValue').textContent = this.value + '%';
            updatePreviewImage();
        });
    }
    if (posYInput) {
        posYInput.addEventListener('input', function() {
            imageAdjust.posY = parseInt(this.value);
            document.getElementById('avatarPosYValue').textContent = this.value + '%';
            updatePreviewImage();
        });
    }
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            resetAdjustControls();
            updatePreviewImage();
        });
    }

    // Remove photo
    if (removeBtn) {
        removeBtn.addEventListener('click', function() {
            selectedImage = null;
            useImage = false;
            if (previewImage) previewImage.style.display = 'none';
            if (previewInitials) previewInitials.style.display = 'flex';
            if (uploadActions) uploadActions.style.display = 'none';
            if (adjustControls) adjustControls.style.display = 'none';
            if (uploadArea) uploadArea.style.display = 'block'; // Show upload area again
            if (fileInput) fileInput.value = '';
            resetAdjustControls();
            
            const defaultColor = modal.querySelector('.avatar-color-option');
            if (defaultColor) {
                defaultColor.classList.add('selected');
                selectedColor = defaultColor.dataset.color;
                if (preview) preview.style.background = selectedColor;
            }
        });
    }

    // Save
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            if (useImage && selectedImage) {
                let img = profileAvatar.querySelector('img');
                if (!img) {
                    img = document.createElement('img');
                    profileAvatar.appendChild(img);
                }
                img.src = selectedImage;
                img.style.display = 'block';
                const scale = imageAdjust.zoom / 100;
                img.style.transform = `scale(${scale}) translate(${imageAdjust.posX}%, ${imageAdjust.posY}%)`;
                
                const text = profileAvatar.childNodes[0];
                if (text && text.nodeType === Node.TEXT_NODE) {
                    profileAvatar.innerHTML = '';
                    profileAvatar.appendChild(img);
                }
            } else {
                profileAvatar.style.background = selectedColor;
                const img = profileAvatar.querySelector('img');
                if (img) img.remove();
                if (!profileAvatar.textContent.trim()) {
                    profileAvatar.textContent = 'JS';
                }
            }

            console.log('Avatar saved:', { useImage, color: selectedColor, adjust: imageAdjust });
            closeModal();
        });
    }
}


// ========================================
// SUCCESS & FAILED MODAL FUNCTIONS
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    initSuccessModal();
    initFailedModal();
});

// Success Modal
function initSuccessModal() {
    const modal = document.getElementById('successModal');
    const okBtn = document.getElementById('successOkBtn');

    if (!modal) return;

    if (okBtn) {
        okBtn.addEventListener('click', function() {
            hideSuccessModal();
        });
    }

    // Close on overlay click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            hideSuccessModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            hideSuccessModal();
        }
    });
}

function showSuccessModal(title, message, callback) {
    const modal = document.getElementById('successModal');
    const titleEl = document.getElementById('successTitle');
    const messageEl = document.getElementById('successMessage');

    if (!modal) return;

    if (titleEl) titleEl.textContent = title || 'Success!';
    if (messageEl) messageEl.textContent = message || 'Your changes have been saved successfully.';

    modal.classList.add('show');
    document.body.style.overflow = 'hidden';

    // Store callback for when modal closes
    modal.dataset.callback = callback ? 'true' : 'false';
    if (callback) {
        modal._successCallback = callback;
    }
}

function hideSuccessModal() {
    const modal = document.getElementById('successModal');
    if (!modal) return;

    modal.classList.remove('show');
    document.body.style.overflow = '';

    // Execute callback if exists
    if (modal._successCallback) {
        modal._successCallback();
        modal._successCallback = null;
    }
}

// Failed Modal
let failedRetryCallback = null;

function initFailedModal() {
    const modal = document.getElementById('failedModal');
    const cancelBtn = document.getElementById('failedCancelBtn');
    const retryBtn = document.getElementById('failedRetryBtn');

    if (!modal) return;

    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            hideFailedModal();
        });
    }

    if (retryBtn) {
        retryBtn.addEventListener('click', function() {
            hideFailedModal();
            if (failedRetryCallback) {
                failedRetryCallback();
            }
        });
    }

    // Close on overlay click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            hideFailedModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            hideFailedModal();
        }
    });
}

function showFailedModal(title, message, onRetry) {
    const modal = document.getElementById('failedModal');
    const titleEl = document.getElementById('failedTitle');
    const messageEl = document.getElementById('failedMessage');

    if (!modal) return;

    if (titleEl) titleEl.textContent = title || 'Oops!';
    if (messageEl) messageEl.textContent = message || 'Something went wrong. Please try again.';

    failedRetryCallback = onRetry || null;

    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function hideFailedModal() {
    const modal = document.getElementById('failedModal');
    if (!modal) return;

    modal.classList.remove('show');
    document.body.style.overflow = '';
    failedRetryCallback = null;
}

// ========================================
// UPDATE SAVE FUNCTIONS TO USE MODALS
// ========================================

// Override the save functions to use success/failed modals
(function() {
    // Update Cover Photo save
    const coverSaveBtn = document.getElementById('saveCover');
    if (coverSaveBtn) {
        const originalClick = coverSaveBtn.onclick;
        coverSaveBtn.addEventListener('click', function(e) {
            // The original save logic runs first, then show success
            setTimeout(() => {
                const modal = document.getElementById('coverPhotoModal');
                if (!modal.classList.contains('show')) {
                    showSuccessModal('Cover Updated!', 'Your cover photo has been changed successfully.');
                }
            }, 100);
        });
    }

    // Update Profile Photo save
    const avatarSaveBtn = document.getElementById('saveProfilePhoto');
    if (avatarSaveBtn) {
        avatarSaveBtn.addEventListener('click', function(e) {
            setTimeout(() => {
                const modal = document.getElementById('profilePhotoModal');
                if (!modal.classList.contains('show')) {
                    showSuccessModal('Profile Photo Updated!', 'Your profile photo has been changed successfully.');
                }
            }, 100);
        });
    }

    // Update Edit Profile save
    const profileSaveBtn = document.getElementById('saveProfile');
    if (profileSaveBtn) {
        profileSaveBtn.addEventListener('click', function(e) {
            setTimeout(() => {
                const modal = document.getElementById('editProfileModal');
                if (!modal.classList.contains('show')) {
                    showSuccessModal('Profile Updated!', 'Your profile information has been saved successfully.');
                }
            }, 100);
        });
    }
})();
