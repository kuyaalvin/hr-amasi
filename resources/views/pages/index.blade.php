@extends('layouts.app')

@section('content')
	<h1>Welcome To AMASI HR SYSTEM</h1>
	<p>Navigate thru the system using the menu above</p>

	<form>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="fullName">Name</label>
				<input type="text" class="form-control" id="last_name" placeholder="Last Name">
			</div>
			<div class="form-group col-md-4">
				<input type="text" class="form-control" id="first_name" placeholder="First Name">
			</div>
			<div class="form-group col-md-4">
				<input type="text" class="form-control" id="middle_name" placeholder="Middle Name">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="birthdate">Birth Date</label>
				<input type="date" class="form-control" id="birthdate">
			</div>
			<div class="form-group col-md-4">
				<label for="gender">Sex</label>
				<label class="checkbox-inline form-control"><input type="checkbox" id="gender" value="Male">Male</label>
				<label class="checkbox-inline form-control"><input type="checkbox" id="gender" value="Female">Female</label>
			</div>
			<div class="form-group col-md-4">
				<label for="civilStatus">Civil Status</label>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="religion">Religion</label>
			</div>
			<div class="form-group col-md-3">
				<label for="citizenship">Citizenship</label>
			</div>
			<div class="form-group col-md-3">
				<label for="position">Position</label>
			</div>
			<div class="form-group col-md-3">
				<label for="project">Project</label>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="sss">SSS ID</label>
			</div>
			<div class="form-group col-md-4">
				<label for="tin">TIN ID</label>
			</div>
			<div class="form-group col-md-4">
				<label for="philhealth">PHILHEALTH ID</label>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="accountNumber">Account Number</label>
			</div>
		</div>

	</form>
@endsection