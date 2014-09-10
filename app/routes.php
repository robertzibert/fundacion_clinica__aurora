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

Route::get('/', 'LoginController@index');
Route::post('doctors/updateAppointment/{id}', 'DoctorsController@updateAppointment');
Route::get('appointments/{appointment_id}/editappointment', 'DoctorsController@editAppointment');
Route::get('admins/history','AdminsController@history');
Route::get('logout','LoginController@destroy');
Route::resource('login', 'LoginController');
Route::resource('admins', 'AdminsController');
Route::resource('doctors', 'DoctorsController');


//Routes to create Appointments
Route::get('appointments/step/1', ['as' => 'appointments.create.step_1', 'uses' => 'AppointmentsController@step_1']);
Route::post('appointments/step/2',['as' => 'appointments.create.step_2', 'uses' => 'AppointmentsController@step_2']);
Route::post('appointments/step/3',['as' => 'appointments.create.step_3', 'uses' => 'AppointmentsController@step_3']);


Route::resource('appointments', 'AppointmentsController');

Route::resource('patients', 'PatientsController');
Route::resource('schedules', 'SchedulesController');
Route::resource('specialisms', 'SpecialismsController');