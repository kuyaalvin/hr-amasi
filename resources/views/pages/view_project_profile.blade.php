@extends('layouts.app')

@section('content')





<div>
  <span id="proj_title">NAME - Project Page</span>
  <form >
  <input class="btn btn-primary btn-lg" type="button" id="btn_emp_print" value="Print"/>
  <input class="btn btn-primary btn-lg" type="submit" id="btn_proj_transfer" value="Project Transfer"/>
	

</form>

  

</div>

<table class="" id="proj_profile_details">

  <tr>
    <td class="data_width_main"><span>Address:</span> </td>
    <td><span class="capitalize"> insert address  </span></td>
  </tr>

  <tr>
    <td><span>Total man Power:</span> </td>
    <td><span > insert man Power</span></td>
  </tr>

  <tr>
    <td><span>Time:</span> </td>
    <td><span> insert time</span></td>
  </tr>
</table>

<p id="emp_profile_title">STAFF - insert Number or number of people?</p>


<div id="proj_profile_details_tab_1">

	<table class="" id="proj_profile_sub_details_1">

		<tr>
			<td class="data_width_sub_5"><span>PM:</span> </td>
			<td><span class="capitalize"> Last_name M. First_name  </span></td>
		</tr>

		<tr>
			<td class=""><span>PIC:</span> </td>
			<td><span class="capitalize"> Last_name M. First_name </span></td>
		</tr>

		<tr>
			<td class=""><span>QA/QC:</span> </td>
			<td><span class="capitalize"> Last_name M. First_name, Last_name M. First_name </span></td>
		</tr>

		<tr>
			<td class=""><span>SAFETY OFFICER:</span> </td>
			<td><span class="capitalize">  Last_name M. First_name </span></td>
		</tr>

	</table>

</div>
      <!-- </td>

      <td> -->
<div id="proj_profile_details_tab_2">

	<table class="" id="proj_profile_sub_details_2">

		<tr>
			<td class="data_width_sub_6"><span>CAD OPERATOR:</span> </td>
			<td><span class="capitalize"> Last_name M. First_name  </span></td>
		</tr>

		<tr>
			<td class=""><span>WAREHOUSEMAN:</span> </td>
			<td><span class="capitalize"> Last_name M. First_name </span></td>
		</tr>

		<tr>
			<td class=""><span>FOREMAN:</span> </td>
			<td><span class="capitalize"> Last_name M. First_name </span></td>
		</tr>

		<tr>
			<td class=""><span>DOCS CONTROLLER:</span> </td>
			<td><span class="capitalize">  Last_name M. First_name </span></td>
		</tr>
	</table>
	
</div>


    
@endsection
@push('scripts')
<script>

$(document).ready(function(){

  
  
  $("#header_project").css("color","#fff");
  $("#header_employee").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_position").css("color","rgba(255, 255, 255, 0.5)");

});

$("#btn_emp_print").on("click", function(){
  window.print();
});





</script>
@endpush