@extends('layouts.master')
<!--app/views/patients/index.blade.php-->
@section('content')
<h1>Pacientes</h1>
<table class="table table-striped table-bordered">
	<th>
		<tr>
			<td></td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Rut</td>
			<td>Email</td>
			<td>Aseguradora</td>
			<td>Grupo Sanguineo</td>
			<td>Dirección</td>
			<td>Genero</td>
			<td>Telefono</td>
			<td>Celular</td>
			<td>Actions</td>
		</tr>
	</th>
	<tbody>
	@foreach($patients as $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->user->name }}</td>
			<td>{{ $value->user->lastname }}</td>
			<td>{{ $value->user->rut }}</td>
			<td>{{ $value->user->email }}</td>
			<td>{{ $value->insurance }}</td>
			<td>{{ $value->blood_type }}</td>
			<td>{{ $value->address }}</td>
			<td>{{ $value->gender }}</td>
			<td>{{ $value->phone }}</td>
			<td>{{ $value->cellphone }}</td>			
			<!-- we will also add show, edit, and delete buttons -->
			<td>
				{{ Form::open(array('url' => 'patients/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete',["class" => "btn btn-danger"]) }}
				{{ Form::close() }}
				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('patients/' . $value->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

{{ HTML::link(URL::to('patients/create'), 'Add new patients') }}