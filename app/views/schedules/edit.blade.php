@extends('layouts/master')
<!--app/views/schedules/edit.blade.php-->
@section('content')
<div class="row">
	<div class="col-md-11 well">
		<h1>Agenda Semanal del doctor {{$doctor->user->name}}</h1>
		<table class = "table table-bordered">
			<thead>
				<th><p>Hora</p></th>
				<th>
					<p>Lunes</p>
					<p>{{$first_day}}</p>
				</th>
				<th>
					<p>Martes</p>
					<p>{{$second_day}}</p>
				</th>
				<th>
					<p>Miercoles</p>
					<p>{{$third_day}}</p>
				</th>
				<th>
					<p>Jueves</p>
					<p>{{$forth_day}}</p>
				</th>
				<th>
					<p>Viernes</p>
					<p>{{$last_day}}</p>
				</th>
			</thead>
			<tbody>
				@for($i = 0; $i <30; $i++ )
					<tr>
						<td>{{date('h:i A', strtotime($initial_hour . " +".($i*30)." minutes"))}}</td>
						<td>{{Form::checkbox('name', 'value')}}</td>
						<td>{{Form::checkbox('name', 'value')}}</td>
						<td>{{Form::checkbox('name', 'value')}}</td>
						<td>{{Form::checkbox('name', 'value')}}</td>
						<td>{{Form::checkbox('name', 'value')}}</td>
					</tr>
				@endfor
			</tbody>
		</table>
	</div>
</div>
@stop