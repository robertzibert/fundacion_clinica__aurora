<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('doctor/{doctor_id}/date/{date}', 'DoctorsController@getDoctorActivities');
Route::get('doctor/{doctor_id}/get', 'DoctorsController@getDoctor');
Route::get('doctor/{doctor_id}/appointments', 'DoctorsController@doctorGetAppointments');
Route::post('doctors/updateAppointment/{id}', 'DoctorsController@updateAppointment');
Route::get('appointments/{appointment_id}/editappointment', 'DoctorsController@editAppointment');
Route::get('logout', 'LoginController@destroy');
Route::get('admins/history', 'AdminsController@history');
Route::get('schedules/taken/{doctor_id}', ['as' => 'schedules.taken', 'uses' => 'SchedulesController@taken']);
Route::get('/', 'LoginController@index');
Route::resource('login', 'LoginController');
Route::resource('admins', 'AdminsController');
Route::resource('doctors', 'DoctorsController');


//Routes to create Appointments
Route::get('appointments/step/1', ['as' => 'appointments.create.step_1', 'uses' => 'AppointmentsController@step_1']);
Route::post('appointments/step/2', ['as' => 'appointments.create.step_2', 'uses' => 'AppointmentsController@step_2']);
Route::get('appointments/step/2/{rut}', ['as' => 'appointments.create.step_2.rut', 'uses' => 'AppointmentsController@step_2_rut']);
Route::post('appointments/step/3', ['as' => 'appointments.create.step_3', 'uses' => 'AppointmentsController@step_3']);

//Route to void an Appointment
Route::get('appointments/void/{id}', ['as' => 'appointments.void', 'uses' => 'AppointmentsController@void']);

Route::get('see/admins', ['as' => 'see.admins', 'uses' => 'AdminsController@showAdmins']);
Route::resource('appointments', 'AppointmentsController');


Route::resource('patients', 'PatientsController');
Route::resource('specialisms', 'SpecialismsController');
Route::resource('schedules', 'SchedulesController');

Route::get('appointment/create', 'AppointmentsController@mockup');
