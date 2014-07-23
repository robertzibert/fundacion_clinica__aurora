<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
class DoctorsController extends \BaseController {

	/**
	 * Display a listing of doctors
	 *
	 * @return Response
	 */
	public function index()
	{
		$doctors = Doctor::all();

		return View::make('doctors.index', compact('doctors'));
	}

	/**
	 * Show the form for creating a new doctor
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('doctors.create');
	}

	/**
	 * Store a newly created doctor in storage.
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
			'rut'       	=> 'required|numeric',
			'email'      	=> 'required|email',
			'university' 	=> 'required',
			'password'		=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('doctors/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			

			//Asi guardamos un doctor
			$doctor = new Doctor;
			$doctor->university =Input::get('university');
			$doctor->save();
			
			$input = Input::except('university');
			$user = new User($input);
			$user->doctor_id = $doctor->id;
			$user->save();
			
			// redirect
			Session::flash('message', 'Successfully created Doctor!');
			return Redirect::to('doctors');
		}
	}

	/**
	 * Display the specified doctor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$doctor = Doctor::findOrFail($id);
		$appointments= $doctor->appointment;
		return View::make('doctors.show', compact('doctor'), compact("appointments"));
	}

	/**
	 * Show the form for editing the specified doctor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$doctor = Doctor::find($id);

		return View::make('doctors.edit', compact('doctor'));
	}

	/**
	 * Update the specified doctor in storage.
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
			'rut'       	=> 'required|numeric',
			'email'      	=> 'required|email',
			'university' 	=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('doctors/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$doctor = Doctor::find($id);
			$doctor->name       = Input::get('name');
			$doctor->lastname   = Input::get('lastname');
			$doctor->rut        = Input::get('rut');
			$doctor->email      = Input::get('email');
			$doctor->university = Input::get('university');
			$doctor->save();

			// redirect
			Session::flash('message', 'Successfully updated Doctor');
			return Redirect::to('doctors');
		}
	}

	/**
	 * Remove the specified doctor from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$doctor = Doctor::find($id);
		$doctor->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the Doctor!');
		return Redirect::to('doctors');
	}

}
