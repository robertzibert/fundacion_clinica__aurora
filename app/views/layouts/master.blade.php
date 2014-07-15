<!DOCTYPE html>
<html>
	<head>
	    <title> @yield('meta-title','Fundación Aurora')</title>
	    <!--CSS-->
	    {{ HTML::style('assets/css/bootstrap.min.css') }}
	    <!--JS-->
	    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
	    {{ HTML::script('assets/js/bootstrap.min.js') }}
	
	</head>
	<body>
		<div class="container-fluid content">
	    @yield('content')
		</div>
	</body>
</html>