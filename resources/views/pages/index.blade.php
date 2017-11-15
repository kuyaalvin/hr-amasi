@extends('layouts.applogin')

@section('content')

@if ($errors->any())
<label for="errorMessage">{{ $errors->all()[0] }}</label>
@endif

<form action="{{ url('login') }}" method="post">
		{{ csrf_field() }}
	<div class="form-group">
		<label for="username">User Name</label>
		<input id="username" name="username" value="{{ old('username') }}"/>
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input id="password" type="password" name="password"/>
		<input type="submit" class="btn btn-primary" value="Login">
	</div>
</form>



@endsection