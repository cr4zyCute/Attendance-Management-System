<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Attendance Management System</title>
    <style>
        :root {
            --primary-color: #84cc16;
            --primary-hover: #65a30d;
            --secondary-color: #f59e0b;
            --accent-color: #fb923c;
            --bg-color: #fafaf9;
            --card-bg: #ffffff;
            --text-primary: #1c1917;
            --text-secondary: #57534e;
            --border-color: #e7e5e4;
            --danger-color: #ef4444;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-container {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 420px;
            padding: 40px;
        }
        .logo { text-align: center; margin-bottom: 30px; }
        .logo-icon { font-size: 48px; }
        .logo-text {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        h1 { text-align: center; margin-bottom: 8px; color: var(--text-primary); }
        .subtitle { text-align: center; color: var(--text-secondary); margin-bottom: 30px; }
        .tabs { display: flex; margin-bottom: 25px; border-radius: 10px; overflow: hidden; border: 1px solid var(--border-color); }
        .tab {
            flex: 1;
            padding: 12px;
            border: none;
            background: var(--bg-color);
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .tab.active { background: var(--primary-color); color: white; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 500; color: var(--text-primary); }
        input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }
        input:focus { outline: none; border-color: var(--primary-color); box-shadow: 0 0 0 3px rgba(132,204,22,0.15); }
        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn:hover { transform: translateY(-2px); }
        .error { color: var(--danger-color); font-size: 13px; margin-top: 5px; }
        .alert { padding: 12px; background: rgba(239,68,68,0.1); border-radius: 8px; color: var(--danger-color); margin-bottom: 20px; }
        .hidden { display: none; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <div class="logo-icon">📚</div>
            <div class="logo-text">AMS</div>
        </div>
        <h1>Welcome Back</h1>
        <p class="subtitle">Sign in to continue</p>

        @if($errors->has('login'))
            <div class="alert">{{ $errors->first('login') }}</div>
        @endif

        <div class="tabs">
            <button type="button" class="tab active" onclick="switchTab('student')">Student</button>
            <button type="button" class="tab" onclick="switchTab('teacher')">Teacher</button>
        </div>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <input type="hidden" name="login_type" id="login_type" value="student">

            <div class="form-group" id="student-id-group">
                <label for="student_id">Student ID</label>
                <input type="text" id="student_id" name="student_id" placeholder="Enter your student ID" value="{{ old('student_id') }}">
                @error('student_id')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group hidden" id="email-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                @error('password')<span class="error">{{ $message }}</span>@enderror
            </div>

            <button type="submit" class="btn">Sign In</button>
        </form>
    </div>

    <script>
        function switchTab(type) {
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            event.target.classList.add('active');
            document.getElementById('login_type').value = type;
            
            if (type === 'student') {
                document.getElementById('student-id-group').classList.remove('hidden');
                document.getElementById('email-group').classList.add('hidden');
            } else {
                document.getElementById('student-id-group').classList.add('hidden');
                document.getElementById('email-group').classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
