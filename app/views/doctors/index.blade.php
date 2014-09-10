@extends('layouts.master')
<!-- app/views/doctors/index.blade.php-->
@section('content')

<table class = "table table-striped table-bordered">
	<thead>
			<th>Nombre y Apellido</th>
			<th>Rut</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Celular</th>
			<th>Actions</th>
	</thead>
	<tbody>
	@foreach($doctors as $doctor)
		<tr>
			<td>{{ $doctor->user->name }} {{ $doctor->user->lastname }}</td>
			<td>{{ $doctor->user->rut }}</td>
			<td>{{ $doctor->user->email }}</td>
			<td>{{ $doctor->phone }}</td>
			<td>{{ $doctor->cellphone }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>

					{{ Form::open(array('url' => 'doctors/' . $doctor->id)) }}
					<a class="btn btn-small btn-success" href="{{ URL::to('doctors/' . $doctor->id) }}">Detalle</a>
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Eliminar',["class" => "btn btn-small	 btn-danger"]) }}
					<a class="btn btn-small btn-info" href="{{ URL::to('doctors/' . $doctor->id . '/edit') }}">Editar</a>
					{{ Form::close() }}
					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ HTML::link(URL::to('doctors/create'), 'Agregar Nuevo Doctor', ["class"=>"btn btn-small btn-success"]) }}
@stop