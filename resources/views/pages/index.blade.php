@extends('layouts.applogin')

@section('contentlogin')



		
		<div class="container h-100">
		<blockquote class="blockquote text-center">
		  <p class="mb-0">Welcome to HR AMASI</p>
		 <small class="text-muted">please sign-in</small>
		</blockquote>	

			<div class="row h-100 justify-content-center align-items-center">


			<form action="{{ url('login') }}" method="post">
					{{ csrf_field() }}
				<div class="form-group">
					<label for="username">User Name</label>
					<input id="username" class="form-control" name="username" value="{{ old('username') }}"/>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input id="password" class="form-control" type="password" name="password"/>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Login">
				</div>
			</form>
			@if ($errors->any())


		</div>

		<div class="row h-100 alert alert-danger justify-content-center" role="alert">
			<label for="errorMessage">{{ $errors->all()[0] }}</label>
			</div>
			@endif
		</div>







@endsection