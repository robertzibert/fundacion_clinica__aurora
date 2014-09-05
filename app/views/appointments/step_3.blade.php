@extends('layouts.master')
<!--/app/views/appointments/step_3.blade.php-->

@section('content')
<div class="row">
	<div class="well col-md-10 col-md-offset-1 margin-top-small">
		<div class="panel panel-primary" >
			<div class="panel-heading">
		    <h3 class="panel-title">Resumen de la Cita</h3>
		  </div>
		  <div class="panel-body">
		    <p>Reserva para: {{$user->name}}</p>
				<p>Fecha: {{$date}}</p>
				<p>Especialidad: {{$specialism->name}}</p>		  
		  </div>
		</div>

{{ Form::open(array('route' => 'appointments.store', 'method' => 'post')) }}

Por favor seleccione un doctor:
	
	<div class = "form-group">
			{{ Form::hidden('patient_id', $user->patient->id) }}  
			{{ Form::hidden('active_at', $date) }}   

		{{ Form::label('doctor', 'Doctor') }}		
		@foreach ($doctors_available as $doctor_available) 
		<ul class="list-group">
		  <li class="list-group-item">
				{{Form::radio('doctor_id', $doctor_available->id)}} {{$doctor_available->user->name}}
  		</li>
  	</ul>
		@endforeach
		{{ Form::label('price', 'Precio') }} 
		{{ Form::text('price', null, ['class' => 'form-control']) }}

	</div>
	
	{{ Form::submit('Crear Cita', array('class' => 'btn btn-primary')) }}
	
{{ Form::close() }}
		
	</div>
</div>



@stop
