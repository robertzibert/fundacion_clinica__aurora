@extends('layouts.master')
<!-- app/views/doctors/edit.blade.php-->
@section('content')

<h1>Edit Doctor {{$doctor->user->name}} {{$doctor->user->lastname}}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($doctor, array('route' => array('doctors.update', $doctor->id), 'method' => 'PUT')) }}

	<div class = "form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $doctor->user->name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('Lastname', 'Last name') }}
		{{ Form::text('lastname', $doctor->user->lastname, ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', $doctor->user->rut, ['class' => 'form-control', 'placeholder' => 'Rut']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', $doctor->user->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('university', 'University') }}
		{{ Form::text('university', $doctor->university, ['class' => 'form-control', 'placeholder' => 'Universidad']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('specialism', 'Especialidad') }}
		{{ Form::select('specialism',$specialisms, $doctor->specialism->id, ['class' => 'form-control']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('phone', 'Phone') }}
		{{ Form::text('phone', $doctor->phone, ['class' => 'form-control', 'placeholder' => 'Telefono']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('cellphone', 'Cellphone') }}
		{{ Form::text('cellphone', $doctor->cellphone, ['class' => 'form-control', 'placeholder' => 'celular']) }}

	{{ Form::submit('Edit the Doctor',["class" => "btn btn-primary"]) }}

{{ Form::close() }}
@stop