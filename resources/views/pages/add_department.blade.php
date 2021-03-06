@extends('layouts.app')

@section('content')



<h1>Register New Department</h1>

<p><small class="text-muted">Fields with * are required</small></p>



@if ($errors->any())
<label class="alert alert-danger" for="errorMessage">{{ $errors->all()[0] }}</label>
@endif

	<form action="{{ url('departments') }}" method="post">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Department Name: *</label>
				<input type="text" class="form-control" name="name" placeholder="add deparment..." value="{{ old('name') }}">
			</div>
		</div>
		
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>



@endsection


@push('scripts')
<script>

$(document).ready(function(){
  
  $("#header_department").css("color","#fff");
  $("#header_project").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_employee").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_position").css("color","rgba(255, 255, 255, 0.5)");

});

</script>
@endpush

