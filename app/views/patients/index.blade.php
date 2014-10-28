@extends('layouts.master')
<!--app/views/patients/index.blade.php-->
@section('meta-title')
	Pacientes
@stop
@section('content')
	<div class="col-md-12">
	
<table class = "table table-striped table-bordered">	
	<thead>
		<th>Nombre Completo</th>
		<th>Rut</th>
		<th>Email</th>
		<th>Aseguradora</th>
		<th>Genero</th>
		<th>Telefono</th>
		<th>Celular</th>
		<th>Actions</th>
	</thead>
	<tbody>
	@foreach($patients as $value)
		<tr>
			<td>{{ $value->user->name }} {{ $value->user->lastname }}</td>
			<td>{{ $value->user->rut }}</td>
			<td>{{ $value->user->email }}</td>
			<td>{{ $value->insurance }}</td>
			<td>{{ $value->gender }}</td>
			<td>{{ $value->phone }}</td>
			<td>{{ $value->cellphone }}</td>			
			<!-- we will also add show, edit, and delete buttons -->
			<td>
				
					{{ Form::open(array('url' => 'patients/' . $value->id)) }}
						{{ Form::hidden('_method', 'DELETE') }}
					<a class="btn btn-small btn-info" href="{{ URL::to('patients/' . $value->id . '/edit') }}">Editar</a>
						{{ Form::submit('Eliminar',["class" => "btn btn-small btn-danger"]) }}
					{{ Form::close() }}
					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ HTML::link(URL::to('patients/create'), 'Agregar nuevo paciente', ["class"=>"btn btn-small btn-success"]) }}
	</div>
</div>

@stop