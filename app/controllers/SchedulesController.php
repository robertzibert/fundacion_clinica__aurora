}<?php

class SchedulesController extends \BaseController {

	/**
	 * Display a listing of schedules
	 *
	 * @return Response
	 */
	public function index()
	{
		$doctors = Doctor::all();

		return View::make('schedules.index', compact('doctors'));
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
		$doctors = Doctor::all();		
		$doctor  = Input::get('doctor_id');
		$dates   = Input::get('date');
 
 
 
 		foreach ($dates as $key => $date) {
			
			$schedule = new Schedule;
			$schedule->doctor_id = $doctor;
			$schedule->date = $date;
			$schedule->save();	
		}
 

		return View::make('schedules.index',compact('dates','doctors'));
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
		$schedules = Schedule::where('doctor_id','=', $id);
		$doctor    = Doctor::find($id);		
		foreach ($schedules as $schedule) {
			$taken_time[] = $schedules->date.$schedules->hour;	
		}
		
		$first_day  = date("Y-m-d", strtotime("monday this week"));
		
		$second_day = date('Y-m-d', strtotime($first_day . ' + 1 day'));
		$third_day  = date('Y-m-d', strtotime($first_day . ' + 2 day'));
		$forth_day  = date('Y-m-d', strtotime($first_day . ' + 3 day'));
		$last_day   = date("Y-m-d", strtotime("friday this week"));

		$hour = new DateTime('8:00:00');
		$initial_hour = $hour -> format('H:i');


		return View::make('schedules.edit', compact('initial_hour','schedule','first_day','second_day','third_day','forth_day','last_day','taken_time','doctor'));
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
