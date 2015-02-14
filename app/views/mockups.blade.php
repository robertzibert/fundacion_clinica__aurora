@extends('layouts.master')
<!--app/views/home.blade.php-->
@section('content')
<div class="col-md-12" ng-controller="Controller">

<div class="row">

	{{Form::open(array('route' => 'appointments.store'))}}

	<div class="col-md-5">
	    <select name = "doctor_id" class="form-control" ng-model = "doctor.id" ng-change = "searchDoctor(doctor.id)">
  	    @foreach($doctors as $doctor)
          <option value="{{$doctor->id}}">{{$doctor->user->name}}</option>
  	    @endforeach
	    </select>
	</div>

  <div class="well col-md-4 col-md-offset-2" style= "height: 74px;">
    <div class="media">
      <div class="media-body">
        <h4 class="media-heading">@{{doctor.user.name }}</h4>
        <p>
          <span class="label label-info">@{{ doctor.specialism.name }}</span>
          <span class="label label-warning">@{{ doctor.user.email }}</span>
          <span class="label label-danger" ng-bind="appointment_date| date:' dd-MM-yyyy'" ></span>
         </p>
        <p></p>
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-top: 10px;">
	<div class="col-md-5 well">
	<div  >
		<div ui-calendar="uiConfig.calendar"  ng-model="eventSources"></div>
	</div>
		
	</div>
	<div class="col-md-2">
		<div class="panel panel-default" style="height: 489px;">
  	<div class="panel-heading">
    	<h3 class="panel-title">Horario del doctor</h3>
  	</div>
  	<div class="panel-body">
		<table class="table">
			<thead>
				<th>Hora</th>
				<th>Estado</th>
			</thead>
			<tbody>
      <tr ng-repeat="activity in activities">
        <td>@{{activity.date | date:' hh:mm'}}</td>
        <td>@{{activity.title}}</td>
      </tr>
			
			</tbody>	
		</table>
  </div>
</div>
	
</div>
<div class="col-md-4 well" style="height: 489px;" >
	<h3>Datos del paciente</h3>
	<div class="row">
	<div class="form-group col-md-6">
    <label for="name">Nombre</label>
    <input name="name" type="text" class="form-control" >
  </div>
  <div class="form-group col-md-6">
      <label for="lastname">Apellido</label>
      <input name="lastname"  type="text" class="form-control" >
    </div>
  <div class="form-group col-md-6">
    <label for="rut">Rut</label>
    <input name="rut" data-mask = '#0.000.000-A' data-mask-reverse = 'true' type="text" class="form-control" >
  </div>
  <div class="form-group col-md-6">
    <label for="phone">Telefono</label>
    <input name="phone" type="text" class="form-control" >
  </div>

  <div class="form-group col-md-6">
    <label for="cellphone">Celular</label>
    <input name="cellphone"  type="text" class="form-control" >
  </div>
  <div class="form-group col-md-6">
    <label for="email">Email</label>
    <input type="email" class="form-control" >
  </div>
   <div class="form-group col-md-6">
      <label for="hour">Hora</label>
      <input name="hour_active_at" type="time" class="form-control" >
    </div>
    <div class="form-group col-md-6">
          <label for="gender">Género</label>
          <select name="gender"  class="form-control" >
            <option value="male">Masculino</option>
            <option value="female">Femenino</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="price">Precio</label>
          <input name="price" type="text" class="form-control" >
        </div>
        <input type="hidden" name="active_at" value= @{{start_at}}>
</div>
        <div class="row">
        <div class="col-md-2">
          <button type="submit" class="btn btn-default">Crear Consulta</button>
        </div>
        </div>




  </div>

{{Form::close()}}
		</div>
</div>

@stop
@section('js')
{{ HTML::script('assets/js/appointments/create.js') }}
@stop