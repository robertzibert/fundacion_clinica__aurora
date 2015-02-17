<!DOCTYPE html>
<html ng-app="MyApp">
	<head>
	    <title> @yield('meta-title','Fundación Aurora')</title>
	    <!--CSS-->
	    {{ HTML::style('assets/css/bootstrap.min.css') }}
			{{ HTML::style('assets/css/style.css') }}
			<link rel="stylesheet" href="/bower_components/fullcalendar/fullcalendar.css"/>
			<link rel="stylesheet" href="/bower_components/sweetalert/lib/sweet-alert.css"/>

<link rel="stylesheet" href="/bower_components/angular-loading-bar/build/loading-bar.css">

	</head>
	<body>
		@include('layouts.header')
		<div class="container-fluid content">
	    @yield('content')
		</div>
	  	<!--JS-->
	  	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
	  	{{ HTML::script('assets/js/bootstrap.min.js') }}

	  	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.13/angular.min.js"></script>
			<script type="text/javascript" src="/bower_components/jquery-ui/ui/jquery-ui.js"></script>
			<script type="text/javascript" src="/bower_components/sweetalert/lib/sweet-alert.min.js"></script>
			<script type="text/javascript" src="/bower_components/angular-sweetalert/SweetAlert.min.js"></script>
      <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
			<script type="text/javascript" src="/bower_components/angular-ui-calendar/src/calendar.js"></script>
			<script type="text/javascript" src="/bower_components/fullcalendar/fullcalendar.js"></script>
			<script type="text/javascript" src="/bower_components/fullcalendar/gcal.js"></script>
			<script type="text/javascript" src="/bower_components/jQuery-Mask-Plugin/dist/jquery.mask.min.js"></script>
			<script type="text/javascript" src="/bower_components/angular-loading-bar/build/loading-bar.js"></script>
			@yield('js')
	</body>
</html>