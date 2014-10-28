@extends('layouts.master')
<!-- app/views/doctors/index.blade.php-->
@section('meta-title')
	Administradores
@stop
@section('content')

<table class = "table table-striped table-bordered">
	<thead>
			<th>Nombre y Apellido</th>
			<th>Rut</th>
			<th>Email</th>
			<th>Actions</th>
	</thead>
	<tbody>
	@foreach($admins as $admin)
		<tr>
			<td>{{ $admin->name }} {{ $admin->lastname }}</td>
			<td>{{ $admin->rut }}</td>
			<td>{{ $admin->email }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>

					{{ Form::open(array('url' => 'admins/' . $admin->id)) }}
						{{ Form::hidden('_method', 'DELETE') }}
					<a class="btn btn-small btn-info" href="{{ URL::to('admins/' . $admin->id . '/edit') }}">Editar</a>
						{{ Form::submit('Eliminar',["class" => "btn btn-small	 btn-danger"]) }}
					{{ Form::close() }}
					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ HTML::link(URL::to('admins/create'), 'Agregar Nuevo Admin', ["class"=>"btn btn-small btn-success"]) }}
@stop