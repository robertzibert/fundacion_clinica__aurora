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
	@foreach($appointment as $value)
		<tr>
			<td>{{$value->id}}</td>
			<td>{{$value->doctor->user->name}}</td>
			<td>asd</td> <!--revisar relacion de patient con appointment en el modelo-->
			<td>{{ $value->price }}</td>
			<td>{{ $value->state }}</td>
			<td>{{ $value->active_at}}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('appointments/' . $value->id) }}">Delete</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('appointments/' . $value->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ HTML::link(URL::to('appointments/create'), 'Add new appointment') }}
@stop