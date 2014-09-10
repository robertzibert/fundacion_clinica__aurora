@extends('layouts.master')
<!-- app/views/appointments/history.blade.php -->
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
			<td>Precio</td>
			<td>Estado</td>
			<td>Fecha</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	
	@foreach($appointments as $appointment)
		<tr>
			<td>{{ $appointment->price }}</td>
			<td>{{ $appointment->state }}</td>
			<td>{{ $appointment->active_at->format('Y-m-d') }}</td>
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

{{ HTML::link(URL::to('appointments/create'), 'Add new appointment') }}
	</div>
</div>
@stop