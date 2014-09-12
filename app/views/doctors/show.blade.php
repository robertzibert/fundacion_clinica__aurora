@extends('layouts.master')
<!--app/views/doctors/show.blade.php-->
@section('content')
<div class="row">
	<div class="well col-md-12">
		<div class = "col-md-3">
			<h1>Dr. {{$doctor->user->name}} {{$doctor->user->lastname}}</h1>
			<p>Universidad: {{$doctor->university}}</p>
			<p>Telefono {{$doctor->phone}}</p>
			<p>Celular: {{$doctor->cellphone}}</p>
			<p>Especialidad: {{$doctor->specialism->name}}
			</div>
		<div class = "col-md-offset-1 col-md-8">
			<table class = "table table-striped table-bordered">
				<thead>
						<th>Nombre Paciente</th>
						<th>Apellido Paciente</th>
						<th>Fecha</th>
						<th>Estado de la Consulta</th>
						<th>Acciones</th>
				</thead>
				<tbody>
				@foreach($appointments as $appointment)
					<tr>
						<td>{{ $appointment->patient->user->name }}</td>
						<td>{{ $appointment->patient->user->lastname }}</td>
						<td>{{ $appointment->active_at }}</td>
						<td>{{ $appointment->state}}</td>
						<!-- we will also add show, edit, and delete buttons -->
						<td>
							<a class="btn btn-small btn-danger" href="{{ URL::to('appointments/void/'.$appointment->id)}}">Anular</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>
@stop