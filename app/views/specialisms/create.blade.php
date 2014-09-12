@extends('layouts.master')
<!-- app/views/specialisms/create.blade.php -->
@section('content')
<div class="row">
	<div class="well col-md-10 col-md-offset-1">
		<h1>Crear una Espcialidad</h1>
		
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		
		{{ Form::open(array('url' => 'specialisms')) }}
		
			<div class="form-group">
				{{ Form::label('specialism', 'Especialidad') }}
				{{ Form::text ('name', Input::old('specialism'), array('class' => 'form-control')) }}
			</div>
			{{ Form::submit('Crear la Especialidad', array('class' => 'btn btn-primary')) }}
		
		{{ Form::close() }}
		
	</div>
</div>

@stop