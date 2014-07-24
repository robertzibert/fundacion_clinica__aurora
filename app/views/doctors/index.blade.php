<!--C:\xampp\htdocs\fundmedau\app/views/doctors/index.blade.php-->
<table>
	<th>
		<tr>
			<td></td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Rut</td>
			<td>Email</td>
			<td>Universidad</td>
			<td>Actions</td>
			<td></td>
		</tr>
	</th>
	<tbody>
	@foreach($doctors as $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->lastname }}</td>
			<td>{{ $value->rut }}</td>
			<td>{{ $value->email }}</td>
			<td>{{ $value->university }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>
				<a class="btn btn-small btn-success" href="{{ URL::to('doctors/' . $doctor->id) }}">Show this Doctor</a>

				{{ Form::open(array('url' => 'doctors/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete') }}
				{{ Form::close() }}
			</td>
			<td>
				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('doctors/' . $value->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

{{ HTML::link(URL::to('doctors/create'), 'Add new doctor') }}
