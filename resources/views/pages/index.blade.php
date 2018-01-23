@extends('layouts.applogin')

@section('contentlogin')
		
	<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
			<h3 class="text-center">Welcome to AMASI HR SYSTEM</h3>
		    <h2 class="text-center">Login Now</h2>
	<form class="login-form" action="{{ url('login') }}" method="post">
		{{ csrf_field() }}
  <div class="form-group">

    <label for="username" class="text-uppercase">Username</label>
    <input type="text" id="username" class="form-control" name="username" value="{{ old('username') }}" placeholder=""/>
    
  </div>
  <div class="form-group">
    <label for="password" class="text-uppercase">Password</label>
    <input type="password" id="password" class="form-control" name="password" placeholder="">
  </div>
  
  	

    <div class="form-group">
    
    @if ($errors->any())
	<div class="alert alert-danger" role="alert">
	<label for="errorMessage">{{ $errors->all()[0] }}</label>
	</div>
	@endif
  </div>
  <button type="submit" class="btn btn-login float-right">Submit</button>
</form>


		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Bugs? Errors?</h2>
            <p>Please contact system admin @ *insert phone number here*</p>
        </div>	
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Birthdays for the Month of *Insert Current Month Here*</h2>
            <p>*List here*</p>
        </div>	
    </div>
    </div>
    
            </div>	   
		    
		</div>
	</div>
</div>
</section>







@endsection