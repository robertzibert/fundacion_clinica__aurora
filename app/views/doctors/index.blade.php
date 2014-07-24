@extends('layouts.master')
<!-- app/views/doctors/index.blade.php-->
@section('content')

<table class = "table table-striped table-bordered">
	<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Rut</th>
			<th>Email</th>
			<th>Universidad</th>
			<th>Actions</th>
	</thead>
	<tbody>
	@foreach($doctors as $doctor)
		<tr>
			<td>{{ $doctor->id }}</td>
			<td>{{ $doctor->user->name }}</td>
			<td>{{ $doctor->user->lastname }}</td>
			<td>{{ $doctor->user->rut }}</td>
			<td>{{ $doctor->user->email }}</td>
			<td>{{ $doctor->university }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>
				<a class="btn btn-small btn-success" href="{{ URL::to('doctors/' . $doctor->id) }}">Show this Doctor</a>

				{{ Form::open(array('url' => 'doctors/' . $doctor->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete',["class" => "btn btn-danger"]) }}
				{{ Form::close() }}
				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('doctors/' . $doctor->id . '/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ HTML::link(URL::to('doctors/create'), 'Add new doctor') }}
@stop