@extends('layouts.master')
<!-- app/views/appointments/edit.blade.php -->

@section('content')
<div class="row">
	<div class="well col-md-10 col-md-offset-1">
		
<h3>Cita entre Dr/Dra. {{$appointment->doctor->user->name}} {{$appointment->doctor->user->lastname}} y el paciente {{$appointment->patient->user->name}} {{$appointment->patient->user->lastname}}</h3>
<p>Fecha: {{$appointment->active_at}}</p>


<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($appointment, array('route' => array('appointments.update', $appointment->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('state', 'Estado') }}
		<select name="state" class ="form-control">
			<option value='done'>Lista</option>
			<option value='canceled'>Cancelada</option>
			<option value='confirmed'>Confirmada</option>
			<option value='reserved'>Reservada</option>
			<option value='voided'>Anulada</option>
		</select>
	</div>


	{{ Form::submit('Cambiar Estado', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
	</div>
</div>

@stop