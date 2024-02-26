<?php

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

route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');


//Route::get('/tests', 'App\Http\Controllers\TestController@index')->name('tests.index');
//Route::post('/tests', 'App\Http\Controllers\TestController@store')->name('tests.store');


Route::middleware(['auth','admin'])->group(function () {
    Route::controller(AdminController::class)->group(function(){

        route::get('post','post');


        route::get('/admin/addStaff','addStaff')->name('admin.addStaff');
        route::post('/admin/addStaff','storeAddStaff')->name('admin.addStaff.store');
//        view leave
        route::get('/admin/all/leave','view_all_leave');
        route::get('/admin/pending/leave','view_pending_leave');
        route::get('/admin/approved/leave','view_approved_leave');
        route::get('/admin/rejected/leave','view_rejected_leave');

        route::get('/admin/leave_detail','leave_detail');




    });
});

Route::middleware(['auth','hod'])->group(function () {
    Route::controller(AdminController::class)->group(function(){
//        route::get('post','post');

    });
});


Route::middleware(['auth','staff'])->group(function () {
    Route::controller(StaffController::class)->group(function(){
        route::get('/staff/applyleave','applyLeave')->name('staff.applyLeave');
        route::post('/staff/applyleave','store_applyLeave')->name('staff.applyLeave.store');

    });
});


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
