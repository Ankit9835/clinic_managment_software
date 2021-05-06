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



Route::get('/dashboard', [App\Http\Controllers\DashBoardController::class, 'index']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']],function(){
	Route::resource('doctors', DoctorController::class);
});

Route::group(['middleware' => ['auth', 'doctor']],function(){

	Route::resource('appointment', AppointmentController::class);
	Route::post('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');
	Route::post('/appointment/update', [App\Http\Controllers\AppointmentController::class, 'updateAppointment'])->name('update');

});


 
