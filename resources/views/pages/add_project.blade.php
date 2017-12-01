@extends('layouts.app')

@section('content')

@include('layouts.sidebaremployee')

<h1>add project</h1>
@if ($errors->any())
@foreach ($errors->all() as $error)
<label for="errorMessage">{{ $error }}</label>
@endforeach
@endif

	<form action="{{ url('projects') }}" method="post">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="projectName">Project Name</label>
				<input type="text" class="form-control" name="name" placeholder="add project name here" value="{{ old('name') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="projectAddress">Project Address</label>
				<input type="text" class="form-control" name="address" placeholder="add project address here" value="{{ old('address') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="timeIn">Time In</label>
				<input  class="form-control" name="time_in" placeholder="add time in here" value="{{ old('time_in') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="timeOut">Time Out</label>
				<input class="form-control" name="time_out" placeholder="add time out here" value="{{ old('time_out') }}">
			</div>
		</div>
		<input type="submit" value="Submit">
	</form>

@endsection
