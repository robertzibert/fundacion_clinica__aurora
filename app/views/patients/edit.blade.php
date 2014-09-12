@extends('layouts.master')
<!--app/views/patients/edit.blade.php-->
@section('content')

<center><h1>Editar Paciente {{$patient->user->name}} {{$patient->user->lastname}}</h1></center>

	{{ HTML::ul($errors->all()) }}

<div class="container-fluid well" style="width: 50%">

	{{ Form::model($patient, array('route' => array('patients.update', $patient->id), 'method' => 'PUT')) }}
		
		<div class = "form-group">
			{{ Form::label('name', 'Nombre') }}
			{{ Form::text('name', $patient->user->name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('Lastname', 'Apellido') }}
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
			{{ Form::label('insurance', 'Aseguradora') }}
			{{ Form::text('insurance', $patient->insurance, ['class' => 'form-control', 'placeholder' => 'Aseguradora']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('blood_type', 'Grupo Sanguineo') }}
			{{ Form::text('blood_type', $patient->blood_type, ['class' => 'form-control', 'placeholder' => 'Grupo Sanguineo']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('address', 'Dirección') }}
			{{ Form::text('address', $patient->address, ['class' => 'form-control', 'placeholder' => 'Dirección']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('gender', 'Genero') }}
			{{ Form::select('gender', array('male' => 'Masculino', 'female' => 'Femenino'),$patient->gender, array('class' => 'form-control')) }}
		</div>
		<div class = "form-group">
			{{ Form::label('phone', 'Teléfono') }}
			{{ Form::text('phone', $patient->phone, ['class' => 'form-control', 'placeholder' => 'Teléfono']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('cellphone', 'Celular') }}
			{{ Form::text('cellphone', $patient->cellphone, ['class' => 'form-control', 'placeholder' => 'Celular']) }}
		</div>

		{{ Form::submit('Editar Paciente',['class' => 'btn btn-primary']) }}

	{{ Form::close() }}
</div>

@stop