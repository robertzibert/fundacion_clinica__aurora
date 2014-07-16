<!--C:\xampp\htdocs\fundmedau\app/views/doctors/edit.blade.php-->
<h1>Edit Doctor {{$doctor->name}} {{$doctor->lastname}}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($doctor, array('route' => array('doctors.update', $doctor->id), 'method' => 'PUT')) }}

	<div>
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $doctor->name) }}
	</div>
	<div>
		{{ Form::label('Lastname', 'Last name') }}
		{{ Form::text('lastname', $doctor->lastname) }}
	</div>
	<div>
		{{ Form::label('rut', 'Rut') }}
		{{ Form::text('rut', $doctor->rut) }}
	</div>
	<div>
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', $doctor->email) }}
	</div>
	<div>
		{{ Form::label('university', 'University') }}
		{{ Form::text('university', $doctor->university) }}
	</div>

	{{ Form::submit('Edit the Doctor') }}

{{ Form::close() }}