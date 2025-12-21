document.addEventListener('DOMContentLoaded', function() {
    // Role tab switching
    const tabBtns = document.querySelectorAll('.tab-btn');
    const roleInput = document.getElementById('roleInput');
    const studentIdGroup = document.getElementById('studentIdGroup');
    const emailGroup = document.getElementById('emailGroup');
    const studentIdInput = document.getElementById('studentId');
    const emailInput = document.getElementById('email');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const role = this.dataset.role;
            roleInput.value = role;

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
    const passwordInput = document.getElementById('password');
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
        
        const role = roleInput.value;
        const password = document.getElementById('password').value;
        
        if (role === 'student') {
            const studentId = studentIdInput.value;
            if (!studentId || !password) {
                alert('Please fill in all fields');
                return;
            }
            
            // Check mock student credentials
            if (studentId === mockUsers.student.id && password === mockUsers.student.password) {
                alert('Login successful!');
                window.location.href = 'users/student/pages/dashboard.php';
            } else {
                alert('Invalid Student ID or Password');
            }
        } else {
            const email = emailInput.value;
            if (!email || !password) {
                alert('Please fill in all fields');
                return;
            }
            
            // Check mock teacher credentials
            if (email === mockUsers.teacher.email && password === mockUsers.teacher.password) {
                alert('Login successful!');
                window.location.href = 'users/teacher/pages/dashboard.php';
            } else {
                alert('Invalid Email or Password');
            }
        }
    });
});
