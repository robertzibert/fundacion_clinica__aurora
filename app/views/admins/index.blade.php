@extends('layouts.master')
<!-- app/views/admins/index.blade.php -->

@section('content')
<h1>Consultas pendientes para hoy</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Nombre Paciente</td>
			<td>Rut Paciente</td>
			<td>Telefono Paciente</td>
			<td>Estado</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	{{--Handling Exeptions--}}
	@if($appointments_today->isEmpty())
		<tr><td class = "centered" colspan="8">No hay consultas pendientes</td></tr>
	@endif	
	@foreach($appointments_today as $appointment)
		<tr>
			<td>{{ $appointment->patient->user->name }}</td>
			<td>{{ $appointment->patient->user->rut }}</td>
			<td>{{ $appointment->patient->phone }}</td>
			<td>{{ $appointment->state }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('appointments/' . $appointment->id) }}">Delete</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('appointments/' . $appointment->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<h1>Consultas pendientes para mañana</h1>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Nombre Paciente</td>
			<td>Rut Paciente</td>
			<td>Telefono Paciente</td>
			<td>Estado</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	{{--Handling Exeptions--}}
	@if($appointments_tomorrow->isEmpty())
		<tr><td class = "centered" colspan="3">No hay consultas pendientes</td></tr>
	@endif	
	@foreach($appointments_tomorrow as $appointment)
		<tr>
			<td>{{ $appointment->patient->user->name }}</td>
			<td>{{ $appointment->patient->user->rut }}</td>
			<td>{{ $appointment->patient->phone }}</td>
			<td>{{ $appointment->state }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('appointments/' . $appointment->id) }}">Delete</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('appointments/' . $appointment->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ HTML::link(URL::to('admins/history'), 'Ver todas las consultas') }}
<br>
{{ HTML::link(URL::to('appointments/create'), 'Agregar nueva consulta') }}
@stop