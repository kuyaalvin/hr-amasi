@extends('layouts.app')

@section('content')
	<h1>Edit Position</h1>
<p><small class="text-muted">Fields with * are required</small></p>	
	
@if ($errors->any())
<label class="alert alert-danger" for="errorMessage">{{ $errors->all()[0] }}</label>
@endif

	<form action="{{ url('positions/' . $position->position_id) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('patch') }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Position Name:</label>
				<input type="text" class="form-control" name="name" placeholder="edit position here" value="{{ old('name', $position->name) }}">
			</div>

		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Position Type: *</label>
				<select class="form-control" name="gender" id="gender0">
				  <option value="">Select Position Type</option>
			      <option value=""  >Staff</option>
			      <option value="">Worker</option>
			    </select>
			</div>
		</div>
		<input class="btn btn-primary" type="submit" value="Submit">

	</form>
@endsection
