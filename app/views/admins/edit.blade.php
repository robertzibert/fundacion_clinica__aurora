@extends('layouts.master')
<!-- app/views/doctors/edit.blade.php-->
@section('content')


{{ HTML::ul($errors->all()) }}
<div class="container-fluid well" style="width: 50%">
<center><h1>Editar Administridor {{$user->name}} {{$user->lastname}}</h1></center>

	{{ Form::model($user, array('route' => array('admins.update', $user->id), 'method' => 'PUT')) }}

		<div class = "form-group">
			{{ Form::label('name', 'Nombre') }}
			{{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('Lastname', 'Apellido') }}
			{{ Form::text('lastname', $user->lastname, ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('rut', 'Rut') }}
			{{ Form::text('rut', $user->rut, ['class' => 'form-control', 'placeholder' => 'Rut']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
		</div>
		<div class = "form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Editar administrador',["class" => "btn btn-primary"]) }}

	{{ Form::close() }}
</div>
@stop