@extends('layouts.master')
<!--app/views/doctors/appointmentState.blade.php-->
@section('content')
<h1>Edit a Appointment between Dr. {{$appointment->doctor->user->name}} and patient {{$appointment->patient->user->name}}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($appointment, array('route' => array('doctors.updateAppointment', $appointment->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('price', 'Price') }}
		{{ Form::select('state', array('canceled' => 'canceled', 'reserved' => 'reserved', 'confirmed' => 'confirmed'), 'reserved') }}
	</div>

	{{ Form::submit('Edit the appointment', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop