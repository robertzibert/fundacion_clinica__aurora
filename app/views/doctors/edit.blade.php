@extends('layouts.master')
<!-- app/views/doctors/edit.blade.php-->
@section('content')


{{ HTML::ul($errors->all()) }}
<div class="container-fluid well" style="width: 50%">
<center><h1>Editar Doctor {{$doctor->user->name}} {{$doctor->user->lastname}}</h1></center>

	{{ Form::model($doctor, array('route' => array('doctors.update', $doctor->id), 'method' => 'PUT')) }}

		<div class = "form-group">
			{{ Form::label('name', 'Nombre') }}
			{{ Form::text('name', $doctor->user->name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('Lastname', 'Apellido') }}
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
			{{ Form::label('phone', 'Teléfono') }}
			{{ Form::text('phone', $doctor->phone, ['class' => 'form-control', 'placeholder' => 'Telefono']) }}
		</div>
		<div class = "form-group">
				{{ Form::label('specialism', 'Especialidad') }}
				{{ Form::select('specialism', $specialisms, $doctor->specialism_id, ['class' => 'form-control']) }}
			</div>
		<div class = "form-group">
			{{ Form::label('cellphone', 'Celular') }}
			{{ Form::text('cellphone', $doctor->cellphone, ['class' => 'form-control', 'placeholder' => 'Celular']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Editar Doctor',["class" => "btn btn-primary"]) }}

	{{ Form::close() }}
</div>
@stop