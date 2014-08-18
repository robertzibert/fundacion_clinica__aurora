@extends('layouts.master')
<!--app/views/doctors/appointmentState.blade.php-->
@section('content')
<h1>Editar estado consulta entre el Dr. {{$appointment->doctor->user->name}} y el paciente {{$appointment->patient->user->name}}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($appointment, array('action' => array('DoctorsController@updateAppointment',$appointment->id))) }}

	<div class="form-group">
		{{ Form::label('price', 'Estado') }}
		{{ Form::select('state', array('canceled' => 'Cancelada', 'done' => 'Completada'), 'Cancelada', array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Confirmar Edición', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop