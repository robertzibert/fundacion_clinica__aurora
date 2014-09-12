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
		$specialisms = Specialism::all()->lists('name','id');
		return View::make('doctors.create',compact('specialisms'));
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
			'lastname'    => 'required',
			'rut'       	=> 'required|numeric|unique:users',
			'email'      	=> 'required|email|unique:users',
			'university' 	=> 'required',
			'password'		=> 'required',
			'phone'				=> 'required|numeric|unique:doctors',
			'cellphone'		=> 'required|numeric|unique:doctors'	
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('doctors/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			

			//Asi guardamos un doctor
			$doctor                = new Doctor;
			$doctor->university    =Input::get('university');
			$doctor->phone         =Input::get('phone');
			$doctor->cellphone     =Input::get('cellphone');
			$doctor->specialism_id =Input::get('specialism');
			$doctor->save();
			
			$input           = Input::except('university','phone','cellphone','specialism');
			$user            = new User($input);
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
		$doctor = Doctor::find($id);
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
		$specialisms = Specialism::all()->lists('name','id');

		return View::make('doctors.edit', compact('doctor','specialisms'));
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
		$doctor = Doctor::find($id);
		$rules = array(
			'name'       => 'required',                                                                                                                                                                                
			'lastname'   => 'required',                                                                                                                                                                        
			'rut'        => 'required|numeric|unique:users,rut,'.$doctor->user->id,
			'email'      => 'required|email|unique:users,email,'.$doctor->user->id,
			'university' => 'required',                                                                                                                                                                                
			'password'   => 'required',                                                                                                                                                                                
			'phone'      => 'required|numeric|unique:doctors,phone,'.$id,                                                
			'cellphone'  => 'required|numeric|unique:doctors,cellphone,'.$id		                
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('doctors/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$doctor                = Doctor::find($id);
			$doctor->phone         =Input::get('phone');
			$doctor->cellphone     =Input::get('cellphone');
			$doctor->university    =Input::get('university');
			$doctor->specialism_id =Input::get('specialism');
			$doctor->save();

			$user           = User::where('doctor_id', '=' , $doctor->id)->first();
			$user->name     = input::get('name');
			$user->lastname = input::get('lastname');
			$user->rut      = input::get('rut');
			$user->email    = input::get('email');
			$user->password = input::get('password');
			
			$user->save();

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
		$user   = User::where('doctor_id', '=' , $doctor->id)->first();
		$user->delete();
		$doctor->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the Doctor!');
		return Redirect::to('doctors');
	}

	public function editAppointment($id)
{
	$appointment = Appointment::find($id);

	return View::make('doctors.appointmentState', compact('appointment'));
}

public function updateAppointment($id)
{
	// validate
	// read more on validation at http://laravel.com/docs/validation
	$rules = array(
		'state'      	=> 'required',
	);
	$validator = Validator::make(Input::all(), $rules);

	// process the login
	if ($validator->fails()) {
		return Redirect::to('doctors/index')
			->withErrors($validator)
			->withInput(Input::except('password'));
	} else {
		// store
		$appointment = Appointment::find($id);
		$appointment->state       = Input::get('state');
		$appointment->save();

		// redirect
		Session::flash('message', 'Successfully updated Appointment');
		return Redirect::to('doctors');
	}
}
}

