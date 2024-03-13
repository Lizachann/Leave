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
        route::get('/admin/all/leave','view_all_leave')->name('view_all_leave');
        route::get('/admin/pending/leave','view_pending_leave');
        route::get('/admin/approved/leave','view_approved_leave');
        route::get('/admin/rejected/leave','view_rejected_leave');

        route::get('/admin/leave_detail/%&{id}$','view_leave_detail')->name('admin_view_leave_detail');
        route::post('/admin/leave_detail/%&{id}$','admin_approval')->name('admin_approval');




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


        route::get('/staff/leave_detail/%&{id}$','view_leave_detail')->name('staff_view_leave_detail');


    });
});






require __DIR__.'/auth.php';
