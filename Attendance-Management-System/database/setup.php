<?php
// Run this file once to create tables and insert sample data
require_once __DIR__ . '/../config/database.php';

$pdo = getDBConnection();

if (!$pdo) {
    die("Database connection failed!");
}

echo "Connected to database successfully!<br>";

// Drop existing tables to recreate with new structure
$pdo->exec("DROP TABLE IF EXISTS students");
$pdo->exec("DROP TABLE IF EXISTS teachers");

// Create students table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id VARCHAR(20) NOT NULL UNIQUE,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        password_plain VARCHAR(100) NOT NULL,
        email VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
");
echo "Students table created!<br>";

// Create teachers table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS teachers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        teacher_id VARCHAR(20) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        password_plain VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
");
echo "Teachers table created!<br>";

// Insert sample student (00001 / 123123)
$studentId = '00001';
$studentPlainPassword = '123123';
$studentHashedPassword = password_hash($studentPlainPassword, PASSWORD_BCRYPT);
$stmt = $pdo->prepare("INSERT INTO students (student_id, first_name, last_name, password, password_plain, email) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$studentId, 'Student', '1', $studentHashedPassword, $studentPlainPassword, 'john.student@email.com']);
echo "Sample student inserted (ID: $studentId)!<br>";

// Insert sample teacher (10001 / teacher@gmail.com)
$teacherId = '10001';
$teacherPlainPassword = 'teacher@gmail.com';
$teacherHashedPassword = password_hash($teacherPlainPassword, PASSWORD_BCRYPT);
$stmt = $pdo->prepare("INSERT INTO teachers (teacher_id, email, first_name, last_name, password, password_plain) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$teacherId, 'teacher@gmail.com', 'Teacher', '1', $teacherHashedPassword, $teacherPlainPassword]);
echo "Sample teacher inserted (ID: $teacherId)!<br>";

echo "<br><strong>Setup complete!</strong><br>";
echo "Student: 00001 / 123123<br>";
echo "Teacher: 10001 (teacher@gmail.com) / teacher@gmail.com<br>";
