@extends('layouts.master')
<!-- app/views/admins/index.blade.php -->

@section('content')
<h1>Appointments</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td></td>
			<td>Doctor</td>
			<td>Paciente</td>
			<td>Precio</td>
			<td>Estado</td>
			<td>fecha</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	{{--Handling Exeptions--}}
	@if($appointments->isEmpty())
		<tr><td>No hay consultas pendientes</td></tr>
	@endif	
	@foreach($appointments as $appointment)
		<tr>
			<td>{{ $appointment->id}}</td>
			<td>{{ $appointment->doctor->user->name}}</td>
			<td>{{ $appointment->patient->user->name}}</td>
			<td>{{ $appointment->price }}</td>
			<td>{{ $appointment->state }}</td>
			<td>{{ $appointment->active_at}}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				{{ Form::open(array('url' => 'appointments/' . $appointment->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete',["class" => "btn btn-danger"]) }}
				{{ Form::close() }}

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('appointments/' . $appointment->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ HTML::link(URL::to('appointments/create'), 'Add new appointment') }}
@stop