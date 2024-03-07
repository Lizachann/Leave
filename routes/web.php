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

//route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');


//Route::get('/tests', 'App\Http\Controllers\TestController@index')->name('tests.index');
//Route::post('/tests', 'App\Http\Controllers\TestController@store')->name('tests.store');


//
//
//Route::middleware('auth')->group(function () {
//
//    Route::controller(HomeController::class)->group(function(){
//
//        route::get('/home', 'index')->name('home');
//
//    });
//});


Route::middleware('auth')->group(function () {

    Route::controller(HomeController::class)->group(function(){
        route::get('/home', 'index')->name('home');

    });
    Route::controller(ProfileController::class)->group(function(){
        route::get('/profile', 'index')->name('profile');
        Route::post('/password', 'update')->name('password.update');
        Route::post('/info', 'setting')->name('info.update');

    });

});

Route::middleware(['auth','admin'])->group(function () {
    Route::controller(AdminController::class)->group(function(){

        route::get('post','post');
//        route::get('/home','dashboard')->name('admin.dashboard');

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

        route::get('/hod/applyleave','applyLeave')->name('hod.applyLeave');
        route::post('/hod/applyleave','store_applyLeave')->name('hod.applyLeave.store');


        route::get('/hod/all/leave','view_all_leave')->name('hod_view_all_leave');
        route::get('/hod/pending/leave','view_pending_leave');
        route::get('/hod/approved/leave','view_approved_leave');
        route::get('/hod/rejected/leave','view_rejected_leave');

        route::get('/hod/leave_detail/%&{id}$','hod_view_leave_detail')->name('hod_view_leave_detail');
        route::post('/hod/leave_detail/%&{id}$','hod_approval')->name('hod_approval');

        route::get('/hod/leave/history','leave_history')->name('hod_leave_history');

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


//Route::middleware('auth')->group(function () {
//
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});






require __DIR__.'/auth.php';
