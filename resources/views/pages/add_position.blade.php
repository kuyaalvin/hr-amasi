@extends('layouts.app')

@section('content')



<h1>Register New Position</h1>

<p><small class="text-muted">Fields with * are required</small></p>



@if ($errors->any())
<label class="alert alert-danger" for="errorMessage">{{ $errors->all()[0] }}</label>
@endif

	<form action="{{ url('positions') }}" method="post">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Position Name: *</label>
				<input type="text" class="form-control" name="name" placeholder="add position..." value="{{ old('name') }}">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Position Type: *</label>
				<select class="form-control" name="type" id="gender0">
				  <option value="">Select Position Type</option>
			      <option value="Staff" @if (old('type') == 'Staff') selected @endif>Staff</option>
			      <option value="Worker" @if (old('type') == 'Worker') selected @endif>Worker</option>
			    </select>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Department: *</label>
				<select class="form-control" name="department_id" id="gender0">
					<option value="">Select Department</option>
				@foreach ($departments as $department)
				<option value="{{ $department->department_id }}" @if (old('department_id') == $department->department_id) selected @endif>{{ $department->name }}</option>
				@endforeach
			    </select>
			</div>
		</div>
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>



@endsection


@push('scripts')
<script>

$(document).ready(function(){
  
  $("#header_position").css("color","#fff");
  $("#header_project").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_employee").css("color","rgba(255, 255, 255, 0.5)");

});

</script>
@endpush

