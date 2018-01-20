<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
		<title>{{config('app.name', 'LSAPP')}}</title>


		
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
	</head>
	<body>



	<header>
		@auth
	<form id="logoutForm" action="{{ url('logout') }}" method="post">
			{{ csrf_field() }}
	</form>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#"><img src="{{ asset('img/brandlogo.png')}}" width="30" height="30" class="d-inline-block align-top" alt=""/>AMASI HR</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
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
          <form class="form-inline mt-2 mt-md-0">
            <input type="submit" class="nav-link btn btn-sm btn-outline-success my-2 my-sm-0" form="logoutForm" value="Log Out"></form>
          </form>
        </div>
      </nav>
      @endauth

      
    </header>


    <div class="container-fluid">
    	<div class="row">
    	@include('layouts.sidebaremployee')
    	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
  		@yield('content')
  		</main>
		</div>
	</div>
		


<script src="{{ asset('js/app.js') }}"></script>

<script>
function idleLogout() {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; 
    window.onclick = resetTimer;     
    window.onscroll = resetTimer;   
    window.onkeypress = resetTimer;

    function logout() {
    	alert("Session has been finish. Please login again.");
        window.location.href = '{{url("")}}';
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout, {{ env('SESSION_LIFETIME')*60*1000 }} );  
    }
}
idleLogout();

</script>
    @stack('scripts')
	</body>
</html>
