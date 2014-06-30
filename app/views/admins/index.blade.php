<p>Appointments:</p>
@foreach($appointment as $valor)
    <p>Precio: {{ $valor->price }}, Estado: {{ $valor->state }}</p>
@endforeach
<!-- admin apointments ver y crear (formulario) -->
{{ link_to_route('admins.create', 'Add new appointment') }}