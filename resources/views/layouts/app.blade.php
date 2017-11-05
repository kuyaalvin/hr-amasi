<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<title>{{config('app.name', 'LSAPP')}}</title>
	</head>
	<body>
<form id="logoutForm" action="{{ url('logout') }}" method="post">
		{{ csrf_field() }}
</form>

	<nav class="navbar fixed-top">
		<a class="navbar-brand">AMASI HR</a>
		<ul class="navbar-nav">
		<!-- Pagpasok ng link ilagay mo na papuntang list -->
			<a class="nav-link" href="{{ url('employees') }}">Employee</a>
		</ul>
		<ul class="navbar-nav">
			<a class="nav-link" href="{{ url('projects') }}">Project</a>
		</ul>
		<ul class="navbar-nav">
			<a class="nav-link" href="{{ url('positions') }}">Position</a>
		</ul>
		<ul class="navbar-nav">
			<input type="submit" class="nav-link" form="logoutForm" value="Log Out">
</form>
		</ul>
	</nav>
	

	@yield('content')

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

	</body>
</html>
