<?php

use App\Http\Controllers\HodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {

    Route::controller(HomeController::class)->group(function(){
        route::get('/home', 'index')->name('home');

    });
    Route::controller(ProfileController::class)->group(function(){
        route::get('/profile', 'index')->name('profile');
        Route::post('/password', 'update')->name('password.update');
        Route::post('/info', 'setting')->name('info.update');
        route::post('/profile', 'store')->name('upload.profile');



    });

});

Route::middleware(['auth','admin'])->group(function () {
    Route::controller(AdminController::class)->group(function(){

        route::get('/admin/addStaff','addStaff')->name('admin.addStaff');
        route::post('/admin/addStaff','storeAddStaff')->name('admin.addStaff.store');
//        view leave
        route::get('/admin/all/leave','view_all_leave')->name('admin_view_staff_leave');
        route::get('/admin/pending/leave','view_pending_leave')->name('admin_pending_staff_leave');
        route::get('/admin/approved/leave','view_approved_leave')->name('admin_approved_staff_leave');
        route::get('/admin/rejected/leave','view_rejected_leave')->name('admin_rejected_staff_leave');

        route::get('/admin/leave_detail/{id}','view_leave_detail')->name('admin_view_leave_detail');
        route::post('/admin/leave_detail/{id}','admin_approval')->name('admin_approval');

        Route::delete('/delete/leave/{id}', 'delete_leave')->name('delete_leave');
        Route::delete('/delete/staff/{id}', 'delete_staff')->name('delete_staff');

        route::post('/admin/staff/{id}','update')->name('admin_pw_update');

        //leave type
        route::get('/admin/leave/annual','annual_leave')->name('admin_annual');
        route::get('/admin/leave/medical','medical_leave')->name('admin_medical');
        route::get('/admin/leave/compensatory','compensatory_leave')->name('admin_compensatory');
        route::get('/admin/leave/maternity','maternity_leave')->name('admin_maternity');

//        manage staff
        route::get('/admin/manage/staff','view_staff')->name('admin_view_staff');
        route::get('/admin/staff{id}info','staff_detail')->name('admin_staff_detail');
        route::post('/admin/staff{id}info','edit_staff_detail')->name('admin_edit_staff_detail');
        route::get('/admin/mange/staff/admin','view_admin')->name('admin_view_admin');
        route::get('/admin/mange/staff/labour','view_labour')->name('admin_view_labour');
        route::get('/admin/mange/staff/it','view_it')->name('admin_view_it');
        route::get('/admin/mange/staff/pr','view_pr')->name('admin_view_pr');
        route::get('/admin/mange/staff/finance','view_finance')->name('admin_view_finance');
        route::get('/admin/mange/staff/membership','view_membership')->name('admin_view_membership');

    });
});

Route::middleware(['auth','hod'])->group(function () {
    Route::controller(HodController::class)->group(function(){

        //apply leave
        route::get('/hod/applyleave','applyLeave')->name('hod.applyLeave');
        route::post('/hod/applyleave','store_applyLeave')->name('hod.applyLeave.store');

        ///view all
        route::get('/hod/all/leave','view_all_leave')->name('hod_view_staff_leave');
        route::get('/hod/pending/leave','view_pending_leave')->name('hod_pending_staff_leave');
        route::get('/hod/approved/leave','view_approved_leave')->name('hod_approved_staff_leave');
        route::get('/hod/rejected/leave','view_rejected_leave')->name('hod_rejected_staff_leave');

        //leave detail
        route::get('/hod/leave_detail/{id}','hod_view_leave_detail')->name('hod_view_leave_detail');
        route::post('/hod/leave_detail/{id}','hod_approval')->name('hod_approval');

        ///view own leave history
        route::get('/hod/leave/history','leave_history')->name('hod_leave_history');
        route::get('/hod/leave/history/pending','pending_leave_history')->name('hod_pending_leave_history');
        route::get('/hod/leave/history/approved','approved_leave_history')->name('hod_approved_leave_history');
        route::get('/hod/leave/history/rejected','rejected_leave_history')->name('hod_rejected_leave_history');

        //leave type
        route::get('/hod/leave/annual','annual_leave')->name('hod_annual');
        route::get('/hod/leave/medical','medical_leave')->name('hod_medical');
        route::get('/hod/leave/compensatory','compensatory_leave')->name('hod_compensatory');
        route::get('/hod/leave/maternity','maternity_leave')->name('hod_maternity');

//        manage staff
        route::get('/hod/manage/staff','view_staff')->name('view_staff');
        route::get('/hod/staff{id}info','staff_detail')->name('staff_detail');
        route::post('/hod/staff{id}info','edit_staff_detail')->name('edit_staff_detail');

        route::post('/hod/staff/{id}','update')->name('hod_pw_update');

    });
});


Route::middleware(['auth','staff'])->group(function () {
    Route::controller(StaffController::class)->group(function(){

//        route::get('/home','dashboard')->name('dashboard');

        route::get('/staff/applyleave','applyLeave')->name('staff.applyLeave');
        route::post('/staff/applyleave','store_applyLeave')->name('staff.applyLeave.store');

        route::get('/staff/leave/history','leave_history')->name('staff_leave_history');
        route::get('/staff/leave/history/pending','pending_leave_history')->name('staff_pending_leave_history');
        route::get('/staff/leave/history/approved','approved_leave_history')->name('staff_approved_leave_history');
        route::get('/staff/leave/history/rejected','rejected_leave_history')->name('staff_rejected_leave_history');

        //leave type
        route::get('/staff/leave/annual','annual_leave')->name('staff_annual');
        route::get('/staff/leave/medical','medical_leave')->name('staff_medical');
        route::get('/staff/leave/compensatory','compensatory_leave')->name('staff_compensatory');
        route::get('/staff/leave/maternity','maternity_leave')->name('staff_maternity');

        route::get('/staff/leave_detail/%&{id}$','view_leave_detail')->name('staff_view_leave_detail');


    });
});






require __DIR__.'/auth.php';
