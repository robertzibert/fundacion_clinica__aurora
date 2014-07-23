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
			<th>Actions</th>
	</thead>
	<tbody>
	@foreach($appointments as $appointment)
		<tr>
			<td>{{ $appointment->id }}</td>
			<td>{{ $appointment->patient->name }}</td>
			<td>{{ $appointment->patient->lastname }}</td>
			<td>{{ $appointment->patient->email }}</td>
			<td>{{ $appointment->active_at }}</td>
			<td>{{ $appointment->price }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>
				
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop