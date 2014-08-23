<?php

class PatientsController extends \BaseController {

	/**
	 * Display a listing of patients
	 *
	 * @return Response
	 */
	public function index()
	{
		$patients = Patient::all();

		return View::make('patients.index', compact('patients'));
	}

	/**
	 * Show the form for creating a new patient
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('patients.create');
	}

	/**
	 * Store a newly created patient in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'      	=> 'required',
			'lastname'      => 'required',
			'rut'       	=> 'required|numeric|unique:users',
			'email'      	=> 'required|email|unique:users',
			'insurance'		=> 'required',
			'blood_type'	=> 'required',
			'address'		=> 'required',
			'gender'		=> 'required',
			'phone'		 	=> 'required|unique:patients',
			'cellphone'		=> 'required|unique:patients',
			'password'		=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('patients/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			

			//Asi guardamos un doctor
			$input=Input::except('name','lastname','rut','email','password');
			$patient = new Patient($input);
			$patient->save();
			
			$input = Input::except('insurance','blood_type','address','gender','phone','cellphone');
			$user = new User($input);
			$user->patient_id = $patient->id;
			$user->save();
			
			// redirect
			Session::flash('message', 'Successfully created Patient!');
			return Redirect::to('patients');
		}
	}

	/**
	 * Display the specified patient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$patient = Patient::findOrFail($id);

		return View::make('patients.show', compact('patient'));
	}

	/**
	 * Show the form for editing the specified patient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patient = Patient::find($id);

		return View::make('patients.edit', compact('patient'));
	}

	/**
	 * Update the specified patient in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'      	=> 'required',
			'lastname'      => 'required',
			'rut'       	=> 'required|numeric|unique:users',
			'email'      	=> 'required|email|unique:users',
			'insurance'		=> 'required',
			'blood_type'	=> 'required',
			'address'		=> 'required',
			'gender'		=> 'required',
			'phone'		 	=> 'required|unique:patients',
			'cellphone'		=> 'required|unique:patients'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('patients/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store

			$patient = Patient::find($id);
			$patient->insurance = Input::get('insurance');
			$patient->blood_type = Input::get('blood_type');
			$patient->address = Input::get('address');
			$patient->gender = Input::get('gender');
			$patient->phone = Input::get('phone');
			$patient->cellphone = Input::get('cellphone');
			$patient->save();
			
			$user = User::where('patient_id', '=' , $patient->id)->first();
			$user->name = input::get('name');
			$user->lastname = input::get('lastname');
			$user->rut = input::get('rut');
			$user->email = input::get('email');
			$user->save();

			// redirect
			Session::flash('message', 'Successfully updated Patient');
			return Redirect::to('patients');
		}
	}

	/**
	 * Remove the specified patient from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$patient = Patient::find($id);
		$user = User::where('patient_id', '=' , $patient->id)->first();
		$user->delete();
		$patient->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the Patient!');
		return Redirect::to('patients');
	}


}
