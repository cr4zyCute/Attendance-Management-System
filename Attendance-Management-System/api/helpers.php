<?php
require_once __DIR__ . '/../config/database.php';

/**
 * Generate next student ID (starts at 00001, increments)
 */
function generateStudentId($pdo) {
    $stmt = $pdo->query("SELECT MAX(CAST(student_id AS UNSIGNED)) as max_id FROM students");
    $result = $stmt->fetch();
    $nextId = ($result['max_id'] ?? 0) + 1;
    return str_pad($nextId, 5, '0', STR_PAD_LEFT); // 00001, 00002, etc.
}

/**
 * Generate next teacher ID (starts at 10001, increments)
 */
function generateTeacherId($pdo) {
    $stmt = $pdo->query("SELECT MAX(CAST(teacher_id AS UNSIGNED)) as max_id FROM teachers");
    $result = $stmt->fetch();
    $maxId = $result['max_id'] ?? 10000;
    if ($maxId < 10001) $maxId = 10000;
    return (string)($maxId + 1); // 10001, 10002, etc.
}

/**
 * Create a new student
 */
function createStudent($pdo, $firstName, $lastName, $email, $plainPassword) {
    $studentId = generateStudentId($pdo);
    $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);
    
    $stmt = $pdo->prepare("INSERT INTO students (student_id, first_name, last_name, password, password_plain, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$studentId, $firstName, $lastName, $hashedPassword, $plainPassword, $email]);
    
    return $studentId;
}

/**
 * Create a new teacher
 */
function createTeacher($pdo, $firstName, $lastName, $email, $plainPassword) {
    $teacherId = generateTeacherId($pdo);
    $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);
    
    $stmt = $pdo->prepare("INSERT INTO teachers (teacher_id, email, first_name, last_name, password, password_plain) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$teacherId, $email, $firstName, $lastName, $hashedPassword, $plainPassword]);
    
    return $teacherId;
}
