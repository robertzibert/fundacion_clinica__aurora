@extends('layouts.master')
<!-- app/views/appointments/create.blade.php -->

@section('content')
<h1>Create a Appointment</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'admins')) }}

	<div class="form-group">
		{{ Form::label('doctor', 'Doctor') }}
		{{ Form::select('doctor', $doctor, Input::old('doctor'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('user', 'User') }}
		{{ Form::select('user', $user, Input::old('user'), array('class' => 'form-control')) }} 
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