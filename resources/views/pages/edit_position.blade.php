@extends('layouts.app')

@section('content')
	<h1>add position</h1>
	<p></p>

	<form>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Position Name</label>
				<input type="text" class="form-control" name="name" placeholder="add position here">
			</div>
		</div>
		<input type="submit">	

	</form>
@endsection