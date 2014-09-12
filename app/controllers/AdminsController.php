<?php
use Illuminate\Auth\UserInterface;

class AdminsController extends \BaseController {

/**
 *
 * 
 */
	public function history()
	
	{
		
		$appointments = Appointment::orderBy('active_at')->get();

		return View::make('appointments.history', compact('appointments'));

	}
	/**
	 * Display a listing of admins
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$appointments_today    = Appointment::whereBetween('active_at', [new DateTime('today'),new DateTime('tomorrow')])->get();
		$appointments_tomorrow = Appointment::whereBetween('active_at', [new DateTime('tomorrow'),new DateTime('tomorrow + 1day')])->get();
		return View::make('admins.index', compact('appointments_today','appointments_tomorrow'));

	}

	/**
	 * Show the form for creating a new admin
	 *
	 * @return Response
	 */
	public function create()
	{
	
		return View::make('admins.create');
	}

	/**
	 * Store a newly created admin in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = [	
			'name'      	=> 'required',
			'lastname'    => 'required',
			'rut'       	=> 'required|numeric|unique:users',
			'email'      	=> 'required|email|unique:users',
			'password'		=> 'required',
		];

		$validator = Validator::make($data = Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$admin           = new User;
		$admin->name     =Input::get('name'); 
		$admin->lastname =Input::get('lastname'); 
		$admin->rut      = Input::get('rut');		
		$admin->email    =Input::get('email'); 
		$admin->password =Input::get('password'); 
		$admin->role_id  = 1;
		$admin->save();

		return Redirect::route('admins.index');
	}

	/**
	 * Display the specified admin.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$admin = User::findOrFail($id);

		return View::make('admins.show', compact('admin'));
	}

	/**
	 * Show the form for editing the specified admin.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('admins.edit', compact('user'));
	}

	/**
	 * Update the specified admin in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$admin = User::findOrFail($id);

		$rules=[
			'name'       => 'required',                                                                                                                                                                                
			'lastname'   => 'required',                                                                                                                                                                        
			'rut'        => 'required|numeric|unique:users,rut,'.$admin->id,
			'email'      => 'required|email|unique:users,email,'.$admin->id,
			'password'   => 'required',                                                                                                                                                                                
			];

		$validator = Validator::make($data = Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$admin->update($data);

		return Redirect::route('admins.index');
	}

	/**
	 * Remove the specified admin from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('admins.index');
	}
	
	public function showAdmins(){
		$admins = User::where('role_id',1)->get();

		return View::make('admins.see_all', compact('admins'));

	}

}
