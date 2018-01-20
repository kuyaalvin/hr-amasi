@extends('layouts.app')

@section('content')



<h1>Add Position</h1>
@if ($errors->any())
<label for="errorMessage">{{ $errors->all()[0] }}</label>
@endif

	<form action="{{ url('positions') }}" method="post">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Position Name</label>
				<input type="text" class="form-control" name="name" placeholder="add position..." value="{{ old('name') }}">
			</div>
		</div>
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>


@endsection
