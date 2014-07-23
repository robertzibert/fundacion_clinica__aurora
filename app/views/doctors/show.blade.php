@extends('layouts.master')
<!--app/views/doctors/show.blade.php-->
@section('content')
<h1>Dr. {{$doctor->user->name}} {{$doctor->user->lastname}}</h1>
<p>Universidad: {{$doctor->university}}</p>
<p>Telefono {{$doctor->phone}}</p>
<p>Celular: {{$doctor->cellphone}}</p>
<h2>Appointments</h2>

<table class = "table table-striped table-bordered">
	<thead>
			<th>Id</th>
			<th>Nombre Paciente</th>
			<th>Apellido Paciente</th>
			<th>Email Paciente</th>
			<th>Fecha</th>
			<th>Precio Consulta</th>
			<th>Estado de la Consulta</th>
			<th>Actions</th>
	</thead>
	<tbody>
	@foreach($appointments as $appointment)
		<tr>
			<td>{{ $appointment->id }}</td>
			<td>{{ $appointment->patient->user->name }}</td>
			<td>{{ $appointment->patient->user->lastname }}</td>
			<td>{{ $appointment->patient->user->email }}</td>
			<td>{{ $appointment->active_at }}</td>
			<td>{{ $appointment->price }}</td>
			<td>{{ $appointment->state}}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>
				<a class="btn btn-small btn-info" href="{{ URL::to('appointments/' . $appointment->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop