<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->middleware(['auth'])->name('profile');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('admin-dashboard');

    Route::get('/admin/doctors', 'App\Http\Controllers\admin\DoctorController@index')->name('admin-doctors');
    Route::get('/admin/new-doctor', 'App\Http\Controllers\admin\DoctorController@new')->name('admin-new-doctor');
    Route::post('/admin/add-doctor', 'App\Http\Controllers\admin\DoctorController@add')->name('admin-add-doctor');

    Route::get('/admin/patients', 'App\Http\Controllers\admin\PatientController@index')->name('admin-patients');

    Route::get('/admin/consultations', 'App\Http\Controllers\admin\ConsultationController@index')->name('admin-consultations');

});

Route::group(['middleware' => ['auth', 'role:doctor']], function () {
    Route::get('/dr/dashboard', 'App\Http\Controllers\doctor\DashboardController@index')->name('dr-dashboard');

    Route::get('/dr/appointments', 'App\Http\Controllers\doctor\AppointmentController@index')->name('dr-appointments');
    Route::get('/dr/new-appointment/{cons_id}/{patient}', 'App\Http\Controllers\doctor\AppointmentController@new')->name('dr-new-appointment');
    Route::post('/dr/create-appointment', 'App\Http\Controllers\doctor\AppointmentController@create')->name('dr-create-appointment');

    Route::get('/dr/new-prescription/{cons_id}/{patient}', 'App\Http\Controllers\doctor\PrescriptionController@index')->name('dr-new-prescription');
    Route::post('/dr/create-prescription', 'App\Http\Controllers\doctor\PrescriptionController@create')->name('dr-create-prescription');
});

Route::group(['middleware' => ['auth', 'role:patient']], function () {
    Route::get('/pt/dashboard', 'App\Http\Controllers\patient\DashboardController@index')->name('pt-dashboard');
});

require __DIR__.'/auth.php';
