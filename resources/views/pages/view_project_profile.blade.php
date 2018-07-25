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

<p id="prof_profile_title">STAFF - insert Number or number of people?</p>


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

<div class="row" id="datatables_div">
	
	<p id="table_title">Admin - insert Number or number of people?</p>

	<table class="table table-hover" id="admin_table">
	  <thead>
	    <tr>
	      <th>Full Name</th>
	      <th>Position</th>
	    </tr>
	  </thead>
	</table>
</div>



<div class="row" id="datatables_div">

	<p id="table_title">Agency - insert Number or number of people?</p>

	<table class="table table-hover" id="agency_table">
	  <thead>
	    <tr>
	      <th>Full Name</th>
	      <th>Position</th>
	    </tr>
	  </thead>
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


var table = $('#admin_table').DataTable({
dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    	serverSide: true,
        processing: true,
        ajax: "{{url('projects/4/employees/agency')}}",
        order: [],
        lengthMenu: [[5, 10, 15, 20, 30, -1], [5, 10, 15, 20, 30, 'All']],

        columns: [
        	{data: 'last_name',
        		render: function(data,type,row) {
                return '<span class="capitalize" > '+row.first_name+' '+row.middle_name.charAt(0)+ '. '+row.first_name+'</span>';
                }
        	},
        	{data: 'employee_id'}
        ]
    });


var table2 = $('#agency_table').DataTable({
dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    	serverSide: true,
        processing: true,
        ajax: "{{url('projects/4/employees/agency')}}",
        order: [],
        lengthMenu: [[5, 10, 15, 20, 30, -1], [5, 10, 15, 20, 30, 'All']],
        columns: [
        	{data: 'last_name',
        		render: function(data,type,row) {
                return '<span class="capitalize" > '+row.first_name+' '+row.middle_name.charAt(0)+ '. '+row.first_name+'</span>';
                }
        	},
        	{data: 'employee_id'}
        ]
    });



</script>
@endpush
