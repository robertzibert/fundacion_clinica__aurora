@extends('layouts/master')
@section('meta-title')
	Horarios tomados
@stop
@section('content')


<div class="row">
	<div class="well col-md-10 col-md-offset-1">
		<h1>Horas que no atiende el doctor {{ $doctor->user->name }}</h1>
		<table class="table table-bordered">
			<thead>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Seleccionar</th>
			</thead>
			{{Form::open(['action' => 'schedules.destroy','method' => 'delete'])}}
			@foreach($schedules as $schedule)			
				<tr>
					<td>{{ Carbon::parse($schedule->date)->toDateString() }}</td>
					<td>{{ Carbon::parse($schedule->date)->toTimeString() }}</td>
					<td>{{Form::checkbox('schedules[]', $schedule->id);}}</td>
				</tr>
			@endforeach
		</table>
			{{ Form::submit('Editar Horario',["class" => "btn btn-primary"]) }}
			{{ Form::close() }}
	</div>
</div>	

@stop