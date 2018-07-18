@extends('layouts.app')

@section('content')





<div>
  <span id="emp_title">Employee Profile</span>
  
	<form action="{{ url('employees/' . $employee->employee_id . '/edit') }}">
  <input class="btn btn-primary btn-lg" type="" id="btn_emp_print" value="Print"/>
  <input class="btn btn-primary btn-lg" type="submit" id="btn_emp_edit" value="Edit"/>

</form>

  

</div>


@if (session('message'))
<div class="alert alert-info" role="alert">
{{ session('message') }}
</div>
@endif


<table class="" id="emp_main_details">

  <tr>
    <td><span>Name:</span> </td>
    <td><span class="capitalize">{{ $employee->first_name }} {{ substr ($employee->middle_name, 0,1 ) }}. {{ $employee->last_name }} </span></td>
  </tr>

  <tr>
    <td><span>Employee ID:</span> </td>
    <td><span >{{ $employee->id_number }}</span></td>
  </tr>

  <tr>
    <td><span>Birthdate:</span> </td>
    <td><span>{{ date ('m/d/Y', strtotime($employee->birthdate)) }}</span></td>
  </tr>

  <tr>
    <td><span>Position:</span> </td>
    <td><span class="capitalize">{{ $employee->position->name }}</span></td>
  </tr>

  <tr>
    <td><span>Project assigned:</span> </td>
    <td><span class="capitalize">{{ $employee->project->name }}</span></td>
  </tr>


</table>



<!-- <table class="table" id="emp_profile_details">
  <thead >
    <tr>
      <td> -->
        <div id="emp_details_tab_1">


        <p id="emp_profile_title">Personal Information</p>

          <table class="" id="emp_sub_details_1">

            <tr>
              <td> <p>Place of Birth:</p> </td>
              <td><p class="capitalize">{{ $employee->birth_place }}</p></td>
            </tr>

            <tr>
              <td><p>Gender:</p></td>
              <td><p class="capitalize">{{ $employee->gender }}</p></td>
            </tr>

            <tr>
              <td><p>Civil Status:</p> </td>
              <td><p class="capitalize">{{ $employee->civil_status }}</p></td>
            </tr>

            <tr>
              <td><p>Citizenship:</p></td>
              <td><p class="capitalize">{{ $employee->citizenship }}</p></td>
            </tr>

            <tr>
              <td><p>Religion:</p> </td>
              <td><p class="capitalize">{{ $employee->religion }}</p></td>
            </tr>

            <tr>
              <td><p>Mother's Maiden Name:</p> </td>
              <td><p class="capitalize">{{ $employee->mothers_maiden_name }}</p></td>
            </tr>

          </table>
        <p id="emp_profile_title">Contact Information</p>

          <table class="" id="emp_sub_details_2">

            <tr>
              <td><p>City Address:</p> </td>
              <td><p class="capitalize">{{ $employee->city_address }}</p></td>
            </tr>

            <tr>
              <td><p>Provincial Address:</p></td>
              <td><p class="capitalize">{{ $employee->provincial_address }}</p></td>
            </tr>

            <tr>
              <td><p>Primary Mobile Number:</p> </td>
              <td><p >{{ $employee->mobile_number1 }}</p></td>
            </tr>

            <tr>
              <td><p>Telephone Number:</p></td>
              <td><p>{{ $employee->telephone_number }}</p></td>
            </tr>

            <tr>
              <td><p>Emergency Contact Name:</p> </td>
              <td><p class="capitalize">{{ $employee->emergency_contact_name }}</p></td>
            </tr>

            <tr>
              <td><p>Emergency Contact Number:</p> </td>
              <td><p>{{ $employee->emergency_contact_number }}</p></td>
            </tr>

            <tr>
              <td><p>Emergency Contact Address:</p> </td>
              <td><p class="capitalize">{{ $employee->emergency_contact_address }}</p></td>
            </tr>

          </table>
        </div>
      <!-- </td>

      <td> -->
        <div id="emp_details_tab_2">
        <p id="emp_profile_title">Employee Information</p>
          <table class="" id="emp_sub_details_3">

            <tr>
              <td> <p>Dated Hired:</p> </td>
              <td> <p>{{ date ('m/d/Y', strtotime($employee->date_hired)) }}</p></td>
            </tr>

            <tr>
              <td><p>Date Started:</p></td>
              <td><p>{{ date ('m/d/Y', strtotime($employee->date_started)) }}</p></td>
            </tr>

            <tr>
              <td><p>Employeement Type:</p> </td>
              <td><p class="capitalize">{{ $employee->employment_type }}</p></td>
            </tr>

            <tr>
              <td><p>Payroll Type:</p></td>
              <td><p class="capitalize">{{ $employee->payroll_type }}</p></td>
            </tr>

            <tr>
              <td><p>Referred By:</p> </td>
              <td><p class="capitalize">{{ $employee->referred_by }}</p></td>
            </tr>

            <tr>
              <td><p>Walk-in:</p> </td>
              <td><p class="capitalize">{{ $employee->walk_in }}</p></td>
            </tr>

            <tr>
              <td><p>ATM Account Number:</p> </td>
              <td><p>{{ $employee->account_number }}</p></td>
            </tr>

            <tr>
              <td> <p>Biometric Number ID:</p> </td>
              <td> <p>{{ $employee->biometric_id }}</p> </td>
            </tr>

          </table>
        <p id="emp_profile_title">Goverment ID Information</p>
          <table class="" id="emp_sub_details_4">

            <tr>
              <td> <p>SSS ID:</p> </td>
              <td> <p>{{ $employee->sss_id }}</p></td>
            </tr>

            <tr>
              <td><p>PHIC ID:</p></td>
              <td><p>{{ $employee->phic_id }}</p></td>
            </tr>

            <tr>
              <td><p>HDMF ID:</p> </td>
              <td><p>{{ $employee->hdmf_id }}</p></td>
            </tr>

            <tr>
              <td><p>TIN ID:</p></td>
              <td><p>{{ $employee->tin_id }}</p></td>
            </tr>

          </table>
        </div>

        <div id="project_his">
          <p id="emp_profile_title">Project History</p>
          <table class="table" id="proj_table">
            <tr>
              <td id="emp_profile_title">Project</td>
              <td id="emp_profile_title">Period Date</td>
            </tr>

            <tr>
              <td > <p> Project name </p></td>
              <td > <p> Period Date </p></td>
            </tr>

            <tr>
              <td > <p> Project name </p></td>
              <td > <p> Period Date </p></td>
            </tr>
          </table>
          
        </div>
      <!-- </td>
    </tr>
  </thead>
</table> -->

    
@endsection
@push('scripts')
<script>

$(document).ready(function(){

  
  
  $("#header_employee").css("color","#fff");
  $("#header_project").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_position").css("color","rgba(255, 255, 255, 0.5)");

});

$("#btn_emp_print").on("click", function(){
  window.print();
});





</script>
@endpush