@extends('layouts.app')

@section('content')



<div class="container">
<h1>Register New Project</h1>

<p><small class="text-muted">Fields with * are required</small></p>

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" for="errorMessage" role="alert">
{{ $error }}
</div>
@endforeach
@endif

	<form action="{{ url('projects') }}" method="post" onsubmit="submitButton.disabled = true; return true;">
		{{ csrf_field() }}
			<div class="row form-group col-md-12">
				<label for="projectName">Project Name: *</label>
				<input type="text" class="form-control" name="name" placeholder="add project name here" value="{{ old('name') }}">
			</div>
			<div class="row form-group col-md-12">
				<label for="projectAddress">Project Address: </label>
				<textarea type="text" class="form-control" name="address" placeholder="add project address here" value="{{ old('address') }}" rows="3"></textarea>
			</div>

			<div class="row">
			<div class="form-group col-md-6">
				<label for="timeIn">Time In:</label>
				<div class="input-group bootstrap-timepicker timepicker">
					<input id="timepicker1" type="text" name="time_in" class="form-control input-small" placeholder="select time in here" value="{{ old('time_in') }}">
					<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label for="timeIn">Time Out:</label>
				<div class="input-group bootstrap-timepicker timepicker">
					<input id="timepicker1" type="text" name="time_out" class="form-control input-small" placeholder="select time out here" value="{{ old('time_out') }}">
					<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				</div>	
			</div>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" name="submitButton" type="submit" value="Submit">
			</div>

			
		
	</form>
</div>

@push('scripts')
<script>


	$('#timepicker').timepicker({
    timeFormat: 'HH:mm:ss',
    interval: 30,
    minTime: '0',
    maxTime: '23:00',
    startTime: '00:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true
	});

	$('#timepickerout').timepicker({
    timeFormat: 'HH:mm:ss',
    interval: 30,
    minTime: '0',
    maxTime: '23:00',
    startTime: '00:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true
	});

	$('#timepicker1').timepicker({
	defaultTIme: false,
	showMeridian: false	,
	showSeconds: true
	});

</script>
@endpush

@endsection


<!--
<label for="timeIn">Time In</label>
				<input  class="form-control" name="time_in" id="timepicker" placeholder="add time in here" value="{{ old('time_in') }}">

 <label for="timeOut">Time Out</label>
				<input class="form-control" name="time_out" id="timepickerout" placeholder="add time out here" value="{{ old('time_out') }}">

--!>
