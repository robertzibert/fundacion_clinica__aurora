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
		$doctor = Doctor::lists('name','id');
		
		$user= User::lists('name','id');

		return View::make('appointments.create', compact('doctor'), compact('user'));
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
			'doctor'=> 'required',
			'user'  => 'required',
			'date' 	=> 'required|numeric'
			'price'	=> 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('appointments/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$appointment = new Appointment;
			$appointment->doctor_id     	= Input::get('doctor');
			$appointment->user_id     		= Input::get('user');
			$appointment->active_at 		= Input::get('date');
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
		$appointment = Appointment::find($id);

		return View::make('appointments.edit', compact('appointment'));
	}

	/**
	 * Update the specified appointment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$appointment = Appointment::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Appointment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$appointment->update($data);

		return Redirect::route('appointments.index');
	}

	/**
	 * Remove the specified appointment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Appointment::destroy($id);

		return Redirect::route('appointments.index');
	}

}
