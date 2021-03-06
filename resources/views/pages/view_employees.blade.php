@extends('layouts.app')

@section('content')





<h1>Employee Master List</h1>


@if (session('message'))
<div class="alert alert-info" role="alert">
{{ session('message') }}
</div>
@endif

<div class="row">
  <div class="col">
    <nav class="nav flex-column">
      <li class="nav-item">
        <button type="button"  class="btn btn-primary" onclick="location.href='{{ url('employees/create') }}'">+ Register Employee</button>
      </li>
    </nav>
  </div>
</div>

<hr/>
<div class="row">
<table class="table table-hover">
  <thead>
    <tr>
      <th class="col">ID Number</th>
      <th class="col">Biometric ID</th>
      <th class="col">Full Name</th>
      <th class="col">First Name</th>
      <th class="col">Middle Name</th>
      <th class="col">Position</th>
      <th class="col">Project</th>
      <th class="col">Account Number</th>
      <th class="col">SSS ID</th>
      <th class="col">PHIC ID</th>
      <th class="col">HDMF ID</th>
      <th class="col">TIN ID</th>
      <th class="col">Number of Dependencies</th>
      <th class="col">Religion</th>
      <th class="col">Gender</th>
      <th class="col">City Address</th>
      <th class="col">Provincial Address</th>
      <th class="col">Birthdate</th>
      <th class="col">Civil Status</th>
      <th class="col">Telephone Number</th>
      <th class="col">Mobile Number1</th>
      <th class="col">Mobile Number2</th>
      <th class="col">Citizenship</th>
      <th class="col">Date Started</th>
      <th class="col">Payroll Type</th>
      <th class="col">Agency</th>
      <th class="col">Regular</th>
      <th class="col">Edit</th>
      <th class="col">Delete</th>
    </tr>
  </thead>
  <tfoot >
    <tr>
      <th><input type="text" class="form-control" placeholder="Search ID Number"></th>
      <th><input type="text" class="form-control" placeholder="Search Biometric ID"></th>
      <th><input type="text" class="form-control" placeholder="Search Last Name"></th>
      <th><input type="text" class="form-control" placeholder="Search First Name"></th>
      <th><input type="text" class="form-control" placeholder="Search Middle Name"></th>
      <th><input type="text" class="form-control" placeholder="Search Position"></th>
      <th><input type="text" class="form-control" placeholder="Search Project"></th>
      <th><input type="text" class="form-control" placeholder="Search Account Number"></th>
      <th><input type="text" class="form-control" placeholder="Search SSS ID"></th>
      <th><input type="text" class="form-control" placeholder="Search PHIC ID"></th>
      <th><input type="text" class="form-control" placeholder="Search HDMF ID"></th>
      <th><input type="text" class="form-control" placeholder="Search TIN ID"></th>
      <th><input type="text" class="form-control" placeholder="Search Number of Dependencies"></th>
      <th><input type="text" class="form-control" placeholder="Search Religion"></th>
      <th><input type="text" class="form-control" placeholder="Search Gender"></th>
      <th><input type="text" class="form-control" placeholder="Search City Address"></th>
      <th><input type="text" class="form-control" placeholder="Search Provincial Address"></th>
      <th><input type="text" class="form-control" placeholder="Search Birthdate"></th>
      <th><input type="text" class="form-control" placeholder="Search Civil Status"></th>
      <th><input type="text" class="form-control" placeholder="Search Telephone Number"></th>
      <th><input type="text" class="form-control" placeholder="Search Mobile Number1"></th>
      <th><input type="text" class="form-control" placeholder="Search Mobile Number2"></th>
      <th><input type="text" class="form-control" placeholder="Search Citizenship"></th>
      <th><input type="text" class="form-control" placeholder="Search Date Started"></th>
      <th><input type="text" class="form-control" placeholder="Search Payroll Type"></th>
      <th><input type="text" class="form-control" placeholder="Search Agency"></th>
      <th><input type="text" class="form-control" placeholder="Search Regular"></th>
      <th></th>
      <th></th>
    </tr>
  </tfoot>
</table>
</div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel">Confirm deletion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Are you sure you want to delete employee "<span id="delete_name"> asd </span>?"</label>
            <br/>
            <label>How is this employee being let go?</label>
            <select class="form-control" id="select">
              <option value="Terminated">Terminated</option>
              <option value="AWOL">AWOL</option>
              <option value="Deceased">Deceased</option>
              <option value="Others">Others</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script>

$(document).ready(function(){

  
  
  $("#header_employee").css("color","#fff");
  $("#header_project").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_position").css("color","rgba(255, 255, 255, 0.5)");

});

var deleteForm;
$(function() {
var prefixUrl = "{{ url('employees') . '/' }}";

var table = $('.table').DataTable({
dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        serverSide: true,
        processing: true,
        ajax: prefixUrl+'data',
        lengthMenu: [[10, 25, 50, 100, 150, 200, 250, -1], [10, 25, 50, 100, 150, 200, 250, 'All']],
order: [],
        columns: [
            {data: 'id_number', visible: false },
            {data: 'biometric_id', visible: false },
            {data: 'last_name',
                render: function(data,type,row) {
                return '<a href="'+prefixUrl+row.employee_id+'/profile" id="full_name">' +row.last_name+', '+row.first_name+' '+row.middle_name.charAt(0)+ '.</a>';
                }
            },
            {data: 'first_name' , visible: false},
            {data: 'middle_name' , visible: false},
            {data: 'position',
searchable: false,
                render: function(data, type, row) {
                var position_name = row.position_name;
return position_name == null ? '' : position_name;
                }
                },
            {data: 'project',
searchable: false,
                render: function(data, type, row) {
                var project_name = row.project_name;
return project_name == null ? '' : project_name;
                }
                },
            {data: 'account_number', visible: false },
            {data: 'sss_id', title: 'SSS ID', visible: false },
            {data: 'phic_id', title: 'PHIC ID', visible: false },
            {data: 'hdmf_id', title: 'HDMF ID', visible: false },
            {data: 'tin_id', title: 'TIN ID', visible: false },
            {data: 'number_of_dependencies', visible: false },
            {data: 'religion', visible: false },
            {data: 'gender', visible: false },
            {data: 'city_address', visible: false },
            {data: 'provincial_address', visible: false },
            {data: 'birthdate', visible: false },
            {data: 'civil_status', visible: false },
            {data: 'telephone_number', visible: false },
            {data: 'mobile_number1', visible: false },
            {data: 'mobile_number2', visible: false },
            {data: 'citizenship', visible: false },
            {data: 'date_started', visible: false },
            {data: 'payroll_type', visible: false },
            {data: 'agency', visible: false,
                render: function(data, type, row) {
                return row.agency ? 'yes' : 'no';
                }
                },
            {data: 'regular', visible: false,
                render: function(data, type, row) {
                return row.regular ? 'yes' : 'no';
                }
                },
        	   {data: 'edit',
                searchable: false,
                orderable: false,
                render: function(data, type, row) {
                return '<a class="btn btn-sm btn-dark" href="'+prefixUrl+row.employee_id+'/edit">Edit</a>';
                }
                },
        	{data: 'delete',
              searchable: false,
              orderable: false,
              render: function(data, type, row) {
	             return '<form action="'+prefixUrl+row.employee_id+'" method="post">'+
	               '{{ csrf_field() }}'+
	               '{{ method_field('delete') }}'+
	               '<button type="button"  class="btn btn-sm btn-danger deleteButton" data-toggle="modal" data-target="#confirmModal">Delete  </button> <input value=" '+row.first_name+' ' +row.middle_name+' '+row.last_name+' " class="delete_name" hidden>'+
	               '</form>';	
                }
            	   }
                ]
    });

table.columns().every(function() {
var column = this;

$("input", this.footer()).on("keyup change", function(event) {
var searchValue = $(this).val();
if (column.search() !== searchValue)
{
column.search(searchValue).draw();
}
});
});

$("body").on("click", ".deleteButton", function(event) {
deleteForm = $(this).parent();
$("#delete_name").text ( deleteForm.find(".delete_name").val() );
});





$("#confirmButton").on("click", function(event) {
var selectedValue = $("#select").val();
var selectedElement = "<input type='hidden' id='status' name='status' value='"+selectedValue+"'/>";
deleteForm.append(selectedElement);
deleteForm.submit();
});

});
</script>
@endpush
