@extends('layouts.master')
<!--/app/views/appointments/step_2.blade.php-->
@section('meta-title')
	Creación de Consulta: Paso 2
@stop
@section('content')
<div class="row">
	<div class="well col-md-10 col-md-offset-1 margin-top-small">
<h1>Seleccione una Especialidad</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::open(array('route' => 'appointments.create.step_3', 'method' => 'post')) }}
	
	{{ Form::hidden('user', $user->id) }}  


	<div class = "form-group">
		{{ Form::label('specialisms', 'Especialidad') }}
		{{ Form::select('specialism', $specialisms, null, ['class' => 'form-control']) }}

		{{ Form::label('date', 'Fecha de Reserva') }}
		{{ Form::input('date', 'date', null, ['class' => 'form-control']) }}

		{{ Form::label('hour', 'Hora de Reserva') }}
		{{ Form::input('time', 'hour', null, ['class' => 'form-control']) }}  
	  
	
	</div>
	
	{{ Form::submit('Ver Doctores', array('class' => 'btn btn-primary')) }}
	
{{ Form::close() }}
		
	</div>
</div>

@stop
