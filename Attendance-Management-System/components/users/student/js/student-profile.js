// Student Profile JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initEditProfileModal();
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
            const name = document.getElementById('editName')?.value;
            const email = document.getElementById('editEmail')?.value;
            const phone = document.getElementById('editPhone')?.value;
            const dob = document.getElementById('editDob')?.value;

            // TODO: Call API to save profile
            console.log('Saving profile:', { name, email, phone, dob });

            // Placeholder - show success
            alert('Profile updated successfully!\n\nNote: Backend integration needed.');
            closeModal();
        });
    }
}
