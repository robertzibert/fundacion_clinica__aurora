@extends('layouts.master')
<!--app/views/specialisms/index.blade.php-->
@section('meta-title')
  Especialidades
  
@stop
@section('content')

<table class = "table table-striped table-bordered">
	<thead>
			<th>Nombre</th>
			<th>Actions</th>
	</thead>
	<tbody>
	@foreach($specialisms as $specialism)
		<tr>
			<td>{{ $specialism->name }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>
				{{ Form::open(array('url' => 'specialisms/' . $specialism->id)) }}
					{{ Form::hidden('_method', 'DELETE') }}
						<a class="btn btn-small btn-info" href="{{ URL::to('specialisms/' . $specialism->id . '/edit') }}">Edit</a>
					{{ Form::submit('Delete',["class" => "btn btn-danger"]) }}
				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ HTML::link(URL::to('specialisms/create'), 'Agregar una Especialidad') }}
@stop