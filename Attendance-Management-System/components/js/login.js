document.addEventListener('DOMContentLoaded', function() {
    // Laravel backend API URL - adjust this based on your setup
    // If using Laragon, Laravel typically runs at http://localhost:8000 or http://backend.test
    const API_BASE_URL = 'http://localhost:8000';
    
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

    // Form submission
    const loginForm = document.getElementById('loginForm');
    const loginBtn = loginForm.querySelector('.login-btn');
    
    loginForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        clearAllErrors();
        
        const role = roleInput.value;
        const password = passwordInput.value;
        
        // Prepare form data for Laravel
        const formData = new FormData();
        formData.append('login_type', role);
        formData.append('password', password);
        
        if (role === 'student') {
            const studentId = studentIdInput.value.trim();
            if (!studentId) {
                showError(studentIdInput, studentIdError, 'Student ID is required');
                return;
            }
            formData.append('student_id', studentId);
        } else {
            const email = emailInput.value.trim();
            if (!email) {
                showError(emailInput, emailError, 'Email is required');
                return;
            }
            formData.append('email', email);
        }
        
        if (!password) {
            showError(passwordInput, passwordError, 'Password is required');
            return;
        }
        
        // Disable button during request
        loginBtn.disabled = true;
        loginBtn.textContent = 'Logging in...';
        
        try {
            // First get CSRF token from Laravel
            await fetch(`${API_BASE_URL}/sanctum/csrf-cookie`, {
                credentials: 'include'
            });
            
            const response = await fetch(`${API_BASE_URL}/login`, {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });
            
            if (response.redirected) {
                // Laravel redirected after successful login
                window.location.href = response.url;
                return;
            }
            
            const data = await response.json();
            
            if (response.ok && data.success) {
                // Redirect based on role
                if (role === 'student') {
                    window.location.href = `${API_BASE_URL}/student/dashboard`;
                } else {
                    window.location.href = `${API_BASE_URL}/teacher/dashboard`;
                }
            } else {
                // Show validation errors
                if (data.errors) {
                    if (data.errors.student_id) {
                        showError(studentIdInput, studentIdError, data.errors.student_id[0]);
                    }
                    if (data.errors.email) {
                        showError(emailInput, emailError, data.errors.email[0]);
                    }
                    if (data.errors.password) {
                        showError(passwordInput, passwordError, data.errors.password[0]);
                    }
                    if (data.errors.login) {
                        showError(passwordInput, passwordError, data.errors.login[0]);
                    }
                } else if (data.message) {
                    showError(passwordInput, passwordError, data.message);
                }
            }
        } catch (error) {
            console.error('Login error:', error);
            showError(passwordInput, passwordError, 'Connection error. Please try again.');
        } finally {
            loginBtn.disabled = false;
            loginBtn.textContent = 'Log in';
        }
    });
});
