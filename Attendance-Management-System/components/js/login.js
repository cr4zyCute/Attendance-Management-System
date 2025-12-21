document.addEventListener('DOMContentLoaded', function() {
    // Role tab switching
    const tabBtns = document.querySelectorAll('.tab-btn');
    const roleInput = document.getElementById('roleInput');
    const studentIdGroup = document.getElementById('studentIdGroup');
    const emailGroup = document.getElementById('emailGroup');
    const studentIdInput = document.getElementById('studentId');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    // Error elements
    const studentIdError = document.getElementById('studentIdError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    // Helper functions for error handling
    function showError(input, errorElement, message) {
        input.classList.add('error');
        errorElement.textContent = message;
    }

    function clearError(input, errorElement) {
        input.classList.remove('error');
        errorElement.textContent = '';
    }

    function clearAllErrors() {
        clearError(studentIdInput, studentIdError);
        clearError(emailInput, emailError);
        clearError(passwordInput, passwordError);
    }

    // Clear errors on input
    studentIdInput.addEventListener('input', () => clearError(studentIdInput, studentIdError));
    emailInput.addEventListener('input', () => clearError(emailInput, emailError));
    passwordInput.addEventListener('input', () => clearError(passwordInput, passwordError));

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const role = this.dataset.role;
            roleInput.value = role;
            clearAllErrors();

            if (role === 'student') {
                studentIdGroup.classList.remove('hidden');
                emailGroup.classList.add('hidden');
                studentIdInput.required = true;
                emailInput.required = false;
                emailInput.value = '';
            } else {
                studentIdGroup.classList.add('hidden');
                emailGroup.classList.remove('hidden');
                studentIdInput.required = false;
                emailInput.required = true;
                studentIdInput.value = '';
            }
        });
    });

    // Password visibility toggle
    const togglePassword = document.querySelector('.toggle-password');
    const eyeIcon = togglePassword.querySelector('.eye-icon');
    const eyeOffIcon = togglePassword.querySelector('.eye-off-icon');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        eyeIcon.classList.toggle('hidden');
        eyeOffIcon.classList.toggle('hidden');
    });

    // Mock data for testing
    const mockUsers = {
        student: {
            id: '00001',
            password: '123123'
        },
        teacher: {
            email: 'teacher@gmail.com',
            password: 'teacher@gmail.com'
        }
    };

    // Form submission
    const loginForm = document.getElementById('loginForm');
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        clearAllErrors();
        
        const role = roleInput.value;
        const password = passwordInput.value;
        let hasError = false;
        
        if (role === 'student') {
            const studentId = studentIdInput.value.trim();
            
            // Validate Student ID
            if (!studentId) {
                showError(studentIdInput, studentIdError, 'Student ID is required');
                hasError = true;
            }
            
            // Validate Password
            if (!password) {
                showError(passwordInput, passwordError, 'Password is required');
                hasError = true;
            }
            
            if (hasError) return;
            
            // Check mock student credentials - show specific errors
            if (studentId !== mockUsers.student.id) {
                showError(studentIdInput, studentIdError, 'Invalid Student ID');
            } else if (password !== mockUsers.student.password) {
                showError(passwordInput, passwordError, 'Invalid Password');
            } else {
                window.location.href = 'users/student/pages/dashboard.php';
            }
        } else {
            const email = emailInput.value.trim();
            
            // Validate Email
            if (!email) {
                showError(emailInput, emailError, 'Email is required');
                hasError = true;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                showError(emailInput, emailError, 'Please enter a valid email address');
                hasError = true;
            }
            
            // Validate Password
            if (!password) {
                showError(passwordInput, passwordError, 'Password is required');
                hasError = true;
            }
            
            if (hasError) return;
            
            // Check mock teacher credentials - show specific errors
            if (email !== mockUsers.teacher.email) {
                showError(emailInput, emailError, 'Invalid Email');
            } else if (password !== mockUsers.teacher.password) {
                showError(passwordInput, passwordError, 'Invalid Password');
            } else {
                window.location.href = 'users/teacher/pages/dashboard.php';
            }
        }
    });
});
