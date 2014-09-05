@extends('layouts.master')
<!--/app/views/appointments/step_2.blade.php-->

@section('content')
<h1>Seleccione una Especialidad</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::open(array('route' => 'appointments.create.step_3', 'method' => 'post')) }}
	
	{{ Form::hidden('user', $user->id) }}  


	<div class = "form-group">
		{{ Form::label('specialisms', 'Especialidad') }}
		{{ Form::select('specialism', $specialisms); }}

		{{ Form::label('date', 'Fecha de Reserva') }}
		{{ Form::input('date', 'date') }}

		{{ Form::label('hour', 'Hora de Reserva') }}
		{{ Form::input('time', 'hour') }}  
	  
	
	</div>
	
	{{ Form::submit('Ver Doctores', array('class' => 'btn btn-primary')) }}
	
{{ Form::close() }}

@stop
