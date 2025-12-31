<?php
$pageTitle = 'Students';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - Attendance Management System</title>
    <link rel="stylesheet" href="../css/teacher_students.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>

    <main class="main-content">
        <?php include '../navbar.php'; ?>

        <div class="students-content">
            <!-- Search & Filter Bar -->
            <div class="search-filter-bar">
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Search students by name or ID...">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
                <div class="filter-actions">
                    <select class="filter-select" id="classFilter">
                        <option value="">All Classes</option>
                        <option value="math101">MATH101 - Mathematics</option>
                        <option value="phy201">PHY201 - Physics</option>
                        <option value="cs301">CS301 - Computer Science</option>
                        <option value="eng102">ENG102 - English</option>
                        <option value="chem201">CHEM201 - Chemistry</option>
                    </select>
                    <select class="filter-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="good">Good Standing (≥80%)</option>
                        <option value="warning">Warning (60-79%)</option>
                        <option value="critical">Critical (&lt;60%)</option>
                    </select>
                </div>
            </div>

            <!-- Students Summary -->
            <div class="summary-row">
                <div class="summary-item">
                    <span class="summary-count">156</span>
                    <span class="summary-label">Total Students</span>
                </div>
                <div class="summary-item good">
                    <span class="summary-count">128</span>
                    <span class="summary-label">Good Standing</span>
                </div>
                <div class="summary-item warning">
                    <span class="summary-count">21</span>
                    <span class="summary-label">Warning</span>
                </div>
                <div class="summary-item critical">
                    <span class="summary-count">7</span>
                    <span class="summary-label">Critical</span>
                </div>
            </div>

            <!-- Students Table -->
            <div class="card students-table-card">
                <div class="card-header">
                    <h2 class="card-title">Student List</h2>
                    <button class="btn btn-outline">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="students-table">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Student ID</th>
                                    <th>Class</th>
                                    <th>Attendance</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="student-cell">
                                            <div class="student-avatar">JS</div>
                                            <span class="student-name">John Smith</span>
                                        </div>
                                    </td>
                                    <td>STU-00001</td>
                                    <td>MATH101</td>
                                    <td>
                                        <div class="attendance-cell">
                                            <div class="mini-progress">
                                                <div class="mini-progress-fill excellent" style="width: 95%"></div>
                                            </div>
                                            <span>95%</span>
                                        </div>
                                    </td>
                                    <td><span class="status-badge good">Good</span></td>
                                    <td>
                                        <button class="action-btn view" title="View Details">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="student-cell">
                                            <div class="student-avatar">MJ</div>
                                            <span class="student-name">Maria Johnson</span>
                                        </div>
                                    </td>
                                    <td>STU-00002</td>
                                    <td>PHY201</td>
                                    <td>
                                        <div class="attendance-cell">
                                            <div class="mini-progress">
                                                <div class="mini-progress-fill good" style="width: 88%"></div>
                                            </div>
                                            <span>88%</span>
                                        </div>
                                    </td>
                                    <td><span class="status-badge good">Good</span></td>
                                    <td>
                                        <button class="action-btn view" title="View Details">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="student-cell">
                                            <div class="student-avatar">RG</div>
                                            <span class="student-name">Robert Garcia</span>
                                        </div>
                                    </td>
                                    <td>STU-00003</td>
                                    <td>CS301</td>
                                    <td>
                                        <div class="attendance-cell">
                                            <div class="mini-progress">
                                                <div class="mini-progress-fill warning" style="width: 72%"></div>
                                            </div>
                                            <span>72%</span>
                                        </div>
                                    </td>
                                    <td><span class="status-badge warning">Warning</span></td>
                                    <td>
                                        <button class="action-btn view" title="View Details">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="student-cell">
                                            <div class="student-avatar">EW</div>
                                            <span class="student-name">Emily Wilson</span>
                                        </div>
                                    </td>
                                    <td>STU-00004</td>
                                    <td>ENG102</td>
                                    <td>
                                        <div class="attendance-cell">
                                            <div class="mini-progress">
                                                <div class="mini-progress-fill danger" style="width: 55%"></div>
                                            </div>
                                            <span>55%</span>
                                        </div>
                                    </td>
                                    <td><span class="status-badge critical">Critical</span></td>
                                    <td>
                                        <button class="action-btn view" title="View Details">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="student-cell">
                                            <div class="student-avatar">DL</div>
                                            <span class="student-name">David Lee</span>
                                        </div>
                                    </td>
                                    <td>STU-00005</td>
                                    <td>CHEM201</td>
                                    <td>
                                        <div class="attendance-cell">
                                            <div class="mini-progress">
                                                <div class="mini-progress-fill excellent" style="width: 92%"></div>
                                            </div>
                                            <span>92%</span>
                                        </div>
                                    </td>
                                    <td><span class="status-badge good">Good</span></td>
                                    <td>
                                        <button class="action-btn view" title="View Details">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        <span class="pagination-info">Showing 1-5 of 156 students</span>
                        <div class="pagination-controls">
                            <button class="pagination-btn" disabled>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button class="pagination-btn active">1</button>
                            <button class="pagination-btn">2</button>
                            <button class="pagination-btn">3</button>
                            <button class="pagination-btn">...</button>
                            <button class="pagination-btn">32</button>
                            <button class="pagination-btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/teacher-dashboard.js"></script>
</body>
</html>
