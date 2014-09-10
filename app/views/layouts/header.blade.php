<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <b><a class="navbar-brand" href="/">Fundacion</a></b>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
@if(Auth::check() and Auth::user()->role_id == 1)
      <ul class="nav navbar-nav">
        <li class="dropdown">  
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultas<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/admins/history">Ver todas</a></li>
            <li><a href="/admins">Ver Pendientes</a></li>
          </ul>
        </li>  
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Doctores<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/doctors">Ver Doctores</a></li>
            <li><a href="/doctors/create">Agregar Doctor</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pacientes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/patients">Ver Pacientes</a></li>
            <li><a href="/patients/create">Agregar Pacientes</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Especialidades <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/specialisms">Ver Especialidades</a></li>
            <li><a href="/specialisms/create">Agregar Especialidades</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Horarios <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/schedules">Ver Horarios</a></li>
          </ul>
        </li>
      </ul>
@endif      
@if(Auth::check() and Auth::user()->doctor_id != 0)
      <ul class="nav navbar-nav">
        <li class="dropdown" >
          <a href="#">Consultas Pendientes</a>
        </li>
      </ul>
@endif      
      <ul class="nav navbar-nav navbar-right"><!--login-->
@if(Auth::check())          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Editar Perfil</a></li>
            <li><a href="/logout">Salir</a></li>
          </ul>
        </li>        
@endif      
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav><!--header-->
