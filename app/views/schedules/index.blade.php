@extends("layouts/master")
<!--app/views/schedules/index.blade.php-->
@section('content')
<div class="row">
	<div class="col-md-11 well">
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
						<td><a href = "{{ URL::route('schedules.edit', $doctor->id) }}" class = "btn btn-success">Editar horario</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop