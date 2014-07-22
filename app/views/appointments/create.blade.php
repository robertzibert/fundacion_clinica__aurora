@extends('layouts.master')
<!-- app/views/appointments/create.blade.php -->

@section('content')
<h1>Create a Appointment</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'appointments')) }}

	<div class="form-group">
		{{ Form::label('doctor', 'Doctor') }}
<select name="doctor" class ="form-control">

@foreach($doctors as $doctor)
{{"<option value=".
$doctor->id.">".$doctor->user->name."</option>"}}
@endforeach
</select>
	</div>
		<div class="form-group">
		{{ Form::label('patient', 'Patient') }}
<select name="patient" class ="form-control">

@foreach($patients as $patient)
{{"<option value=".
$patient->id.">".$patient->user->name."</option>"}}
@endforeach
</select>

	</div>

	<div class="form-group">
		{{ Form::label('date', 'Date') }}
		{{ Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date'])}}
	</div>

	<div class="form-group">
		{{ Form::label('price', 'Price') }}
		{{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create the appointment', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop