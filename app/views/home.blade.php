@extends('layouts.master')
<!--app/views/home.blade.php-->
@section('content')

<div class="row-fluid centered" id="tittle">
    <h1>Bienvenido</h1>
</div>
  <div class="row-fluid">
    <div class="col-md-4 col-md-offset-4 well">
  @if(Session::has('message'))    
      <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
  @endif
      {{ Form::open(['action'=>'login.store','method'=>'post','class' => 'form-horizontal']) }}
        <div class="form-group">
          {{ Form::label('email', 'Email',['class' => 'col-sm-2 control-label']) }}
            <div class="col-md-9 col-md-offset-1">
              {{ Form::text('email', Input::old('email'), ['class' => 'form-control','placeholder' => 'Email']) }}
            </div>
        </div>
        <div class="form-group">
          {{ Form::label('password', 'Contraseña',['class' => 'col-sm-2 control-label']) }}
            <div class="col-md-9 col-md-offset-1">
              {{ Form::password('password', ['class' => 'form-control','placeholder' => 'Contraseña']) }}
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
        	{{ Form::submit('Entrar', array('class' => 'btn btn-primary')) }}
	 			 </div>
        </div>
      {{ Form::close() }}        
      </div>      
    </div>
  
  @stop