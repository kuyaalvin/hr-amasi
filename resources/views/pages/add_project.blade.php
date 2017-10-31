@extends('layouts.app')

@section('content')

<h1>add project</h1>
@if ($errors->any())

@endif

	<form id="createProjectForm" action="{{ url('projects') }}" method="post">
{{ csrf_field() }}
				<label for="projectName">Project Name</label>
				<input type="text" class="form-control" name="name" placeholder="add project name here" value="{{ old('name') }}"/>
				<label for="projectAddress">Project Address</label>
				<input type="text" class="form-control" name="address" placeholder="add project address here" value="{{ old('address') }}"/>
				<label for="timeIn">Time In</label>
				<input type="text" class="form-control" name="time_in" placeholder="add time in here" value="{{ old('time_in') }}"/>
				<label for="timeOut">Time Out</label>
				<input type="text" class="form-control" name="time_out" placeholder="add time out here" value="{{ old('time_out') }}"/>
		<input type="submit" value="Submit"/>
	</form>

@endsection
