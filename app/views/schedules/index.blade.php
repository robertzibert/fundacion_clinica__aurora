@extends("layouts/master")
<!--app/views/schedules/index.blade.php-->
@section('meta-title')
	Horarios
	
@stop
@section('content')
<div class="row">
	<div class="well col-md-10 col-md-offset-1 ">
		<table class = "table table-bordered">
			<thead>
				<th>Nombre</th>
				<th>Especialidad</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach ($doctors as $doctor)
					<tr>
						<td>{{$doctor->user->name}} </td>
						<td>{{$doctor->specialism->name}} </td>
						<td>
							<a href = "{{ URL::route('schedules.edit', $doctor->id) }}" class = "btn btn-success">Editar horario</a>
							<a href = "{{ URL::route('schedules.taken', $doctor->id) }}" class = "btn btn-danger">Cancelar horas</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop