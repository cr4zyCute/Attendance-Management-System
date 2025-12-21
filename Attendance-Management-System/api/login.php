<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/database.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

$role = $input['role'] ?? '';
$password = $input['password'] ?? '';

$response = ['success' => false, 'errors' => []];

$pdo = getDBConnection();
if (!$pdo) {
    $response['errors']['password'] = 'Database connection failed';
    echo json_encode($response);
    exit;
}

if ($role === 'student') {
    $studentId = trim($input['student_id'] ?? '');
    
    // Validate inputs
    if (empty($studentId)) {
        $response['errors']['student_id'] = 'Student ID is required';
    }
    if (empty($password)) {
        $response['errors']['password'] = 'Password is required';
    }
    
    if (empty($response['errors'])) {
        // Check credentials from database
        $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
        $stmt->execute([$studentId]);
        $student = $stmt->fetch();
        
        if (!$student) {
            $response['errors']['student_id'] = 'Invalid Student ID';
        } elseif (!password_verify($password, $student['password'])) {
            $response['errors']['password'] = 'Invalid Password';
        } else {
            // Success - create session
            $_SESSION['user_id'] = $student['id'];
            $_SESSION['student_id'] = $student['student_id'];
            $_SESSION['user_role'] = 'student';
            $_SESSION['user_name'] = $student['first_name'] . ' ' . $student['last_name'];
            $_SESSION['logged_in'] = true;
            
            $response['success'] = true;
            $response['redirect'] = 'users/student/pages/student_dashboard.php';
        }
    }
} elseif ($role === 'teacher') {
    $email = trim($input['email'] ?? '');
    
    // Validate inputs
    if (empty($email)) {
        $response['errors']['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors']['email'] = 'Please enter a valid email address';
    }
    if (empty($password)) {
        $response['errors']['password'] = 'Password is required';
    }
    
    if (empty($response['errors'])) {
        // Check credentials from database
        $stmt = $pdo->prepare("SELECT * FROM teachers WHERE email = ?");
        $stmt->execute([$email]);
        $teacher = $stmt->fetch();
        
        if (!$teacher) {
            $response['errors']['email'] = 'Invalid Email';
        } elseif (!password_verify($password, $teacher['password'])) {
            $response['errors']['password'] = 'Invalid Password';
        } else {
            // Success - create session
            $_SESSION['user_id'] = $teacher['id'];
            $_SESSION['user_email'] = $teacher['email'];
            $_SESSION['user_role'] = 'teacher';
            $_SESSION['user_name'] = $teacher['first_name'] . ' ' . $teacher['last_name'];
            $_SESSION['logged_in'] = true;
            
            $response['success'] = true;
            $response['redirect'] = 'users/teacher/pages/teacher_dashboard.php';
        }
    }
} else {
    $response['errors']['role'] = 'Invalid role';
}

echo json_encode($response);
