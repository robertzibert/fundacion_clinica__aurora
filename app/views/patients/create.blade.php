@extends('layouts.master')
<!--app/views/patients/create.blade.php-->
@section('content')

<h1>Create a Pattient</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'pattients')) }}

	<div class = "form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('Lastname', 'Last name') }}
		{{ Form::text('lastname', Input::old('lastname'), ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', Input::old('rut'), ['class' => 'form-control', 'placeholder' => 'Rut']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('insurance', 'Insurance') }}
		{{ Form::text('insurance', Input::old('insurance'), ['class' => 'form-control', 'placeholder' => 'Aseguradora']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('blood_type', 'Blood_type') }}
		{{ Form::text('blood_type', Input::old('blood_type'), ['class' => 'form-control', 'placeholder' => 'Dirección']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', Input::old('address'), ['class' => 'form-control', 'placeholder' => 'Genero']) }}
	</div>
	</div>
	<div class = "form-group">
		{{ Form::label('gender', 'Gender') }}
		{{ Form::text('gender', Input::old('gender'), ['class' => 'form-control', 'placeholder' => 'Genero']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('phone', 'Phone') }}
		{{ Form::text('phone', Input::old('phone'), ['class' => 'form-control', 'placeholder' => 'Telefono']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('cellphone', 'Cellphone') }}
		{{ Form::text('cellphone', Input::old('cellphone'), ['class' => 'form-control', 'placeholder' => 'celular']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', ['class' => 'form-control']) }}
	</div>

	{{ Form::submit('Create the pattient',['class' => 'btn btn-primary']) }}

{{ Form::close() }}

@stop