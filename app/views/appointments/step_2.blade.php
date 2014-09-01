@extends('layouts.master')
<!--/app/views/appointments/step_2.blade.php-->

@section('content')
<h1>Seleccione una Especialidad</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('route' => 'appointments.create.step_2', 'method' => 'post')) }}

	<div class = "form-group">
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', Input::old('rut'), ['class' => 'form-control', 'placeholder' => 'Rut']) }}
	</div>
	{{ HTML::link(URL::to('patients/create'), 'Crear Paciente',['class' => 'btn btn-success']) }}
	{{ Form::submit('Buscar Paciente', array('class' => 'btn btn-primary')) }}
	
{{ Form::close() }}

@stop
