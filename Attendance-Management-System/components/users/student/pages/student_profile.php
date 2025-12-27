<?php
$pageTitle = 'My Profile';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Attendance Management System</title>
    <link rel="stylesheet" href="css/student_profile.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <!-- Profile Content -->
        <div class="profile-content">
            <!-- Profile Header Card -->
            <div class="profile-header-card">
                <div class="profile-cover" id="profileCover">
                    <button class="cover-edit-btn" id="changeCoverBtn" title="Change cover photo">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"></path>
                            <circle cx="12" cy="13" r="4"></circle>
                        </svg>
                        Change Cover
                    </button>
                </div>
                <div class="profile-info-section">
                    <div class="profile-avatar-wrapper">
                        <div class="profile-avatar" id="profileAvatar">JS</div>
                        <button class="avatar-edit-btn" id="changeAvatarBtn" title="Change photo">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"></path>
                                <circle cx="12" cy="13" r="4"></circle>
                            </svg>
                        </button>
                    </div>
                    <div class="profile-details">
                        <h1 class="profile-name">John Student</h1>
                        <p class="profile-id">Student ID: STU-2025-001</p>
                        <div class="profile-badges">
                            <span class="badge active">Active</span>
                            <span class="badge semester">Fall 2025</span>
                        </div>
                    </div>
                    <div class="profile-actions">
                        <button class="btn btn-outline" id="editProfileBtn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon courses">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">6</span>
                        <span class="stat-label">Enrolled Courses</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon attendance">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">87%</span>
                        <span class="stat-label">Avg. Attendance</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon present">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">42</span>
                        <span class="stat-label">Days Present</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon absent">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">8</span>
                        <span class="stat-label">Days Absent</span>
                    </div>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="profile-grid">
                <!-- Personal Information -->
                <div class="card personal-info-card">
                    <div class="card-header">
                        <h2 class="card-title">Personal Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Full Name</span>
                                <span class="info-value">John Michael Student</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email</span>
                                <span class="info-value">john.student@school.edu</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Phone</span>
                                <span class="info-value">+1 (555) 123-4567</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Date of Birth</span>
                                <span class="info-value">March 15, 2005</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Department</span>
                                <span class="info-value">Computer Science</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Year</span>
                                <span class="info-value">2nd Year</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance by Course -->
                <div class="card attendance-card">
                    <div class="card-header">
                        <h2 class="card-title">Attendance by Course</h2>
                        <a href="student_courses.php" class="view-all">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="course-attendance-list">
                            <div class="course-item">
                                <div class="course-info">
                                    <div class="course-icon math"></div>
                                    <div class="course-details">
                                        <span class="course-name">Mathematics</span>
                                        <span class="course-code">MATH101</span>
                                    </div>
                                </div>
                                <div class="course-progress">
                                    <span class="progress-value">90%</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 90%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <div class="course-icon physics"></div>
                                    <div class="course-details">
                                        <span class="course-name">Physics</span>
                                        <span class="course-code">PHY201</span>
                                    </div>
                                </div>
                                <div class="course-progress">
                                    <span class="progress-value">85%</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 85%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <div class="course-icon cs"></div>
                                    <div class="course-details">
                                        <span class="course-name">Computer Science</span>
                                        <span class="course-code">CS301</span>
                                    </div>
                                </div>
                                <div class="course-progress">
                                    <span class="progress-value high">95%</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill high" style="width: 95%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <div class="course-icon english"></div>
                                    <div class="course-details">
                                        <span class="course-name">English</span>
                                        <span class="course-code">ENG102</span>
                                    </div>
                                </div>
                                <div class="course-progress">
                                    <span class="progress-value warning">78%</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill warning" style="width: 78%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-item">
                                <div class="course-info">
                                    <div class="course-icon chemistry"></div>
                                    <div class="course-details">
                                        <span class="course-name">Chemistry</span>
                                        <span class="course-code">CHEM201</span>
                                    </div>
                                </div>
                                <div class="course-progress">
                                    <span class="progress-value">82%</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 82%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Edit Profile Modal -->
        <?php include '../modals/profile_modal/profile_modal.php'; ?>
        
        <!-- Cover Photo Modal -->
        <?php include '../modals/profile_modal/coverphoto_modal.php'; ?>
        
        <!-- Profile Photo Modal -->
        <?php include '../modals/profile_modal/profilephoto.php'; ?>
        
        <!-- Success Modal -->
        <?php include '../modals/profile_modal/success.php'; ?>
        
        <!-- Failed Modal -->
        <?php include '../modals/profile_modal/failed.php'; ?>
    </main>

    <script src="../js/student-dashboard.js"></script>
    <script src="../js/student-profile.js"></script>
</body>
</html>
