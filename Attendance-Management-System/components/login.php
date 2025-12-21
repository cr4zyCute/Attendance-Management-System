<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Attendance Management System</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome Back!</h1>
            <p>Let's get you signed in securely.</p>
        </div>

        <div class="role-tabs">
            <button type="button" class="tab-btn active" data-role="student">Student</button>
            <button type="button" class="tab-btn" data-role="teacher">Teacher</button>
        </div>

        <form class="login-form" id="loginForm" action="" method="POST">
            <input type="hidden" name="role" id="roleInput" value="student">
            
            <!-- Student ID field (shown for students) -->
            <div class="form-group" id="studentIdGroup">
                <label for="studentId">Student ID</label>
                <input 
                    type="text" 
                    id="studentId" 
                    name="student_id" 
                    placeholder="Enter Your Student ID" 
                    autocomplete="username"
                >
                <span class="error-message" id="studentIdError"></span>
            </div>

            <!-- Email field (shown for teachers) -->
            <div class="form-group hidden" id="emailGroup">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Enter Your Email Address" 
                    autocomplete="email"
                >
                <span class="error-message" id="emailError"></span>
            </div>

                <div class="form-group">
                    <div class="password-header">
                        <label for="password">Password</label>
                        <a href="forgot-password.php" class="forgot-link">Forgot Your Password?</a>
                    </div>
                    <div class="password-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Your Password" 
                            required
                            autocomplete="current-password"
                        >
                        <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                            <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg class="eye-off-icon hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    <span class="error-message" id="passwordError"></span>
                </div>

                <button type="submit" class="login-btn">Log in</button>
        </form>
    </div>

    <script src="js/login.js"></script>
</body>
</html>
