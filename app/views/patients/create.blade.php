@extends('layouts.master')
<!--app/views/patients/create.blade.php-->
@section('content')


<div class = "row">
<div class="col-md-10 col-md-offset-1 well" >
<center><h1>Ingresar un nuevo Paciente</h1></center>
<!-- if there are creation errors, they will show here -->
@if($errors->all())
<div class="alert alert-warning fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
{{ HTML::ul($errors->all()) }}
    </div>

@endif
	{{ Form::open(array('url' => 'patients','class' => 'col-md-10 col-md-offset-1')) }}

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
			{{ Form::label('insurance', 'Aseguradora') }}
			{{ Form::text('insurance', Input::old('insurance'), ['class' => 'form-control', 'placeholder' => 'Aseguradora']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('blood_type', 'Grupo Sanguineo') }}
			{{ Form::text('blood_type', Input::old('blood_type'), ['class' => 'form-control', 'placeholder' => 'Dirección']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('address', 'Dirección') }}
			{{ Form::text('address', Input::old('address'), ['class' => 'form-control', 'placeholder' => 'Dirección']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('gender', 'Genero') }}
			{{ Form::select('gender', array('male' => 'Masculino', 'female' => 'Femenino'),Input::old('gender'), array('class' => 'form-control')) }}
		</div>
		<div class = "form-group">
			{{ Form::label('phone', 'Teléfono') }}
			{{ Form::text('phone', Input::old('phone'), ['class' => 'form-control', 'placeholder' => 'Teléfono']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('cellphone', 'Celular') }}
			{{ Form::text('cellphone', Input::old('cellphone'), ['class' => 'form-control', 'placeholder' => 'Celular']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('password', 'Contraseña') }}
			{{ Form::password('password', ['class' => 'form-control']) }}
		</div>

		{{ Form::submit('Regristrar Paciente',['class' => 'btn btn-primary']) }}

	{{ Form::close() }}

</div>
</div>
@stop