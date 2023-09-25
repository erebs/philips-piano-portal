<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\adm\AdminController;
use App\Http\Controllers\adm\AdminPlanController;
use App\Http\Controllers\adm\AdminSloteController;
use App\Http\Controllers\adm\StudentController;
use App\Http\Controllers\adm\BlogController;
use App\Http\Controllers\adm\ChatController;
use App\Http\Controllers\adm\AdmTeacherController;
use App\Http\Controllers\adm\ReportController;
use App\Http\Controllers\teacher\TeacherController;
use App\Http\Controllers\teacher\TeacherAttendanceController;

Route::get('/' , [AdminController::class, 'login']);


Route::get('/administrator', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin_login', [AdminController::class, 'admin_login']);

Route::get('/teacher', [TeacherController::class, 'login'])->name('teacher.login');
Route::post('/teacher_login', [TeacherController::class, 'teacher_login']);

Route::middleware(['AdminLoginCheck','PreventBack'])->group(function () {


Route::get('/administrator/dashboard' , [AdminController::class, 'dashboard']);
Route::get('/administrator/logout' , [AdminController::class, 'logout']);
Route::get('/administrator/change-password', [AdminController::class, 'change_password']);
Route::post('/administrator/password-update', [AdminController::class, 'password_update']);
Route::get('/administrator/edit-profile', [AdminController::class, 'edit_admin_profile']);
Route::post('/administrator/profile-update', [AdminController::class, 'admin_profile_update']);

Route::get('/administrator/add-plan', [AdminPlanController::class, 'add_plan']);
Route::post('/administrator/plan-add', [AdminPlanController::class, 'plan_add']);
Route::get('/administrator/plans', [AdminPlanController::class, 'plans']);
Route::post('/administrator/delete-plan', [AdminPlanController::class, 'delete_plan']);
Route::get('/administrator/edit-plan/{pid}', [AdminPlanController::class, 'edit_plan']);
Route::post('/administrator/plan-edit', [AdminPlanController::class, 'plan_edit']);

Route::get('/administrator/deposit', [AdminPlanController::class, 'deposit']);
Route::post('/administrator/deposit-edit', [AdminPlanController::class, 'deposit_edit']);

Route::get('/administrator/online-slotes', [AdminSloteController::class, 'online_slotes']);
Route::post('/administrator/onlineslote-add', [AdminSloteController::class, 'onlineslote_add']);
Route::post('/administrator/onlineslote-edit', [AdminSloteController::class, 'onlineslote_edit']);
Route::post('/administrator/delete-slote', [AdminSloteController::class, 'delete_slote']);

Route::get('/administrator/offline-branches', [AdminSloteController::class, 'offline_branches']);
Route::post('/administrator/branch-add', [AdminSloteController::class, 'branch_add']);
Route::post('/administrator/branch-edit', [AdminSloteController::class, 'branch_edit']);

Route::get('/administrator/offline-slotes/{bid}', [AdminSloteController::class, 'offline_slotes']);
Route::post('/administrator/offlineslote-add', [AdminSloteController::class, 'offlineslote_add']);
Route::post('/administrator/offlineslote-edit', [AdminSloteController::class, 'offlineslote_edit']);
Route::post('/administrator/delete-offlineslote', [AdminSloteController::class, 'delete_offlineslote']);

Route::get('/administrator/student-slotes/{bid}', [AdminSloteController::class, 'student_slotes']);

Route::get('/administrator/approval-pending', [StudentController::class, 'approval_pending']);
Route::get('/administrator/student-view/{sid}', [StudentController::class, 'student_view']);

Route::post('/administrator/reject-student', [StudentController::class, 'reject_student']);
Route::get('/administrator/rejected-apps', [StudentController::class, 'rejected_apps']);

Route::post('/administrator/approve-student', [StudentController::class, 'approve_student']);


Route::get('/administrator/add-blog', [BlogController::class, 'add_blog']);
Route::post('/administrator/blog-add', [BlogController::class, 'blog_add']);
Route::get('/administrator/blogs', [BlogController::class, 'blogs']);
Route::post('/administrator/delete-blog', [BlogController::class, 'delete_blog']);
Route::get('/administrator/edit-blog/{bid}', [BlogController::class, 'edit_blog']);
Route::post('/administrator/blog-edit', [BlogController::class, 'blog_edit']);

Route::get('/administrator/add-video', [BlogController::class, 'add_video']);
Route::post('/administrator/video-add', [BlogController::class, 'video_add']);
Route::get('/administrator/videos', [BlogController::class, 'videos']);
Route::post('/administrator/delete-video', [BlogController::class, 'delete_video']);
Route::get('/administrator/edit-video/{vid}', [BlogController::class, 'edit_video']);
Route::post('/administrator/video-edit', [BlogController::class, 'video_edit']);

Route::get('/administrator/chats/{sid}', [ChatController::class, 'chats']);
Route::post('/administrator/send-msg', [ChatController::class, 'send_msg']);
Route::post('/administrator/all-chats', [ChatController::class, 'all_chats']);
Route::post('/administrator/delete-msg', [ChatController::class, 'delete_msg']);


Route::get('/administrator/active-students', [StudentController::class, 'active_students']);
Route::get('/administrator/expired-students', [StudentController::class, 'expired_students']);
Route::get('/administrator/student-details/{sid}', [StudentController::class, 'student_details']);
Route::post('/administrator/payment-approval', [StudentController::class, 'payment_approval']);
Route::post('/administrator/approve-payment', [StudentController::class, 'approve_payment']);
Route::post('/administrator/payment-method', [StudentController::class, 'payment_method']);

Route::post('/administrator/block-student', [StudentController::class, 'block_student']);
Route::post('/administrator/activate-student', [StudentController::class, 'activate_student']);
Route::post('/administrator/deactivate-student', [StudentController::class, 'deactivate_student']);
Route::get('/administrator/blocked-students', [StudentController::class, 'blocked_students']);
Route::get('/administrator/deactivated-students', [StudentController::class, 'deactivated_students']);
Route::post('/administrator/complete-student', [StudentController::class, 'complete_student']);
Route::get('/administrator/completed-students', [StudentController::class, 'completed_students']);

Route::get('/administrator/installment-pending', [StudentController::class, 'installment_pending']);
Route::get('/administrator/pending-refund-requests', [StudentController::class, 'pending_refund_requests']);
Route::get('/administrator/paid-refund-requests', [StudentController::class, 'paid_refund_requests']);
Route::get('/administrator/rejected-refund-requests', [StudentController::class, 'rejected_refund_requests']);
Route::post('/administrator/repay-deposit', [StudentController::class, 'repay_deposit']);
Route::post('/administrator/reject-deporeq', [StudentController::class, 'reject_deporeq']);

Route::get('/administrator/add-teacher', [AdmTeacherController::class, 'add_teacher']);
Route::post('/administrator/teacher-add', [AdmTeacherController::class, 'teacher_add']);
Route::get('/administrator/active-teachers', [AdmTeacherController::class, 'active_teachers']);
Route::post('/administrator/block-teacher', [AdmTeacherController::class, 'block_teacher']);
Route::get('/administrator/blocked-teachers', [AdmTeacherController::class, 'blocked_teachers']);
Route::post('/administrator/activate-teacher', [AdmTeacherController::class, 'activate_teacher']);
Route::get('/administrator/edit-teacher/{tid}', [AdmTeacherController::class, 'edit_teacher']);
Route::post('/administrator/teacher-edit', [AdmTeacherController::class, 'teacher_edit']);
Route::post('/administrator/teacher-psw-update', [AdmTeacherController::class, 'teacher_psw_update']);

Route::get('/administrator/slote-curdates/{sid}/{day}', [AdminSloteController::class, 'slote_curdates']);
Route::get('/administrator/online-students/{sid}/{dt}', [AdminSloteController::class, 'online_students']);
Route::post('/administrator/attendance-status', [AdminSloteController::class, 'attendance_status']);
Route::get('/administrator/add-note/{aid}', [AdminSloteController::class, 'add_note']);
Route::post('/administrator/note-add', [AdminSloteController::class, 'note_add']);

Route::post('/administrator/attendance-extrastatus', [AdminSloteController::class, 'attendance_extrastatus']);
Route::get('/administrator/add-extranote/{aid}', [AdminSloteController::class, 'add_extranote']);
Route::post('/administrator/extranote-add', [AdminSloteController::class, 'extranote_add']);

Route::get('/administrator/slote-alldates/{sid}', [AdminSloteController::class, 'slote_alldates']);

Route::get('/administrator/offlineslote-curdates/{sid}/{day}', [AdminSloteController::class, 'offlineslote_curdates']);
Route::get('/administrator/offlineslote-alldates/{sid}', [AdminSloteController::class, 'offlineslote_alldates']);

Route::get('/administrator/cancelled-classes', [StudentController::class, 'cancelled_classes']);
Route::post('/administrator/add-class', [StudentController::class, 'add_class']);
Route::post('/administrator/delete-class', [StudentController::class, 'delete_class']);

Route::get('/administrator/credit-classes', [StudentController::class, 'credit_classes']);
Route::get('/administrator/paid-classes', [StudentController::class, 'paid_classes']);

Route::get('/administrator/deposit-report', [ReportController::class, 'deposit_report']);
Route::post('/administrator/get-deposits', [ReportController::class, 'get_deposit']);

Route::get('/administrator/single-fee', [ReportController::class, 'single_fee']);
Route::post('/administrator/single-fee', [ReportController::class, 'get_single_fee']);

Route::get('/administrator/installment-fee', [ReportController::class, 'installment_fee']);
Route::post('/administrator/installment-fee', [ReportController::class, 'get_installment_fee']);

Route::get('/administrator/paid-class-report', [ReportController::class, 'paid_class_report']);
Route::post('/administrator/paid-class-report', [ReportController::class, 'get_paid_class_report']);




   
});


Route::middleware(['TeacherLoginCheck','PreventBack'])->group(function () {

Route::get('/teacher/dashboard' , [TeacherController::class, 'dashboard']);
Route::get('/teacher/logout' , [TeacherController::class, 'logout']);
Route::get('/teacher/change-password', [TeacherController::class, 'change_password']);
Route::post('/teacher/password-update', [TeacherController::class, 'password_update']);
Route::get('/teacher/edit-profile', [TeacherController::class, 'edit_admin_profile']);
Route::post('/teacher/profile-update', [TeacherController::class, 'admin_profile_update']);

Route::get('/teacher/online-slotes', [TeacherAttendanceController::class, 'online_slotes']);
Route::get('/teacher/slote-curdates/{sid}/{day}', [TeacherAttendanceController::class, 'slote_curdates']);
Route::get('/teacher/online-students/{sid}/{dt}', [TeacherAttendanceController::class, 'online_students']);
Route::post('/teacher/attendance-status', [TeacherAttendanceController::class, 'attendance_status']);
Route::get('/teacher/add-note/{aid}', [TeacherAttendanceController::class, 'add_note']);

Route::post('/teacher/attendance-extrastatus', [TeacherAttendanceController::class, 'attendance_extrastatus']);
Route::get('/teacher/add-extranote/{aid}', [TeacherAttendanceController::class, 'add_extranote']);

Route::post('/teacher/note-add', [TeacherAttendanceController::class, 'note_add']);
Route::post('/teacher/extranote-add', [TeacherAttendanceController::class, 'extranote_add']);
Route::get('/teacher/slote-alldates/{sid}', [TeacherAttendanceController::class, 'slote_alldates']);

Route::get('/teacher/offline-branches', [TeacherAttendanceController::class, 'offline_branches']);
Route::get('/teacher/offline-slotes/{bid}', [TeacherAttendanceController::class, 'offline_slotes']);
Route::get('/teacher/offlineslote-curdates/{sid}/{day}', [TeacherAttendanceController::class, 'offlineslote_curdates']);
Route::get('/teacher/offlineslote-alldates/{sid}', [TeacherAttendanceController::class, 'offlineslote_alldates']);


});





