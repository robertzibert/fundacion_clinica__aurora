<?php

class SchedulesController extends \BaseController {

	/**
	 * Display a listing of schedules
	 *
	 * @return Response
	 */
	public function index()
	{
		$schedules = Schedule::all();

		return View::make('schedules.index', compact('schedules'));
	}

	/**
	 * Show the form for creating a new schedule
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('schedules.create');
	}

	/**
	 * Store a newly created schedule in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Schedule::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Schedule::create($data);

		return Redirect::route('schedules.index');
	}

	/**
	 * Display the specified schedule.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$schedule = Schedule::findOrFail($id);

		return View::make('schedules.show', compact('schedule'));
	}

	/**
	 * Show the form for editing the specified schedule.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$schedule = Schedule::find($id);

		return View::make('schedules.edit', compact('schedule'));
	}

	/**
	 * Update the specified schedule in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$schedule = Schedule::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Schedule::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$schedule->update($data);

		return Redirect::route('schedules.index');
	}

	/**
	 * Remove the specified schedule from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Schedule::destroy($id);

		return Redirect::route('schedules.index');
	}

}
