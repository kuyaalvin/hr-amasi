@extends('layouts.app')

@section('content')
	<h1>Editing Project - "{{ old('name', $project->name) }}"</h1>
	
@if ($errors->any())
@foreach ($errors->all() as $error)
<label for="errorMessage">{{ $error }}</label>
@endforeach
@endif

	<form action="{{ url('projects/' . $project->project_id) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('patch') }}
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="projectName">Project Name</label>
				<input type="text" class="form-control" name="name" placeholder="edit project name..." value="{{ old('name', $project->name) }}">
			</div>
			<div class="form-group col-md-12">
				<label for="projectAddress">Project Address</label>
				<textarea type="text" class="form-control" name="address" placeholder="edit address..." value="{{ old('address', $project->address) }}" rows="3"></textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="timeIn">Time In</label>
				<input type="time" class="form-control" name="time_in" placeholder="edit time in here" value="{{ old('time_in', $project->time_in) }}">
			</div>
			<div class="form-group col-md-6">
				<label for="timeOut">Time Out</label>
				<input type="time" class="form-control" name="time_out" placeholder="edit time out here" value="{{ old('time_out', $project->time_out) }}">
			</div>
		</div>
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>


@endsection
