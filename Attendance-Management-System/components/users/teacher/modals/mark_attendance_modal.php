<!-- Mark Attendance Modal -->
<div class="modal-overlay" id="markAttendanceModal">
    <div class="modal-container">
        <div class="modal-header">
            <h2 class="modal-title">Mark Attendance</h2>
            <button class="modal-close" onclick="closeMarkAttendanceModal()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <!-- Class Info -->
            <div class="class-info-header">
                <div class="class-details">
                    <h3 class="class-name" id="modalClassName">MATH101 - Mathematics</h3>
                    <span class="class-meta">Room 101 • 32 Students</span>
                </div>
                <div class="date-display">
                    <span class="date-label">Date</span>
                    <span class="date-value" id="modalDate">December 30, 2025</span>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="quick-btn" onclick="markAllPresent()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Mark All Present
                </button>
                <button class="quick-btn outline" onclick="clearAll()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset
                </button>
            </div>

            <!-- Student List -->
            <div class="attendance-list">
                <div class="attendance-item">
                    <div class="student-info">
                        <div class="student-avatar">JS</div>
                        <div class="student-details">
                            <span class="student-name">John Smith</span>
                            <span class="student-id">STU-00001</span>
                        </div>
                    </div>
                    <div class="attendance-options">
                        <label class="attendance-option present">
                            <input type="radio" name="student_1" value="present" checked>
                            <span class="option-label">Present</span>
                        </label>
                        <label class="attendance-option late">
                            <input type="radio" name="student_1" value="late">
                            <span class="option-label">Late</span>
                        </label>
                        <label class="attendance-option absent">
                            <input type="radio" name="student_1" value="absent">
                            <span class="option-label">Absent</span>
                        </label>
                    </div>
                </div>
                <div class="attendance-item">
                    <div class="student-info">
                        <div class="student-avatar">MJ</div>
                        <div class="student-details">
                            <span class="student-name">Maria Johnson</span>
                            <span class="student-id">STU-00002</span>
                        </div>
                    </div>
                    <div class="attendance-options">
                        <label class="attendance-option present">
                            <input type="radio" name="student_2" value="present" checked>
                            <span class="option-label">Present</span>
                        </label>
                        <label class="attendance-option late">
                            <input type="radio" name="student_2" value="late">
                            <span class="option-label">Late</span>
                        </label>
                        <label class="attendance-option absent">
                            <input type="radio" name="student_2" value="absent">
                            <span class="option-label">Absent</span>
                        </label>
                    </div>
                </div>
                <div class="attendance-item">
                    <div class="student-info">
                        <div class="student-avatar">RG</div>
                        <div class="student-details">
                            <span class="student-name">Robert Garcia</span>
                            <span class="student-id">STU-00003</span>
                        </div>
                    </div>
                    <div class="attendance-options">
                        <label class="attendance-option present">
                            <input type="radio" name="student_3" value="present">
                            <span class="option-label">Present</span>
                        </label>
                        <label class="attendance-option late">
                            <input type="radio" name="student_3" value="late" checked>
                            <span class="option-label">Late</span>
                        </label>
                        <label class="attendance-option absent">
                            <input type="radio" name="student_3" value="absent">
                            <span class="option-label">Absent</span>
                        </label>
                    </div>
                </div>
                <div class="attendance-item">
                    <div class="student-info">
                        <div class="student-avatar">EW</div>
                        <div class="student-details">
                            <span class="student-name">Emily Wilson</span>
                            <span class="student-id">STU-00004</span>
                        </div>
                    </div>
                    <div class="attendance-options">
                        <label class="attendance-option present">
                            <input type="radio" name="student_4" value="present">
                            <span class="option-label">Present</span>
                        </label>
                        <label class="attendance-option late">
                            <input type="radio" name="student_4" value="late">
                            <span class="option-label">Late</span>
                        </label>
                        <label class="attendance-option absent">
                            <input type="radio" name="student_4" value="absent" checked>
                            <span class="option-label">Absent</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="attendance-summary">
                <span class="summary-stat present"><span id="presentCount">2</span> Present</span>
                <span class="summary-stat late"><span id="lateCount">1</span> Late</span>
                <span class="summary-stat absent"><span id="absentCount">1</span> Absent</span>
            </div>
            <div class="modal-actions">
                <button class="btn btn-outline" onclick="closeMarkAttendanceModal()">Cancel</button>
                <button class="btn btn-primary" onclick="saveAttendance()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                    Save Attendance
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Modal Styles */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.modal-overlay.active {
    display: flex;
}
.modal-container {
    background: var(--card-bg, #fff);
    border-radius: 16px;
    width: 100%;
    max-width: 600px;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 24px;
    border-bottom: 1px solid var(--border-color, #e7e5e4);
}
.modal-title {
    font-size: 20px;
    font-weight: 600;
    color: var(--text-primary, #1c1917);
}
.modal-close {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: none;
    background: transparent;
    color: var(--text-secondary, #57534e);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}
.modal-close:hover {
    background: var(--bg-color, #fafaf9);
    color: var(--text-primary, #1c1917);
}
.modal-body {
    padding: 20px 24px;
    overflow-y: auto;
    flex: 1;
}
.modal-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 24px;
    border-top: 1px solid var(--border-color, #e7e5e4);
    background: var(--bg-color, #fafaf9);
    border-radius: 0 0 16px 16px;
    flex-wrap: wrap;
    gap: 12px;
}

/* Class Info Header */
.class-info-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--border-color, #e7e5e4);
}
.class-name {
    font-size: 16px;
    font-weight: 600;
    color: var(--text-primary, #1c1917);
    margin-bottom: 4px;
}
.class-meta {
    font-size: 13px;
    color: var(--text-secondary, #57534e);
}
.date-display {
    text-align: right;
}
.date-label {
    display: block;
    font-size: 11px;
    color: var(--text-secondary, #57534e);
    text-transform: uppercase;
    margin-bottom: 2px;
}
.date-value {
    font-size: 14px;
    font-weight: 600;
    color: var(--primary-color, #84cc16);
}

/* Quick Actions */
.quick-actions {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
}
.quick-btn {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    background: var(--primary-color, #84cc16);
    color: var(--text-white, #fff);
    border: none;
}
.quick-btn:hover {
    background: var(--primary-hover, #65a30d);
}
.quick-btn.outline {
    background: transparent;
    border: 1px solid var(--border-color, #e7e5e4);
    color: var(--text-primary, #1c1917);
}
.quick-btn.outline:hover {
    border-color: var(--primary-color, #84cc16);
    color: var(--primary-color, #84cc16);
}

/* Attendance List */
.attendance-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.attendance-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px;
    background: var(--bg-color, #fafaf9);
    border-radius: 10px;
    gap: 16px;
}
.student-info {
    display: flex;
    align-items: center;
    gap: 12px;
}
.student-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--primary-color, #84cc16);
    color: var(--text-white, #fff);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 14px;
    flex-shrink: 0;
}
.student-details {
    display: flex;
    flex-direction: column;
}
.student-name {
    font-weight: 500;
    color: var(--text-primary, #1c1917);
    font-size: 14px;
}
.student-id {
    font-size: 12px;
    color: var(--text-secondary, #57534e);
}
.attendance-options {
    display: flex;
    gap: 8px;
}
.attendance-option {
    cursor: pointer;
}
.attendance-option input {
    display: none;
}
.option-label {
    display: block;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    border: 1px solid var(--border-color, #e7e5e4);
    background: var(--card-bg, #fff);
    color: var(--text-secondary, #57534e);
    transition: all 0.2s;
}
.attendance-option.present input:checked + .option-label {
    background: rgba(34, 197, 94, 0.15);
    border-color: var(--success-color, #22c55e);
    color: var(--success-color, #22c55e);
}
.attendance-option.late input:checked + .option-label {
    background: rgba(234, 179, 8, 0.15);
    border-color: var(--warning-color, #eab308);
    color: var(--warning-color, #eab308);
}
.attendance-option.absent input:checked + .option-label {
    background: rgba(239, 68, 68, 0.15);
    border-color: var(--danger-color, #ef4444);
    color: var(--danger-color, #ef4444);
}

/* Attendance Summary */
.attendance-summary {
    display: flex;
    gap: 16px;
}
.summary-stat {
    font-size: 13px;
    font-weight: 500;
}
.summary-stat.present { color: var(--success-color, #22c55e); }
.summary-stat.late { color: var(--warning-color, #eab308); }
.summary-stat.absent { color: var(--danger-color, #ef4444); }

/* Modal Actions */
.modal-actions {
    display: flex;
    gap: 12px;
}
.btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    border: none;
}
.btn-primary {
    background: var(--primary-color, #84cc16);
    color: var(--text-white, #fff);
}
.btn-primary:hover {
    background: var(--primary-hover, #65a30d);
}
.btn-outline {
    background: transparent;
    border: 1px solid var(--border-color, #e7e5e4);
    color: var(--text-primary, #1c1917);
}
.btn-outline:hover {
    border-color: var(--text-secondary, #57534e);
}

/* Responsive */
@media (max-width: 576px) {
    .modal-container {
        max-height: 95vh;
    }
    .modal-header, .modal-body, .modal-footer {
        padding: 16px;
    }
    .class-info-header {
        flex-direction: column;
        gap: 12px;
    }
    .date-display {
        text-align: left;
    }
    .quick-actions {
        flex-direction: column;
    }
    .attendance-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    .attendance-options {
        width: 100%;
        justify-content: space-between;
    }
    .modal-footer {
        flex-direction: column;
    }
    .attendance-summary {
        width: 100%;
        justify-content: space-around;
    }
    .modal-actions {
        width: 100%;
    }
    .modal-actions .btn {
        flex: 1;
        justify-content: center;
    }
}
</style>

<script>
function openMarkAttendanceModal(className, date) {
    document.getElementById('markAttendanceModal').classList.add('active');
    if (className) document.getElementById('modalClassName').textContent = className;
    if (date) document.getElementById('modalDate').textContent = date;
    document.body.style.overflow = 'hidden';
}

function closeMarkAttendanceModal() {
    document.getElementById('markAttendanceModal').classList.remove('active');
    document.body.style.overflow = '';
}

function markAllPresent() {
    document.querySelectorAll('.attendance-option.present input').forEach(input => {
        input.checked = true;
    });
    updateCounts();
}

function clearAll() {
    document.querySelectorAll('.attendance-option.present input').forEach(input => {
        input.checked = true;
    });
    updateCounts();
}

function updateCounts() {
    const present = document.querySelectorAll('.attendance-option.present input:checked').length;
    const late = document.querySelectorAll('.attendance-option.late input:checked').length;
    const absent = document.querySelectorAll('.attendance-option.absent input:checked').length;
    
    document.getElementById('presentCount').textContent = present;
    document.getElementById('lateCount').textContent = late;
    document.getElementById('absentCount').textContent = absent;
}

function saveAttendance() {
    // Collect attendance data
    const attendanceData = [];
    document.querySelectorAll('.attendance-item').forEach((item, index) => {
        const selected = item.querySelector('input:checked');
        if (selected) {
            attendanceData.push({
                student: index + 1,
                status: selected.value
            });
        }
    });
    
    console.log('Saving attendance:', attendanceData);
    // TODO: Send to backend API
    
    closeMarkAttendanceModal();
    alert('Attendance saved successfully!');
}

// Update counts when options change
document.addEventListener('change', function(e) {
    if (e.target.matches('.attendance-option input')) {
        updateCounts();
    }
});

// Close modal on overlay click
document.getElementById('markAttendanceModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeMarkAttendanceModal();
    }
});
</script>
