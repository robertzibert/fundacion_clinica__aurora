@extends('layouts.master')
<!--/app/views/appointments/step_1.blade.php-->

@section('content')
<h1>Busque al Paciente</h1>

<!-- if there are creation errors, they will show here -->
@if(Session::has('message'))    
    <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
@endif

{{ Form::open(array('route' => 'appointments.create.step_2', 'method' => 'post')) }}

	<div class = "form-group">
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', Input::old('rut'), ['class' => 'form-control', 'placeholder' => 'Rut']) }}
	</div>
	{{ HTML::link(URL::to('patients/create'), 'Crear Paciente',['class' => 'btn btn-success']) }}
	{{ Form::submit('Buscar Paciente', array('class' => 'btn btn-primary')) }}
	
{{ Form::close() }}

@stop