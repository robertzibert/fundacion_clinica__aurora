@extends('layouts.master')
<!--app/views/patients/edit.blade.php-->
@section('content')

<h1>Edit Pattient {{$patient->user->name}} {{$patient->user->lastname}}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($patient, array('route' => array('patients.update', $patient->user->id), 'method' => 'PUT')) }}
	
	<div class = "form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $patient->user->name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('Lastname', 'Last name') }}
		{{ Form::text('lastname', $patient->user->lastname, ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', $patient->user->rut, ['class' => 'form-control', 'placeholder' => 'Rut']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', $patient->user->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('insurance', 'Insurance') }}
		{{ Form::text('insurance', $patient->insurance, ['class' => 'form-control', 'placeholder' => 'Aseguradora']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('blood_type', 'Blood_type') }}
		{{ Form::text('blood_type', $patient->blood_type, ['class' => 'form-control', 'placeholder' => 'Dirección']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', $patient->address, ['class' => 'form-control', 'placeholder' => 'Dirección']) }}
	</div>
	</div>
	<div class = "form-group">
		{{ Form::label('gender', 'Gender') }}
		{{ Form::text('gender', $patient->gender, ['class' => 'form-control', 'placeholder' => 'Genero']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('phone', 'Phone') }}
		{{ Form::text('phone', $patient->phone, ['class' => 'form-control', 'placeholder' => 'Telefono']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('cellphone', 'Cellphone') }}
		{{ Form::text('cellphone', $patient->cellphone, ['class' => 'form-control', 'placeholder' => 'celular']) }}
	</div>

	{{ Form::submit('Edit the pattient',['class' => 'btn btn-primary']) }}

{{ Form::close() }}

@stop