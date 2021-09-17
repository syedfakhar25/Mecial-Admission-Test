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
    return view('auth.login');
});

Route::get('entrytest', function () {
    return view('users.entrytest');
});

Route::get('challan', function () {
    return view('users.challan');
});



Route::group(['middleware' => ['auth']], function () {
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

});

Route::resource('personalInfo', PersonalInfoController::class);
//approve a user
Route::get('/approve/{user_id}', [PersonalInfoController::class, 'approve'])->name('approve');
//view profile
Route::get('/profile/{user_id}', [PersonalInfoController::class, 'profile'])->name('profile');
//save mcat/sat score
Route::put('/entrytest/{user_id}', [PersonalInfoController::class, 'saveEntryTest'])->name('entrytest');
Route::get('/entrytest/{user_id}', [PersonalInfoController::class, 'saveEntryTest'])->name('entrytest');

Route::resource('qualification', \App\Http\Controllers\QualificationController::class);
Route::resource('documents', \App\Http\Controllers\DocumentController::class);
