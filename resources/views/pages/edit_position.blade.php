@extends('layouts.app')

@section('content')
	<h1>edit position</h1>
	
@if ($errors->any())
<label for="errorMessage">{{ $errors->all()[0] }}</label>
@endif

	<form id="editPositionForm" action="{{ url('positions/' . $position->position_id) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('patch') }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Position Name</label>
				<input type="text" class="form-control" name="name" placeholder="edit position here" value="{{ old('name', $position->name) }}">
			</div>
		</div>
		<input type="submit" value="Submit">

	</form>
@endsection
