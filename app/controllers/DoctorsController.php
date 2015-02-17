<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class DoctorsController extends \BaseController
{

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
    $specialisms = Specialism::all()->lists('name', 'id');
    return View::make('doctors.create', compact('specialisms'));
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
    $rules     = array(
      'name'      => 'required',
      'lastname'  => 'required',
      'rut'       => 'required|unique:users',
      'email'     => 'required|email|unique:users',
      'password'  => 'required',
      'phone'     => 'required|numeric|unique:doctors',
      'cellphone' => 'required|numeric|unique:doctors'
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
      $doctor->phone         = Input::get('phone');
      $doctor->cellphone     = Input::get('cellphone');
      $doctor->specialism_id = Input::get('specialism');
      $doctor->save();

      $input           = Input::except('phone', 'cellphone', 'specialism');
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
   * @param  int $id
   * @return Response
   */
  public function show($id)
  {
    $doctor       = Doctor::find($id);
    $appointments = $doctor->appointment;
    return View::make('doctors.show', compact('doctor'), compact("appointments"));
  }

  /**
   * Show the form for editing the specified doctor.
   *
   * @param  int $id
   * @return Response
   */
  public function edit($id)
  {
    $doctor      = Doctor::find($id);
    $specialisms = Specialism::all()->lists('name', 'id');

    return View::make('doctors.edit', compact('doctor', 'specialisms'));
  }

  /**
   * Update the specified doctor in storage.
   *
   * @param  int $id
   * @return Response
   */
  public function update($id)
  {
    // validate
    // read more on validation at http://laravel.com/docs/validation
    $doctor    = Doctor::find($id);
    $rules     = array(
      'name'      => 'required',
      'lastname'  => 'required',
      'rut'       => 'required|numeric|unique:users,rut,' . $doctor->user->id,
      'email'     => 'required|email|unique:users,email,' . $doctor->user->id,
      'password'  => 'required',
      'phone'     => 'required|numeric|unique:doctors,phone,' . $id,
      'cellphone' => 'required|numeric|unique:doctors,cellphone,' . $id
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
      $doctor->phone         = Input::get('phone');
      $doctor->cellphone     = Input::get('cellphone');
      $doctor->specialism_id = Input::get('specialism');
      $doctor->save();

      $user           = User::where('doctor_id', '=', $doctor->id)->first();
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
   * @param  int $id
   * @return Response
   */
  public function destroy($id)
  {
    // delete
    $doctor = Doctor::find($id);
    $user   = User::where('doctor_id', '=', $doctor->id)->first();
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
    $rules     = array(
      'state' => 'required',
    );
    $validator = Validator::make(Input::all(), $rules);

    // process the login
    if ($validator->fails()) {
      return Redirect::to('doctors/index')
        ->withErrors($validator)
        ->withInput(Input::except('password'));
    } else {
      // store
      $appointment        = Appointment::find($id);
      $appointment->state = Input::get('state');
      $appointment->save();

      // redirect
      Session::flash('message', 'Successfully updated Appointment');
      return Redirect::to('doctors');
    }
  }

  public function doctorGetAppointments($doctor_id)
  {

    $appointments = Appointment::distinct()->select('active_at')->where('doctor_id', $doctor_id)->get();

    foreach ($appointments as $key => $appointment) {
      $date                  = $appointment->active_at;
      $dt                    = Carbon::parse($date);
      $result[$key]['start'] = $dt->toDateString();
      $result[$key]['title'] = "Consulta";
    }
    return $result;
  }

  public function getDoctor($doctor_id)
  {
    $doctor = Doctor::where('id', $doctor_id)->with('user', 'specialism')->first();
    return $doctor;

  }

  public function getDoctorActivities($doctor_id, $date)
  {
    $dt           = Carbon::parse($date);
    $date         = $dt->toDateTimeString();
    $date_max     = $dt->addDay();
    $schedules    = Schedule::where('doctor_id', $doctor_id)->whereBetween('date', [$date, $date_max])->select('date as date')->get();
    $appointments = Appointment::where('doctor_id', $doctor_id)->whereBetween('active_at', [$date, $date_max])->select('active_at as date')->get();
    foreach ($appointments as $key => $appointment) {
      $result_appointment[$key]["date"]  = Carbon::parse($appointment->date)->toTimeString();
      $result_appointment[$key]["title"] = "Consulta";
    }
    foreach ($schedules as $key => $schedule) {
      $result_schedules[$key]["date"]  = Carbon::parse($schedule->date)->toTimeString();
      $result_schedules[$key]["title"] = "Ocupado";
    }
    (isset($result_appointment) ?: $result = $result_schedules);
    (isset($result_schedules) ?: $result = $result_appointment);
    (isset($result_schedules) && isset($result_appointment)  ?$result = array_merge($result_schedules, $result_appointment): "hello");
    return $result;
    //array_sort($people, 'age', SORT_DESC)
  }


}

