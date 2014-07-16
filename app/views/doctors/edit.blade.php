@extends('layouts.master')
<!-- app/views/doctors/edit.blade.php-->
@section('content')

<h1>Edit Doctor {{$doctor->name}} {{$doctor->lastname}}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($doctor, array('route' => array('doctors.update', $doctor->id), 'method' => 'PUT')) }}

	<div class = "form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $doctor->name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('Lastname', 'Last name') }}
		{{ Form::text('lastname', $doctor->lastname, ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', $doctor->rut, ['class' => 'form-control', 'placeholder' => 'Rut']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', $doctor->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('university', 'University') }}
		{{ Form::text('university', $doctor->university, ['class' => 'form-control', 'placeholder' => 'Universidad']) }}
	</div>

	{{ Form::submit('Edit the Doctor',["class" => "btn btn-primary"]) }}

{{ Form::close() }}
@stop