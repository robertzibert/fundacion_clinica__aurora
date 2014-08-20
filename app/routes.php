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
Route::post('doctors/updateAppointment/{id}', 'DoctorsController@updateAppointment');
Route::get('appointments/{appointment_id}/editappointment', 'DoctorsController@editAppointment');
Route::get('admins/history','AdminsController@history');
Route::get('logout','LoginController@destroy');
Route::get('/', 'LoginController@index');
Route::resource('login', 'LoginController');
Route::resource('admins', 'AdminsController');
Route::resource('doctors', 'DoctorsController');
Route::resource('appointments', 'AppointmentsController');
Route::resource('patients', 'PatientsController');
Route::resource('schedules', 'SchedulesController');

