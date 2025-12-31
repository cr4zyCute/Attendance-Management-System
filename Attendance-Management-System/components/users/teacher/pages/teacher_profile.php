<?php
$pageTitle = 'My Profile';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Attendance Management System</title>
    <link rel="stylesheet" href="../css/teacher_profile.css">
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
                        <div class="profile-avatar" id="profileAvatar">JT</div>
                        <button class="avatar-edit-btn" id="changeAvatarBtn" title="Change photo">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"></path>
                                <circle cx="12" cy="13" r="4"></circle>
                            </svg>
                        </button>
                    </div>
                    <div class="profile-details">
                        <h1 class="profile-name">John Teacher</h1>
                        <p class="profile-id">Employee ID: TCH-2025-001</p>
                        <div class="profile-badges">
                            <span class="badge active">Active</span>
                            <span class="badge department">Computer Science</span>
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
                    <div class="stat-icon classes">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">5</span>
                        <span class="stat-label">Classes Assigned</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon students">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">156</span>
                        <span class="stat-label">Total Students</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon attendance">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">89%</span>
                        <span class="stat-label">Avg. Attendance</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon sessions">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <span class="stat-value">248</span>
                        <span class="stat-label">Sessions Recorded</span>
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
                                <span class="info-value">John Michael Teacher</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email</span>
                                <span class="info-value">john.teacher@school.edu</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Phone</span>
                                <span class="info-value">+1 (555) 987-6543</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Date of Birth</span>
                                <span class="info-value">June 20, 1985</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Department</span>
                                <span class="info-value">Computer Science</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Position</span>
                                <span class="info-value">Senior Lecturer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Classes Overview -->
                <div class="card classes-card">
                    <div class="card-header">
                        <h2 class="card-title">My Classes</h2>
                        <a href="teacher_courses.php" class="view-all">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="class-list">
                            <div class="class-item">
                                <div class="class-info">
                                    <div class="class-icon math"></div>
                                    <div class="class-details">
                                        <span class="class-name">Mathematics</span>
                                        <span class="class-code">MATH101 • 32 students</span>
                                    </div>
                                </div>
                                <div class="class-attendance">
                                    <span class="attendance-value">94%</span>
                                    <div class="mini-progress">
                                        <div class="mini-progress-fill excellent" style="width: 94%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="class-item">
                                <div class="class-info">
                                    <div class="class-icon physics"></div>
                                    <div class="class-details">
                                        <span class="class-name">Physics</span>
                                        <span class="class-code">PHY201 • 28 students</span>
                                    </div>
                                </div>
                                <div class="class-attendance">
                                    <span class="attendance-value">87%</span>
                                    <div class="mini-progress">
                                        <div class="mini-progress-fill good" style="width: 87%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="class-item">
                                <div class="class-info">
                                    <div class="class-icon cs"></div>
                                    <div class="class-details">
                                        <span class="class-name">Computer Science</span>
                                        <span class="class-code">CS301 • 35 students</span>
                                    </div>
                                </div>
                                <div class="class-attendance">
                                    <span class="attendance-value high">92%</span>
                                    <div class="mini-progress">
                                        <div class="mini-progress-fill excellent" style="width: 92%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="class-item">
                                <div class="class-info">
                                    <div class="class-icon english"></div>
                                    <div class="class-details">
                                        <span class="class-name">English</span>
                                        <span class="class-code">ENG102 • 30 students</span>
                                    </div>
                                </div>
                                <div class="class-attendance">
                                    <span class="attendance-value warning">78%</span>
                                    <div class="mini-progress">
                                        <div class="mini-progress-fill warning" style="width: 78%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="class-item">
                                <div class="class-info">
                                    <div class="class-icon chemistry"></div>
                                    <div class="class-details">
                                        <span class="class-name">Chemistry</span>
                                        <span class="class-code">CHEM201 • 31 students</span>
                                    </div>
                                </div>
                                <div class="class-attendance">
                                    <span class="attendance-value">85%</span>
                                    <div class="mini-progress">
                                        <div class="mini-progress-fill good" style="width: 85%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule Card -->
            <div class="card schedule-card">
                <div class="card-header">
                    <h2 class="card-title">Today's Schedule</h2>
                    <span class="card-date">December 31, 2025</span>
                </div>
                <div class="card-body">
                    <div class="schedule-list">
                        <div class="schedule-item">
                            <div class="schedule-time">
                                <span class="time">08:00</span>
                                <span class="period">AM</span>
                            </div>
                            <div class="schedule-details">
                                <span class="subject">Mathematics</span>
                                <span class="room">Room 101 • 32 students</span>
                            </div>
                            <span class="schedule-status completed">Completed</span>
                        </div>
                        <div class="schedule-item">
                            <div class="schedule-time">
                                <span class="time">10:00</span>
                                <span class="period">AM</span>
                            </div>
                            <div class="schedule-details">
                                <span class="subject">Physics</span>
                                <span class="room">Room 203 • 28 students</span>
                            </div>
                            <span class="schedule-status completed">Completed</span>
                        </div>
                        <div class="schedule-item active">
                            <div class="schedule-time">
                                <span class="time">01:00</span>
                                <span class="period">PM</span>
                            </div>
                            <div class="schedule-details">
                                <span class="subject">Computer Science</span>
                                <span class="room">Lab 3 • 35 students</span>
                            </div>
                            <span class="schedule-status ongoing">Ongoing</span>
                        </div>
                        <div class="schedule-item">
                            <div class="schedule-time">
                                <span class="time">03:00</span>
                                <span class="period">PM</span>
                            </div>
                            <div class="schedule-details">
                                <span class="subject">English</span>
                                <span class="room">Room 105 • 30 students</span>
                            </div>
                            <span class="schedule-status upcoming">Upcoming</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/teacher-dashboard.js"></script>
</body>
</html>
