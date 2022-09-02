<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Ums\AdminToolsController;
use App\Http\Controllers\Ums\TeacherToolsController;
use App\Http\Controllers\Ums\ChairToolsController;
use App\Http\Controllers\Cms\ThemeController;
use App\Http\Controllers\Cms\RequisitionController;
use App\Http\Controllers\Ums\DriversController;
use App\Http\Controllers\Ums\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/generate-role', [RoleController::class, 'generate_role'])->name('generate.role');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::post('/save-theme', [ThemeController::class, 'select_theme'])->name('select.theme');
	Route::get('/requisition/{id}', [RequisitionController::class, 'manage_requisition'])->name('manage.requisition');
	Route::get('/requisition/print/{id}', [RequisitionController::class, 'print_requisition'])->name('print.requisition');

	Route::post('/save/basic-info', [ProfileController::class, 'save_basic_info'])->name('save.basic.info');
	Route::post('/save/change-password', [ProfileController::class, 'change_auth_password'])->name('change.auth.password');
		
	Route::group(['prefix' => 'administrator'], function(){
		Route::get('/dashboard', [AdminToolsController::class, 'dashboard'])->name('administrator.dashboard');
		Route::get('/all-drivers', [DriversController::class, 'index'])->name('driver.index');
		Route::get('/add-driver', [DriversController::class, 'create'])->name('driver.create');
		Route::post('/store-driver', [DriversController::class, 'store'])->name('driver.store');
		Route::get('/driver/edit/{id}', [DriversController::class, 'edit'])->name('driver.edit');
		Route::post('driver/update/{id}', [DriversController::class, 'update'])->name('driver.update');
		Route::delete('/driver/delete/{id}', [DriversController::class, 'destroy'])->name('driver.destroy');
		Route::get('/scheduled-drivers', [DriversController::class, 'scheduled'])->name('driver.scheduled');

		Route::get('/teachers-list', [AdminToolsController::class, 'teachers_list'])->name('teachers.list');
		Route::get('/approval-list', [AdminToolsController::class, 'approval_list'])->name('approval.list');
		Route::post('/approve-teacher', [AdminToolsController::class, 'approve_teacher'])->name('approve.teacher');
		Route::post('/decline-teacher', [AdminToolsController::class, 'decline_teacher'])->name('decline.teacher');

		Route::get('/requisition/pending', [AdminToolsController::class, 'pending_requisitions'])->name('administration.pending.requisition');
		Route::get('/requisition/approved', [AdminToolsController::class, 'approved_requisitions'])->name('administration.approved.requisition');
		Route::get('/requisition/declined', [AdminToolsController::class, 'declined_requisitions'])->name('administration.declined.requisition');
		Route::get('/requisition/forwarded-to-vc', [AdminToolsController::class, 'forwarded_requisitions'])->name('administration.forwarded.requisition');

		Route::post('/confirm-requisition', [AdminToolsController::class, 'admin_confirm_requisition'])->name('admin.confirm.requisition');
		Route::post('/reject-requisition', [AdminToolsController::class, 'admin_reject_requisition'])->name('admin.reject.requisition');
		Route::post('/forward-requisition', [AdminToolsController::class, 'admin_forward_requisition'])->name('admin.forward.requisition');

		Route::post('/store-extra', [AdminToolsController::class, 'store_extra'])->name('store.extra');
	});

	Route::group(['prefix' => 'backend'], function(){
		Route::get('/wait-for-approval', [TeacherToolsController::class, 'wait_approval'])->name('wait.approval');

		Route::middleware(['approved'])->group(function () {
			Route::get('/dashboard', [TeacherToolsController::class, 'teacher_dashboard'])->name('teacher.dashboard');
			Route::get('/requisition/get-started', [TeacherToolsController::class, 'get_started'])->name('get.started');
			Route::post('/requisition/create/personal', [TeacherToolsController::class, 'personal_requisition'])->name('create.personal.requisition');
			Route::post('/requisition/create/official', [TeacherToolsController::class, 'official_requisition'])->name('create.official.requisition');

			Route::post('/requisition/store', [TeacherToolsController::class, 'store_requisition'])->name('store.requisition');

			Route::get('/requisition/forwared/vice-chancellor', [TeacherToolsController::class, 'pending_chairman'])->name('teacher.pending.chairman');
			Route::get('/requisition/pending/administration', [TeacherToolsController::class, 'pending_administration'])->name('teacher.pending.administration');
			Route::get('/requisition/approved/administration', [TeacherToolsController::class, 'approved_requisition'])->name('teacher.approved.administration');
			Route::get('/requisition/approved/vice-chancellor', [TeacherToolsController::class, 'approved_vc'])->name('teacher.approved.vc');
			Route::get('/requisition/declined/vice-chancellor', [TeacherToolsController::class, 'declined_chairman'])->name('teacher.declined.chairman');
			Route::get('/requisition/declined/administration', [TeacherToolsController::class, 'declined_administration'])->name('teacher.declined.administration');
		});
	});

	Route::group(['prefix' => 'vice-chancellor'], function(){
		
		Route::get('/dashboard', [ChairToolsController::class, 'chairman_dashboard'])->name('chairman.dashboard');

		Route::get('/requisition/pending', [ChairToolsController::class, 'pending_requisitions'])->name('chairman.pending.requisition');
		Route::get('/requisition/approved', [ChairToolsController::class, 'approved_requisitions'])->name('chairman.approved.requisition');
		Route::get('/requisition/declined', [ChairToolsController::class, 'declined_requisitions'])->name('chairman.declined.requisition');

		Route::post('/approve-requisition', [ChairToolsController::class, 'chair_approve_requisition'])->name('chair.approve.requisition');
		Route::post('/decline-requisition', [ChairToolsController::class, 'chair_decline_requisition'])->name('chair.decline.requisition');
	});

});
