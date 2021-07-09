<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\DashBoardController;
use App\Models\User;

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



Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index']);

Route::get('/new-appointment/{doctorId}/{date}', [App\Http\Controllers\FrontEndController::class, 'show'])->name('create.appointment');


Route::post('/book/appointment', [App\Http\Controllers\FrontEndController::class, 'store'])->name('booking.appointment')->middleware('auth');

Route::group(['middleware' => ['auth', 'patient']],function(){


		Route::get('/my-booking', [App\Http\Controllers\FrontEndController::class, 'myBookings'])->name('my.booking')->middleware('auth');

		Route::get('/user-profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
		Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');

		Route::post('/update/image', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic');

		Route::get('/my-prescription',[App\Http\Controllers\FrontEndController::class, 'myPrescription'])->name('my.prescription');


});




Route::get('/dashboard', [App\Http\Controllers\DashBoardController::class, 'index']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']],function(){
	Route::resource('doctors', DoctorController::class);
	Route::get('/patients', [App\Http\Controllers\PatientListController::class, 'index'])->name('patient');
	Route::get('/all/patients', [App\Http\Controllers\PatientListController::class, 'allPatient'])->name('all.patient');
	Route::get('/status/update/{id}', [App\Http\Controllers\PatientListController::class, 'toggleStatus'])->name('update.status');
});

Route::group(['middleware' => ['auth', 'doctor']],function(){

	Route::resource('appointment', AppointmentController::class);
	Route::post('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');
	Route::post('/appointment/update', [App\Http\Controllers\AppointmentController::class, 'updateAppointment'])->name('update');
	Route::get('/patient-today', [App\Http\Controllers\PrescriptionController::class, 'index'])->name('patient.today');
	Route::post('/prescription', [App\Http\Controllers\PrescriptionController::class, 'store'])->name('prescription');
	Route::get('/view-prescription/{userId}/{date}', [App\Http\Controllers\PrescriptionController::class, 'show'])->name('prescription.show');
	Route::get('/prescribed-patients',[App\Http\Controllers\PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');

});


 
