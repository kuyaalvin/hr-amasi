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
				<label for="positionName">Position Level: *</label>
				<select class="form-control" name="type" id="gender0">
					<option value="">Select Position Level</option>
					<option value="">1</option>
					<option value="">2</option>
					<option value="">3</option>
					<option value="">4</option>
					<option value="">5</option>
					<option value="">6</option>
					<option value="">7</option>
					<option value="">8</option>
					<option value="">9</option>
					<option value="">10</option>
					<option value="">11</option>
					<option value="">12</option>
					<option value="">13</option>
					<option value="">14</option>
					<option value="">15</option>
					<option value="">16</option>
					<option value="">17</option>
					<option value="">18</option>
					<option value="">19</option>
					<option value="">20</option>
			    </select>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Department: *</label>
				<select class="form-control" name="type" id="gender0">
					<option value="">Select Depeartment</option>
					<option value="">Accounting</option>
					<option value="">Admin</option>
					<option value="">Director</option>
					<option value="">Engineering</option>
					<option value="">Fabrication</option>
					<option value="">Human Resources</option>
					<option value="">Operations</option>
					<option value="">Purchasing</option>
					<option value="">Quality Assurance </option>
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

