@extends('layouts.master')
<!-- app/views/appointments/history.blade.php -->
@section('meta-title')
	Historial de Consultas
@stop
@section('content')
<div class="row">
	<div class="well col-md-10 col-md-offset-1">
		
<h1>Consultas</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<td>Paciente</td>
			<td>Rut</td>
			<td>Email</td>
			<td>Teléfono</td>
			<td>Precio</td>
			<td>Estado</td>
			<td>Fecha</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	
	@foreach($appointments as $appointment)
		<tr>
			<td>{{ $appointment->name }} {{ $appointment->lastname }}</td>
			<td>{{ $appointment->rut}}</td>
			<td>{{ $appointment->phone}}</td>
			<td>{{ $appointment->email }}</td>
			<td>{{ $appointment->price }}</td>
			<td>{{Lang::get('states.'.$appointment->state) }}</td>
			<td>{{ $appointment->active_at->format('Y-m-d') }}</td>

			<td>

				<a class="btn btn-small btn-info" href="{{ URL::to('appointments/' . $appointment->id . '/edit') }}">Editar</a>
				

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

{{ HTML::link(URL::to('appointment/create'), 'Agregar nueva consulta',['class' => 'btn btn-success']) }}
	</div>
</div>
@stop