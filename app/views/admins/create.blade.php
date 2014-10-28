@extends('layouts.master')
<!-- app/views/doctors/create.blade.php-->
@section('meta-title')
	Crear Administrador
@stop
@section('content')
<div class="row">
	<div class="well col-md-10 col-md-offset-1">
		
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
<center><h1>Ingresar un nuevo Administrador</h1></center>
		{{ Form::open(array('url' => 'admins','class' => 'col-md-10 col-md-offset-1')) }}

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
				{{ Form::text('rut', Input::old('rut'), ['class' => 'form-control', 'placeholder' => 'Rut']) }}
			</div>
			<div class = "form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
			</div>
			<div class = "form-group">
				{{ Form::label('password', 'Contraseña') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>

	{{ Form::submit('Crear el administrador',['class' => 'btn btn-primary']) }}

{{ Form::close() }}
</div>
	</div>
</div>

@stop
