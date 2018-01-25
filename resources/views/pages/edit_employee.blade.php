@extends('layouts.app')

@section('content')
	<h1>Editing Employee - " {{ old('last_name', $employee->last_name) }} "</h1>
	<p><small class="text-muted">Fields with * are required</small></p>
	
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" for="errorMessage" role="alert">
{{ $error }}
</div>
@endforeach
@endif

	<form action="{{ url('employees/' . $employee->employee_id) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('patch') }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="fullName">Last Name: *</label>
				<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name..." value="{{ old('last_name', $employee->last_name) }}">
			</div>
			<div class="form-group col-md-4">
				<label for="fullName">First Name: *</label>
				<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name..." value="{{ old('first_name', $employee->first_name) }}">
			</div>
			<div class="form-group col-md-4">
				<label for="fullName">Middle Name: *</label>
				<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name..." value="{{ old('middle_name', $employee->middle_name) }} ">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="birthdate">Birth Date: *</label>
				<input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', $employee->birthdate) }}">
			</div>
			<div class="form-group col-md-4">
				<div class="col">
				<label class="col-form-label" for="gender">Gender: *</label>

				<div class="form-check">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" id="gender0" name="gender" value="Male" @if (old('gender', $employee->gender) == 'Male') checked @endif> Male
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" id="gender1" name="gender" value="Female" @if (old('gender', $employee->gender) == 'Female') checked @endif> Female
				  </label>
				</div>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="col">
				<label class="col-form-label" for="civilStatus">Civil Satus: *</label>

				<div class="form-check">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" id="civil_status0" name="civil_status"value="Single" @if (old('civil_status', $employee->civil_status) == 'Single') checked @endif> Single
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" id="civil_status1" name="civil_status" value="Married" @if (old('civil_status', $employee->civil_status) == 'Married') checked @endif> Married	
				  </label>
				</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label for="cityAddress">City Address: *</label>
				<textarea type="text" class="form-control" id="city_address" name="city_address" placeholder="City Address" value="{{ old('city_address', $employee->city_address) }}" rows="3"></textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="provincialAddress">Provincial Address: </label>
				<textarea type="text" class="form-control" id="provincial_address" name="provincial_address" placeholder="Provincial Address"  value="{{ old('provincial_address', $employee->provincial_address) }}" rows="3"></textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="telephoneNumber">Telephone Number:</label>
				<input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="Telephone Number" value="{{ old('telephone_number', $employee->telephone_number) }}">
			</div>
			<div class="form-group col-md-4">
				<label for="mobileNumber1">Primary Mobile Number:</label>
				<input type="text" class="form-control" id="mobile_number1" name="mobile_number1" placeholder="Primary Mobile Number" value="{{ old('mobile_number1', $employee->mobile_number1) }}">
			</div>
			<div class="form-group col-md-4">
				<label for="mobileNumber2">Secondary Mobile Number:</label>
				<input type="text" class="form-control" id="mobile_number2" name="mobile_number2" placeholder="Secondary Mobile Number" value="{{ old('mobile_number2', $employee->mobile_number2) }}">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="religion">Religion:</label>
				<input type="text" class="form-control" id="religion" name="religion" placeholder="Religion" value="{{ old('religion', $employee->religion) }}">
			</div>
			<div class="form-group col-md-3">
				<label for="numberOfDependencies">Number of Dependencies:</label>
				<input type="text" class="form-control" id="number_of_dependencies" name="number_of_dependencies" placeholder="Number of Dependencies" value="{{ old('number_of_dependencies', $employee->number_of_dependencies) }}">
			</div>
			<div class="form-group col-md-3">
				<label for="citizenship">Citizenship: * </label>
				<input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship" value="{{ old('citizenship', $employee->citizenship) }}">
			</div>
			<div class="form-group col-md-3">
				<label for="position">Position: </label>
				<select class="form-control" name="position_id">
				<option value=""></option>
				@foreach ($positions as $position)
				<option value="{{ $position->position_id }}" @if (old('position_id', $employee->position_id) == $position->position_id) selected @endif>{{ $position->name }}</option>
				@endforeach
				</select>
			</div>
			<div class="form-group col-md-3">
				<label for="project">Project: </label>
				<select class="form-control" name="project_id">
				<option value=""></option>
				@foreach ($projects as $project)
				<option value="{{ $project->project_id }}" @if (old('project_id', $employee->project_id) == $project->project_id) selected @endif>{{ $project->name }}</option>
				@endforeach
				</select>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="sss">SSS ID:</label>
				<input type="text" class="form-control" id="sss_id" name="sss_id" placeholder="SSS ID"  value="{{ old('sss_id', $employee->sss_id) }}">
			</div>
			<div class="form-group col-md-3">
				<label for="phic">PHIC ID:</label>
				<input type="text" class="form-control" id="phic_id" name="phic_id" placeholder="PHIC ID" value="{{ old('phic_id', $employee->phic_id) }}">
			</div>
			<div class="form-group col-md-3">
				<label for="hdmf">HDMF ID:</label>
				<input type="text" class="form-control" id="hdmf_id" name="hdmf_id" placeholder="HDMF ID" value="{{ old('hdmf_id', $employee->hdmf_id) }}">
			</div>
			<div class="form-group col-md-3">
				<label for="tin">TIN ID:</label>
				<input type="text" class="form-control" id="tin_id" name="tin_id" placeholder="TIN ID" value="{{ old('tin_id', $employee->tin_id) }}">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col">
				<label for="accountNumber">Account Number:</label>
				<input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" value="{{ old('account_number', $employee->account_number) }}">
			</div>
			<div class="form-group col">
				<label for="biometricID">Biometric ID:</label>
				<input type="text" class="form-control" id="biometric_id" name="biometric_id" placeholder="Biometric ID" value="{{ old('biometric_id', $employee->biometric_id) }}">
			</div>
			<div class="form-group col">
				<div class="col">
				<label class="col-form-label" for="payrollType">Payroll Type: *</label>
				<div class="form-check">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" type="radio" id="payroll_type0" name="payroll_type" value="Weekly" @if (old('payroll_type', $employee->payroll_type) == 'Weekly') checked @endif>Weekly
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" id="payroll_type1" name="payroll_type" value="Monthly" @if (old('payroll_type', $employee->payroll_type) == 'Monthly') checked @endif> Monthly
				  </label>
				</div>
				</div>
			</div>
			<div class="form-group col">
				<label for="dateStarted">Date Started: *</label>
				<input type="date" class="form-control" id="date_started" name="date_started" value="{{ old('date_started', $employee->date_started) }}">
			</div>
			
		</div>
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
@endsection
