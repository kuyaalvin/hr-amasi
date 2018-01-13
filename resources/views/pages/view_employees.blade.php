@extends('layouts.app')

@section('content')

@include('layouts.sidebaremployee')

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
<th class="col">Last Name</th>
<th class="col">First Name</th>
<th class="col">Middle Name</th>
<th class="col">Position</th>
<th class="col">Project</th>
      <th class="col">Edit</th>
      <th class="col">Delete</th>
    </tr>
  </thead>
  <tfoot >
    <tr>
      <th><input type="text" class="form-control" placeholder="Search Last Name"></th>
      <th><input type="text" class="form-control" placeholder="Search First Name"></th>
      <th><input type="text" class="form-control" placeholder="Search Middle Name"></th>
      <th><input type="text" class="form-control" placeholder="Search Position"></th>
      <th><input type="text" class="form-control" placeholder="Search Project"></th>
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

var table = $('.table').DataTable({
dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        serverSide: true,
        processing: true,
        ajax: '',
        lengthMenu: [[10, 25, 50, 100, 150, 200, 250, -1], [10, 25, 50, 100, 150, 200, 250, 'All']],
        columns: [
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
