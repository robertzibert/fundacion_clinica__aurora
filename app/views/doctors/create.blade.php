@extends('layouts.master')
<!-- app/views/doctors/create.blade.php-->
@section('meta-title')
	Crear Doctor
@stop
@section('content')
<div class="row">
	<div class="well col-md-10 col-md-offset-1">
		
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
<center><h1>Ingresar un nuevo Doctor</h1></center>
		{{ Form::open(array('url' => 'doctors','class' => 'col-md-10 col-md-offset-1')) }}

			<div class = "form-group">
				{{ Form::label('name', 'Nombre') }}
				{{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
			</div>
			<div class = "form-group">
				{{ Form::label('Lastname', 'Apellido') }}
				{{ Form::text('lastname', Input::old('lastname'), ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
			</div>
			<div class = "form-group">
				{{ Form::label('rut', 'Rut') }}
				{{ Form::text('rut', Input::old('rut'), ['class' => 'form-control', 'placeholder' => 'Rut','data-mask' => '#0.000.000-A', 'data-mask-reverse' => 'true']) }}
			</div>
			<div class = "form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
			</div>
			<div class = "form-group">
				{{ Form::label('specialism', 'Especialidad') }}
				{{ Form::select('specialism', $specialisms, Input::old('specialism'), ['class' => 'form-control']) }}
			</div>
			<div class = "form-group">
				{{ Form::label('phone', 'Teléfono') }}
				{{ Form::text('phone', Input::old('phone'), ['class' => 'form-control', 'placeholder' => 'Teléfono']) }}
			</div>
			<div class = "form-group">
				{{ Form::label('cellphone', 'Celular') }}
				{{ Form::text('cellphone', Input::old('cellphone'), ['class' => 'form-control', 'placeholder' => 'Celular']) }}
			<div class = "form-group">
				{{ Form::label('password', 'Contraseña') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>

	{{ Form::submit('Crear Doctor',['class' => 'btn btn-primary']) }}

{{ Form::close() }}
</div>
	</div>


@stop