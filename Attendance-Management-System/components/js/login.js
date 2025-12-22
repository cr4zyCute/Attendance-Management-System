document.addEventListener('DOMContentLoaded', function() {
    // Laravel backend API URL
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
        
        // Validate inputs
        if (role === 'student') {
            const studentId = studentIdInput.value.trim();
            if (!studentId) {
                showError(studentIdInput, studentIdError, 'Student ID is required');
                return;
            }
        } else {
            const email = emailInput.value.trim();
            if (!email) {
                showError(emailInput, emailError, 'Email is required');
                return;
            }
        }
        
        if (!password) {
            showError(passwordInput, passwordError, 'Password is required');
            return;
        }
        
        // Disable button during request
        loginBtn.disabled = true;
        loginBtn.textContent = 'Logging in...';
        
        try {
            // Prepare JSON data
            const requestData = {
                login_type: role,
                password: password
            };
            
            if (role === 'student') {
                requestData.student_id = studentIdInput.value.trim();
            } else {
                requestData.email = emailInput.value.trim();
            }
            
            const response = await fetch(`${API_BASE_URL}/api/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(requestData)
            });
            
            const data = await response.json();
            
            if (response.ok && data.success) {
                // Store token if provided
                if (data.token) {
                    localStorage.setItem('auth_token', data.token);
                    localStorage.setItem('user_type', role);
                    localStorage.setItem('user', JSON.stringify(data.user));
                }
                
                // Redirect to dashboard
                if (role === 'student') {
                    window.location.href = 'users/student/pages/student_dashboard.php';
                } else {
                    window.location.href = 'users/teacher/pages/teacher_dashboard.php';
                }
            } else {
                // Show validation errors
                if (data.errors) {
                    if (data.errors.student_id) {
                        showError(studentIdInput, studentIdError, Array.isArray(data.errors.student_id) ? data.errors.student_id[0] : data.errors.student_id);
                    }
                    if (data.errors.email) {
                        showError(emailInput, emailError, Array.isArray(data.errors.email) ? data.errors.email[0] : data.errors.email);
                    }
                    if (data.errors.password) {
                        showError(passwordInput, passwordError, Array.isArray(data.errors.password) ? data.errors.password[0] : data.errors.password);
                    }
                    if (data.errors.login) {
                        showError(passwordInput, passwordError, Array.isArray(data.errors.login) ? data.errors.login[0] : data.errors.login);
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
