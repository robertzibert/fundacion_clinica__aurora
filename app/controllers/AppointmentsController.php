<?php

class AppointmentsController extends \BaseController {

	/**
	 * Display a listing of appointments
	 *
	 * @return Response
	 */
	public function index()
	{
		$appointments = Appointment::all();

		return View::make('appointments.index', compact('appointments'));
	}

	/**
	 * Show the form for creating a new appointment
	 *
	 * @return Response
	 */
	public function create()
	{
		$doctors  = User::whereNotNull('doctor_id')->lists('name','id');		
		$patients = User::whereNotNull('patient_id')->lists('name','id');	

		return View::make('appointments.create', compact('doctors'), compact('patients'));
	}


	/**
	 * Store a newly created appointment in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'doctor'  => 'required',                     
			'patient' => 'required',            
			'date'    => 'required',                     
			'price'   => 'required|numeric'
			);
		$validator = Validator::make(Input::all(), $rules);
		$patient_id = User::find(Input::get('patient'))->patient->id;
		$doctor_id  = User::find(Input::get('doctor'))->doctor->id;
		// process the login
		if ($validator->fails()) {
			return Redirect::to('appointments/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$appointment = new Appointment;
			$appointment->doctor_id   = $doctor_id;
			$appointment->patient_id  = $patient_id;
			$appointment->state 			= 'reserved';
			$appointment->active_at 	= Input::get('date');
			$appointment->price 			= Input::get('price');
			$appointment->save();

			// redirect
			Session::flash('message', 'Successfully created appointment!');
			return Redirect::to('admins');
		}
	}

	/**
	 * Display the specified appointment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$appointment = Appointment::findOrFail($id);

		return View::make('appointments.show', compact('appointment'));
	}

	/**
	 * Show the form for editing the specified appointment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$patients = Patient::all();
		$doctors = Doctor::all();
		$appointment = Appointment::find($id);

		return View::make('appointments.edit', compact('appointment'),compact('patients'))
		->with(compact('doctors'));
	}

	/**
	 * Update the specified appointment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'doctor'=> 'required',
			'patient'  => 'required',
			'date' 	=> 'required',
			'price'	=> 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('appointments/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$appointment = Appointment::find($id);
			$appointment->doctor_id     	= Input::get('doctor');
			$appointment->patient_id   		= Input::get('patient');
			$appointment->active_at 		= Input::get('date');
			$appointment->price 			= Input::get('price');
			$appointment->save();

			// redirect
			Session::flash('message', 'Successfully edited appointment!');
			return Redirect::to('admins');
		}
	}

	/**
	 * Remove the specified appointment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$appointment = Appointment::find($id);
		$appointment->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the Appointment!');
		return Redirect::to('admins');
	}

}
