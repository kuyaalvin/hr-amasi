@extends('layouts.app')

@section('content')

<div class="container">
@if (session('message'))
<h4 id="message">{{ session('message') }}</h4>
@endif

<div class="row">
<button type="button"  class="btn btn-outline-primary" onclick="location.href='{{ url('employees/create') }}'">+ Add Employee</button>
</div>

<br/>
<div class="row">
<h4>Employee Master List</h4>
</div>

<div class="row">
<table class="table table-hover">
  <thead >
    <tr>
<th class="col">ID Number</th>
<th class="col">Biometric ID</th>
<th class="col">Last Name</th>
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
<th><input type="text" placeholder="Search ID Number"></th>
<th><input type="text" placeholder="Search Biometric ID"></th>
<th><input type="text" placeholder="Search Last Name"></th>
<th><input type="text" placeholder="Search First Name"></th>
<th><input type="text" placeholder="Search Middle Name"></th>
<th><input type="text" placeholder="Search Position"></th>
<th><input type="text" placeholder="Search Project"></th>
<th><input type="text" placeholder="Search Account Number"></th>
<th><input type="text" placeholder="Search SSS ID"></th>
<th><input type="text" placeholder="Search PHIC ID"></th>
<th><input type="text" placeholder="Search HDMF ID"></th>
<th><input type="text" placeholder="Search TIN ID"></th>
<th><input type="text" placeholder="Search Number of Dependencies"></th>
<th><input type="text" placeholder="Search Religion"></th>
<th><input type="text" placeholder="Search Gender"></th>
<th><input type="text" placeholder="Search City Address"></th>
<th><input type="text" placeholder="Search Provincial Address"></th>
<th><input type="text" placeholder="Search Birthdate"></th>
<th><input type="text" placeholder="Search Civil Status"></th>
<th><input type="text" placeholder="Search Telephone Number"></th>
<th><input type="text" placeholder="Search Mobile Number1"></th>
<th><input type="text" placeholder="Search Mobile Number2"></th>
<th><input type="text" placeholder="Search Citizenship"></th>
<th><input type="text" placeholder="Search Date Started"></th>
<th><input type="text" placeholder="Search Payroll Type"></th>
<th><input type="text" placeholder="Search Agency"></th>
<th><input type="text" placeholder="Search Regular"></th>
      <th></th>
      <th></th>
    </tr>
  </tfoot>
</table>
  </div>
@endsection
@push('scripts')
<script>
$(function() {
var prefixUrl = "{{ url('employees/') . '/' }}";
var numberOfTogglableColumns = 27;
var togglableColumns = [];
for (var i = 0; i < numberOfTogglableColumns; i++) {
togglableColumns.push(i);
}

var table = $('.table').DataTable({
dom: "B<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        serverSide: true,
        processing: true,
        ajax: '',
        columns: [
{data: 'id_number', visible: false },
{data: 'biometric_id', visible: false },
{data: 'last_name'},
{data: 'first_name'},
{data: 'middle_name'},
{data: 'position.name', title: 'Position',
render: function(data, type, row) {
var position = row.position;
return position !== null ? position.name : '';
}
},
{data: 'project.name', title: 'Project',
render: function(data, type, row) {
var project = row.project;
return project !== null ? project.name : '';
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
{data: 'city_address'},
{data: 'provincial_address'},
{data: 'birthdate', visible: false },
{data: 'civil_status', visible: false },
{data: 'telephone_number'},
{data: 'mobile_number1'},
{data: 'mobile_number2'},
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
	'<input class="btn btn-sm btn-danger" type="submit" value="Delete"/>'+
	'</form>';	
}
            	}
],
buttons: [
{
extend: 'excel',
text: 'Export to Excel',
exportOptions: {
columns: togglableColumns
}
},
{
extend: 'columnsToggle',
columns: togglableColumns
}
],

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

});
</script>
@endpush
