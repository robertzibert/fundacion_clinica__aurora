<!--C:\xampp\htdocs\fundmedau\app/views/doctors/create.blade.php-->
<!-- app/views/appointments/create.blade.php -->

<h1>Create a Doctor</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'doctors')) }}

	<div>
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name')) }}
	</div>
	<div>
		{{ Form::label('Lastname', 'Last name') }}
		{{ Form::text('lastname', Input::old('lastname')) }}
	</div>
	<div>
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', Input::old('rut')) }}
	</div>
	<div>
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', Input::old('email')) }}
	</div>
	<div>
		{{ Form::label('university', 'University') }}
		{{ Form::text('university', Input::old('university')) }}
	</div>
	<div>
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', null) }}
	</div>

	{{ Form::submit('Create the doctor') }}

{{ Form::close() }}

</div>
</body>
</html>
