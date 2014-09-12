<?php

class SpecialismsController extends \BaseController {

	/**
	 * Display a listing of specialisms
	 *
	 * @return Response
	 */
	public function index()
	{
		$specialisms = Specialism::all();

		return View::make('specialisms.index', compact('specialisms'));
	}

	/**
	 * Show the form for creating a new specialism
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('specialisms.create');
	}

	/**
	 * Store a newly created specialism in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Specialism::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Specialism::create($data);

		return Redirect::route('specialisms.index');
	}

	/**
	 * Display the specified specialism.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$specialism = Specialism::findOrFail($id);

		return View::make('specialisms.show', compact('specialism'));
	}

	/**
	 * Show the form for editing the specified specialism.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$specialism = Specialism::find($id);

		return View::make('specialisms.edit', compact('specialism'));
	}

	/**
	 * Update the specified specialism in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$specialism = Specialism::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Specialism::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$specialism->update($data);

		return Redirect::route('specialisms.index');
	}

	/**
	 * Remove the specified specialism from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Specialism::destroy($id);

		return Redirect::route('specialisms.index');
	}

}
