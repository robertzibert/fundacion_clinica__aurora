@extends('layouts/master')
<!--app/views/schedules/edit.blade.php-->
@section('content')
{{Form::open(array('route' => 'schedules.store'))}}
<div class="row">
	<div class="well col-md-10 col-md-offset-1 ">
		<h1>Agenda Semanal del doctor {{$doctor->user->name}}</h1>
		<table class = "table table-bordered">
			{{Form::hidden('doctor_id',$doctor->id)}}
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
						
						<td>
								@if(in_array(date('Y-m-d H:i:s', strtotime($first_day." ".$initial_hour . " +".($i*30)." minutes")),$schedules))No Atiende
								@else
									{{Form::checkbox('date[]', $first_day." ".date('G:i', strtotime($initial_hour . " +".($i*30)." minutes")))}}
								@endif
						</td>
						<td>
							@if(in_array(date('Y-m-d H:i:s', strtotime($second_day." ".$initial_hour . " +".($i*30)." minutes")),$schedules))No Atiende
							@else
									{{Form::checkbox('date[]', $second_day." ".date('G:i', strtotime($initial_hour . " +".($i*30)." minutes")))}}
							@endif
							
						</td>
						<td>
							@if(in_array(date('Y-m-d H:i:s', strtotime($third_day." ".$initial_hour . " +".($i*30)." minutes")),$schedules))No Atiende
								@else
									{{Form::checkbox('date[]', $third_day." ".date('G:i', strtotime($initial_hour . " +".($i*30)." minutes")))}}
								@endif
							
						</td>
						<td>
							@if(in_array(date('Y-m-d H:i:s', strtotime($forth_day." ".$initial_hour . " +".($i*30)." minutes")),$schedules))No Atiende
							@else
								{{Form::checkbox('date[]', $forth_day." ".date('G:i', strtotime($initial_hour . " +".($i*30)." minutes")))}}
							@endif
						</td>
						<td>
							@if(in_array(date('Y-m-d H:i:s', strtotime($last_day." ".$initial_hour . " +".($i*30)." minutes")),$schedules))No Atiende
							@else
								{{Form::checkbox('date[]', $last_day." ".date('G:i', strtotime($initial_hour . " +".($i*30)." minutes")))}}
							@endif
						</td>
					
					</tr>
				@endfor
			
			</tbody>
		</table>
		{{ Form::submit('Editar Horario',["class" => "btn btn-primary"]) }}
	</div>
</div>
{{Form::close()}}
@stop