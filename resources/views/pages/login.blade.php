@extends('layouts.applogin')

@section('content')

<form method="post">
	<div class="form-group">
		<label for="username">User Name</label>
		<input id="username" name="username"/>
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input id="password" name="password"/>
		<a id="login" href="index.html" class="btn btn-primary">Login</a>
	</div>
</form>



@endsection