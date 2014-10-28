@extends('layouts.master')
<!-- app/views/appointments/create.blade.php -->
@section('meta-title')
	Creación de Consultas
@stop
@section('content')
<h1>Create a Appointment</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'appointments')) }}

	<div class="form-group">
		{{ Form::label('doctor', 'Doctor') }}
		{{ Form::select('doctor', $doctors, Input::old('doctor'), array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('Paciente', 'User') }}
		{{ Form::select('patient', $patients, Input::old('patient'), array('class' => 'form-control')) }} 
	</div>

	<div class="form-group">
		{{ Form::label('date', 'Date') }}
		{{ Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date'])}}
	</div>

	<div class="form-group">
		{{ Form::label('price', 'Price') }}
		{{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Crear una cita', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop