@extends('layouts.app')

@section('content')
	<h1>edit project</h1>
	
@if ($errors->any())

@endif

	<form id="editProjectForm" action="{{ url('projects/' . $project->project_id) }}" method="post">
{{ csrf_field() }}
{{ method_field('patch') }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="projectName">Project Name</label>
				<input type="text" class="form-control" name="name" placeholder="edit project here" value="{{ old('name', $project->name) }}">
</div>
			<div class="form-group col-md-4">
				<label for="projectAddress">Project Address</label>
				<input type="text" class="form-control" name="address" placeholder="edit address here" value="{{ old('address', $project->address) }}">
</div>
			<div class="form-group col-md-4">
				<label for="projectName">Time In</label>
				<input type="text" class="form-control" name="time_in" placeholder="edit time in here" value="{{ old('time_in', $project->time_in) }}">
</div>
			<div class="form-group col-md-4">
				<label for="time_out">Time Out</label>
				<input type="text" class="form-control" name="time_out" placeholder="edit time out here" value="{{ old('time_out', $project->time_out) }}">
</div>
</div>
		<input type="submit" value="Submit">
	</form>
@endsection
