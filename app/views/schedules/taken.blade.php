@extends('layouts/master')
@section('meta-title')
	Horarios tomados
@stop
@section('content')


<div class="row">
	<div class="well col-md-10 col-md-offset-1">
		<table class="table table-bordered">
			<thead>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Seleccionar</th>
			</thead>
			@foreach($schedules as $schedule)			
				<tr>
					<td>{{$schedule->date}}</td>
					<td></td>
					<td>{{Form::checkbox('schedules[]', $schedule->id);}}</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>	

@stop