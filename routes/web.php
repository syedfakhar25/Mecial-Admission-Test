<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInfoController;

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
    if(\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('dashboard.index');
    }
    else{
        return redirect()->route('login');
    }
});



Route::group(['middleware' => ['auth']], function () {
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
    //get all the students on dashboard
    Route::get('allStudents', [\App\Http\Controllers\DashboardController::class, 'allStudents'])->name('allStudents');
    Route::get('allStudents-report', [\App\Http\Controllers\DashboardController::class, 'allStudentsReport'])->name('allStudents-report');
    //change password for admin
    Route::get('change-password', [\App\Http\Controllers\PersonalInfoController::class, 'ChangePassword'])->name('change-password');
    Route::get('pass-changed', [\App\Http\Controllers\PersonalInfoController::class, 'PasswordChanged'])->name('pass-changed');

    Route::resource('personalInfo', PersonalInfoController::class);
    //approve a user
    Route::get('/approve/{user_id}', [PersonalInfoController::class, 'approve'])->name('approve');
    //accept a student
    Route::get('/accept/{user_id}', [\App\Http\Controllers\AppliedStudentController::class, 'accept'])->name('accept');
    //reject a student
    Route::get('/reject/{user_id}', [\App\Http\Controllers\AppliedStudentController::class, 'reject'])->name('reject');
    //withdraw from admission
    Route::get('/withdraw_admission/{adm_id}', [\App\Http\Controllers\AppliedStudentController::class, 'WithdrawAdmission'])->name('withdraw_admission');

    //view profile
    Route::get('/profile/{user_id}', [PersonalInfoController::class, 'profile'])->name('profile');
    //print profile
    Route::get('/print/{user_id}', [PersonalInfoController::class, 'printProfile'])->name('print');

    //save mcat/sat score
    Route::put('/entrytest/{user_id}', [PersonalInfoController::class, 'saveEntryTest'])->name('entrytest');
    Route::get('/entrytest/{user_id}', [PersonalInfoController::class, 'saveEntryTest'])->name('entrytest');

    Route::resource('qualification', \App\Http\Controllers\QualificationController::class);
    Route::get('/update_qualifications/', [\App\Http\Controllers\QualificationController::class, 'updateQualifications'])->name('update_qualifications');

    Route::resource('documents', \App\Http\Controllers\DocumentController::class);
    Route::post('/documents/upload_user_images', [\App\Http\Controllers\DocumentController::class, 'upload_user_images_func'])->name('upload_user_images');
    
    
    //routes for student applying on an admission
    Route::resource('applystudent', \App\Http\Controllers\AppliedStudentController::class);

    Route::get('/applicationstatus', [\App\Http\Controllers\AppliedStudentController::class, 'ApplicationStatus'])->name('applicationstatus');

    Route::get('entrytest', function () {
        return view('users.entrytest');
    });

    Route::get('challan', function () {
        return view('users.challan');
    });

    //Admin dealing institutions Routes
    Route::resource('colleges', \App\Http\Controllers\CollegeController::class);

    //Admin dealing Admissions Routes
    Route::resource('admissions', \App\Http\Controllers\AdmissionController::class);

});


