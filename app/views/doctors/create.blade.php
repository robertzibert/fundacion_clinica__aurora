@extends('layouts.master')
<!-- app/views/doctors/create.blade.php-->
@section('content')

<h1>Create a Doctor</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'doctors')) }}

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
		{{ Form::label('university', 'University') }}
		{{ Form::text('university', Input::old('university'), ['class' => 'form-control', 'placeholder' => 'Universidad']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('phone', 'Phone') }}
		{{ Form::text('phone', Input::old('phone'), ['class' => 'form-control', 'placeholder' => 'Telefono']) }}
	</div>
	<div class = "form-group">
		{{ Form::label('cellphone', 'Cellphone') }}
		{{ Form::text('cellphone', Input::old('cellphone'), ['class' => 'form-control', 'placeholder' => 'celular']) }}
	<div class = "form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', ['class' => 'form-control']) }}
	</div>

	{{ Form::submit('Create the doctor',['class' => 'btn btn-primary']) }}

{{ Form::close() }}

@stop