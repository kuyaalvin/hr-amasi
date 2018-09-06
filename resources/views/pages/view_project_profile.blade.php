@extends('layouts.app')

@section('content')





<div>
  <span id="proj_title">{{ $project->name }}</span>
  <form >
  <input class="btn btn-primary btn-lg" type="button" id="btn_emp_print" value="Print"/>
  <input class="btn btn-primary btn-lg" type="submit" id="btn_proj_transfer" value="Project Transfer"/>
	

</form>

  

</div>

<table class="" id="proj_profile_details">

  <tr>
    <td class="data_width_main"><span>Address:</span> </td>
    <td><span class="capitalize">{{ $project->address }}</span></td>
  </tr>

  <tr>
    <td><span>Total man Power:</span> </td>
    <td><span >{{ $countEmployees }}</span></td>
  </tr>

  <tr>
    <td><span>Time:</span> </td>
    <td><span>{{ $project->time_in}} - {{ $project->time_out }}</span></td>
  </tr>
</table>





<div class="row" id="datatables_div">
	
	<p id="table_title">Staff - {{ $countStaffEmployees }}</p>

	<table class="table table-hover" id="staff_table">
	  <thead>
	    <tr>
	      <th>Full Name</th>
	      <th>Position</th>
	    </tr>
	  </thead>
	</table>
</div>

<div class="row" id="datatables_div">
	
	<p id="table_title">Admin - {{ $countWorkerAdminEmployees }}</p>

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

	<p id="table_title">Agency - {{ $countWorkerAgencyEmployees }}</p>

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

$(function() {

var prefixUrl = "{{ url('projects') . '/' . $project->project_id . '/employees/' }}";

var table = $('#staff_table').DataTable({
dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    	serverSide: true,
        processing: true,
        ajax: prefixUrl+"staff/data",
        order: [],
        lengthMenu: [[10, 15, 20, 30, -1], [10, 15, 20, 30, 'All']],

        columns: [
        	{data: 'full_name',
        		render: function(data,type,row) {
                return '<span class="capitalize" > '+row.first_name+' '+row.middle_name.charAt(0)+ '. '+row.last_name+'</span>';
                }
        	},
        	{data: 'position',
        		render: function(data,type,row) {
                return '<span class="capitalize" > '+row.position_name+'</span>';
                }

        	}
        ]
    });


var table1 = $('#admin_table').DataTable({
dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    	serverSide: true,
        processing: true,
        ajax: prefixUrl+"worker/admin/data",
        order: [],
        lengthMenu: [[10, 15, 20, 30, -1], [10, 15, 20, 30, 'All']],

        columns: [
        	{data: 'full_name',
        		render: function(data,type,row) {
                return '<span class="capitalize" > '+row.first_name+' '+row.middle_name.charAt(0)+ '. '+row.last_name+'</span>';
                }
        	},
        	{data: 'position',
        		render: function(data,type,row) {
                return '<span class="capitalize" > '+row.position.name+'</span>';
                }

        	}
        ]
    });



var table2 = $('#agency_table').DataTable({
dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    	serverSide: true,
        processing: true,
        ajax: prefixUrl+"worker/agency/data",
        order: [],
        lengthMenu: [[10, 15, 20, 30, -1], [10, 15, 20, 30, 'All']],
        columns: [
        	{data: 'full_name',
        		render: function(data,type,row) {
                return '<span class="capitalize" > '+row.first_name+' '+row.middle_name.charAt(0)+ '. '+row.last_name+'</span>';
                }
        	},
        	{data: 'position',
        		render: function(data,type,row) {
                return '<span class="capitalize" > '+row.position.name+'</span>';
                }

        	}
        ]
    });

});




</script>
@endpush
