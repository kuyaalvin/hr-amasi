@extends('layouts.app')

@section('content')
<h1>Editing Project - "{{ old('name', $project->name) }}"</h1>

<p><small class="text-muted">Fields with * are required</small></p>

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
				<label for="projectName">Project Name: *</label>
				<input type="text" class="form-control" name="name" placeholder="edit project name..." value="{{ old('name', $project->name) }}">
			</div>
			<div class="form-group col-md-12">
				<label for="projectAddress">Project Address:</label>
				<textarea type="text" class="form-control" name="address" placeholder="edit address..." value="{{ old('address', $project->address) }}" rows="3"></textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="timeIn">Time In:</label>
				<div class="input-group bootstrap-timepicker timepicker">
					<input id="timepicker1" type="text" name="time_in" class="form-control input-small" placeholder="select in out here" value="{{ old('time_in', $project->time_in ) }}">
					<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label for="timeOut">Time Out: </label>
				<div class="input-group bootstrap-timepicker timepicker">
					<input id="timepicker1" type="text" name="time_out" class="form-control input-small" placeholder="select time out here" value="{{ old('time_out', $project->time_out ) }}">
					<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				</div>	
			</div>
		</div>
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>


@endsection

<!-- 

				<input type="time" class="form-control" name="time_out" placeholder="edit time out here" value="{{ old('time_out', $project->time_out) }}">


	<input type="time" class="form-control" name="time_in" placeholder="edit time in here" value="{{ old('time_in', $project->time_in) }}"> -->
