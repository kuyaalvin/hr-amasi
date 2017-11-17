<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
		<title>{{config('app.name', 'LSAPP')}}</title>


		
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
	</head>
	<body>

	@auth
	<form id="logoutForm" action="{{ url('logout') }}" method="post">
			{{ csrf_field() }}
	</form>

	<nav class="navbar static-fixed-top navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"> <img src="{{ asset('img/brandlogo.png')}}" width="30" height="30" class="d-inline-block align-top" alt=""/> AMASI HR</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="{{ url('employees') }}">Employee</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('projects') }}">Project</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('positions') }}">Position</a>
				</li>
			</ul>
	    <form class="form-inline my-2 my-lg-0">
	    <input type="submit" class="nav-link btn btn-sm btn-outline-success my-2 my-sm-0" form="logoutForm" value="Log Out"></form>
		</div>
	</nav>
	@endauth
	<br/>	
	@yield('content')

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
setTimeout(function() {
// code when session expires
}, {{ env('SESSION_LIFETIME')*60*1000 }});
</script>
	</body>
</html>
