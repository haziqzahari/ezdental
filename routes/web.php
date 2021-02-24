<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\ClerkController;

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

Auth::routes();

Route::group(['middleware' => 'preventBackHistory'], function(){

    Route::get('/', function () {
        return view('index');
    })->middleware('guest')->name('home');

    Route::group(['middleware' => 'isdentist'], function()
    {
        Route::post('dentist/registercase', [DentistController::class, 'registercase'])->name('dentist.registercase');
        Route::get('dentist/registercase_show', [DentistController::class, 'registercase_show'])->name('dentist.registercase_show');
        Route::get('dentist/casedetails/{id}', [DentistController::class, 'casedetails'])->name('dentist.casedetails');
        Route::get('dentist/caseupdates', [DentistController::class, 'caseupdates'])->name('dentist.caseupdates');
        Route::resource('dentist', DentistController::class);
    });


    Route::group(['middleware' => 'istechnician'], function()
    {
        Route::get('technician/casedetails/{id}', [TechnicianController::class, 'casedetails'])->name('technician.casedetails');
        Route::get('technician/caseupdates', [TechnicianController::class, 'caseupdates'])->name('technician.caseupdates');
        Route::resource('technician', TechnicianController::class);
    });

    Route::group(['middleware' => 'isadmin'], function()
    {
        Route::post('admin/assigncase/{id}', [AdminController::class, 'assigncase'])->name('admin.assigncase');
        Route::get('admin/assignfull', [AdminController::class, 'assignfull'])->name('admin.assignfull');
        Route::get('admin/assignview/{id}', [AdminController::class, 'assignview'])->name('admin.assignview');
        Route::get('admin/userslist', [AdminController::class, 'userslist'])->name('admin.userslist');
        Route::post('admin/verifycase/{id}', [AdminController::class, 'verifycase'])->name('admin.verifycase');
        Route::get('admin/verifyfull_show', [AdminController::class, 'verifyfull_show'])->name('admin.verifyfull_show');
        Route::get('admin/verifycase_view/{id}', [AdminController::class, 'verifycase_view'])->name('admin.verifycase_view');
        Route::post('admin/registercase', [AdminController::class, 'registercase'])->name('admin.registercase');
        Route::get('admin/registercase_show', [AdminController::class, 'registercase_show'])->name('admin.registercase_show');
        Route::get('admin/view_full', [AdminController::class, 'view_full'])->name('admin.view_full');
        Route::resource('admin', AdminController::class);
    });

    Route::group(['middleware' => 'isclerk'], function()
    {
        Route::post('clerk/verifycase/{id}', [ClerkController::class, 'verifycase'])->name('clerk.verifycase');
        Route::post('clerk/registercase', [ClerkController::class, 'registercase'])->name('clerk.registercase');
        Route::get('clerk/registercase_show', [ClerkController::class, 'registercase_show'])->name('clerk.registercase_show');
        Route::get('clerk/verifyfull_show', [ClerkController::class, 'verifyfull_show'])->name('clerk.verifyfull_show');
        Route::get('clerk/verifycase_view/{id}', [ClerkController::class, 'verifycase_view'])->name('clerk.verifycase_view');
        Route::resource('clerk', ClerkController::class);
    });

    Route::group(['middleware' => 'isstudent'], function()
    {
        Route::post('student/registercase', [StudentController::class, 'registercase'])->name('student.registercase');
        Route::get('student/registercase_show', [StudentController::class, 'registercase_show'])->name('student.registercase_show');
        Route::get('student/viewcase', [StudentController::class, 'viewcase'])->name('student.viewcase');
        Route::get('student/casedetails/{id}', [StudentController::class, 'casedetails'])->name('student.casedetails');
        Route::resource('student', StudentController::class)->middleware('isstudent');
    });
});
