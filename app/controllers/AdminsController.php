<?php

class AdminsController extends \BaseController {

	/**
	 * Display a listing of admins
	 *
	 * @return Response
	 */
	public function index()
	{
		$doctor = Doctor::all();

		return View::make('admins.index', compact('doctor'));

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
		$validator = Validator::make($data = Input::all(), Admin::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Admin::create($data);

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
		$admin = Admin::findOrFail($id);

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
		$admin = Admin::find($id);

		return View::make('admins.edit', compact('admin'));
	}

	/**
	 * Update the specified admin in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$admin = Admin::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Admin::$rules);

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
		Admin::destroy($id);

		return Redirect::route('admins.index');
	}

}
