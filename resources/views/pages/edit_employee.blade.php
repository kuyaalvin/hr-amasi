@extends('layouts.app')

@section('content')
	<h1>Editing Employee - " {{ old('last_name', $employee->last_name) }}, {{ old('first_name', $employee->first_name) }} {{ old('middle_name', $employee->middle_name) }}"</h1>
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
		<div class="form-group"><h3>Personal Information</h3></div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Last name*:</label>
			<div class="col-sm-10">
      			<input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name" value="{{ old('last_name', $employee->last_name) }}">
    		</div>	
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">First name*:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name" value="{{ old('first_name', $employee->first_name) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Middle name*:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="middle name" value="{{ old('middle_name', $employee->middle_name) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Date of birth*:</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', $employee->birthdate) }}" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Place of birth*:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="place of birth" value="{{ old('birth_place', $employee->birth_place) }}" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Gender*:</label>
			<div class="col-sm-10">
				<select class="form-control" name="gender" id="gender0">
				  <option ></option>
			      <option value="Male" @if (old('gender', $employee->gender) == 'Male') selected @endif>Male</option>
			      <option value="Female" @if (old('gender', $employee->gender) == 'Female') selected @endif>Female</option>
			    </select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Civil status*:</label>
			<div class="col-sm-10">
				<select class="form-control" name="civil_status" id="civil_status0">
				  <option ></option>
			      <option value="Single" @if (old('civil_status', $employee->civil_status) == 'Single') selected @endif>Single</option>
			      <option value="Married" @if (old('civil_status', $employee->civil_status) == 'Married') selected @endif>Married</option>
			    </select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Citizenship*:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="citizenship" value="{{ old('citizenship', $employee->citizenship) }}" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Religion*:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="religion" name="religion" placeholder="religion" value="{{ old('religion', $employee->religion) }}" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2  col-form-label">Mother's maiden name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="mothers_maiden_name" name="mothers_maiden_name" placeholder="mother's maiden name" value="{{ old('mothers_maiden_name', $employee->mothers_maiden_name) }}" >
			</div>
		</div>
		<div class="form-group"><h3>Government IDs</h3></div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">SSS ID:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="sss_id" name="sss_id" placeholder="SSS" value="{{ old('sss_id', $employee->sss_id) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">PHIC ID:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="phic_id" name="phic_id" placeholder="PHIC" value="{{ old('phic_id', $employee->phic_id) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">HDMF ID:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="hdmf_id" name="hdmf_id" placeholder="HDMF" value="{{ old('hdmf_id', $employee->hdmf_id) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">TIN ID:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="tin_id" name="tin_id" placeholder="TIN" value="{{ old('tin_id', $employee->tin_id) }}">
			</div>
		</div>
		<div class="form-group"><h3>Contact Information</h3></div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">City address*:</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control" id="city_address" name="city_address" placeholder="city address" rows="2">{{ old('city_address', $employee->city_address) }}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Provincial address: </label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control" id="provincial_address" name="provincial_address" placeholder="provincial address" value="{{ old('provincial_address', $employee->provincial_address) }} " rows="2"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Primary mobile number:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="mobile_number1" name="mobile_number1" placeholder="primary mobile number" value="{{ old('mobile_number1', $employee->mobile_number1) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Secondary mobile number:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="mobile_number2" name="mobile_number2" placeholder="secondary mobile number" value="{{ old('mobile_number2', $employee->mobile_number2) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Telephone number:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="telephone number" value="{{ old('telephone_number', $employee->telephone_number) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Emergency contact person name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name" placeholder="emergency contact name" value="{{ old('emergency_contact_name', $employee->emergency_contact_name) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Emergency contact person number:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="emergency_contact_number" name="emergency_contact_number" placeholder="emergency contact person number" value="{{ old('emergency_contact_number', $employee->emergency_contact_number) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Emergency contact person address:</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control" id="emergency_contact_address" name="emergency_contact_address" placeholder="emergency contact person address" rows="2">{{ old('emergency_contact_address', $employee->emergency_contact_address) }}</textarea>
			</div>
		</div>
		<div class="form-group"><h3>Employment Information</h3></div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Date hired:</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="date_hired" name="date_hired" value="{{ old('date_hired', $employee->date_hired) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Date started *:</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="date_started" name="date_started" value="{{ old('date_started', $employee->date_started) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Assigned position:</label>
			<div class="col-sm-10">
				<select class="form-control" name="position_id">
				<option value="">Select Position</option>
				@foreach ($positions as $position)
			      <option value="{{ $position->position_id }}" @if (old('position_id', $employee->position_id) == $position->position_id) selected @endif>{{ $position->name }}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Assigned project:</label>
			<div class="col-sm-10">
				<select class="form-control" name="project_id">
				<option value="">Select Project</option>
				@foreach ($projects as $project)
			      <option value="{{ $project->project_id }}" @if (old('project_id', $project_id) == $project->project_id) selected @endif>{{ $project->name }}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Employment type*:</label>
			<div class="col-sm-10">
				<select class="form-control" name="employment_type">
					<option ></option>
			      <option value="Agency" @if (old('employment_type', $employee->employment_type) == 'Agency') selected @endif>Agency</option>
			      <option value="Admin" @if (old('employment_type', $employee->employment_type) == 'Admin') selected @endif>Admin</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Payroll type*:</label>
			<div class="col-sm-10">
				<select class="form-control" name="payroll_type">
					<option > </option>
			      <option value="Weekly" @if (old('payroll_type', $employee->payroll_type) == 'Weekly') selected @endif>Weekly</option>
			      <option value="Monthly" @if (old('payroll_type', $employee->payroll_type) == 'Monthly') selected @endif>Monthly</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Referred by:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="referred_by" name="referred_by" placeholder="referred by" value="{{ old('referred_by', $employee->referred_by) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Walk-in:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="walk_in" name="walk_in" placeholder="walk in" value="{{ old('walk_in', $employee->walk_in) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">ATM account number:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="account_number" name="account_number" placeholder="atm account number" value="{{ old('account_number', $employee->account_number) }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Biometric number ID:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="biometric_id" name="biometric_id" placeholder="biometric ID" value="{{ old('biometric_id', $employee->biometric_id) }}">
			</div>
		</div>
		<input class="btn btn-primary" type="submit" value="Confirm Edit Employee">
	</form>	

	@push('scripts')
	<script>
	$().ready(function() {
		$('#mobile_number1').inputmask("mask", {"mask": "9999-999-9999"});
		$('#mobile_number2').inputmask("mask", {"mask": "9999-999-9999"});
		$('#telephone_number').inputmask("mask", {"mask": "999-9999"});
		$('#sss_id').inputmask("mask", {"mask": "99-9999999-9"});
		$('#phic_id').inputmask("mask", {"mask": "99-999999999-9"});
		$('#hdmf_id').inputmask("mask", {"mask": "9999-9999-9999"});
		$('#tin_id').inputmask("mask", {"mask": "999-999-999-0000"});
	});
	</script>
	@endpush

@endsection
